<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Hospital;

class Admin extends BaseController
{
    public function __construct()
    {
        if (!session()->get('logged_in')) {
            header('Location: ' . base_url('auth/login'));
            exit();
        }
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $hospitalModel = new Hospital();
        if ($search) {
            $data['hospitals'] = $hospitalModel->like('nama', $search)->findAll();
            $data['search'] = $search;
        } else {
            $data['hospitals'] = $hospitalModel->findAll();
            $data['search'] = '';
        }
        return view('admin/dashboard', $data);
    }

    public function create()
    {
        return view('admin/hospital_create');
    }

    public function store()
    {
        $hospitalModel = new Hospital();

        $validationRules = [
            'nama' => [
                'rules' => 'required|is_unique[hospitals.nama]',
                'errors' => [
                    'required' => 'Nama rumah sakit harus diisi.',
                    'is_unique' => 'Nama rumah sakit sudah terdaftar. Setiap nama rumah sakit tidak boleh sama.'
                ]
            ],
            'foto' => [
                'rules' => 'permit_empty|uploaded[foto]|is_image[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif,image/webp]',
                'errors' => [
                    'is_image' => 'File yang diupload harus berupa gambar.',
                    'max_size' => 'Ukuran foto maksimal 5MB.',
                    'mime_in'  => 'Format foto harus JPG, JPEG, PNG, GIF, atau WEBP.'
                ]
            ],
            'telepon' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'Nomor telepon hanya boleh berisi angka.'
                ]
            ],
            'whatsapp' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'WhatsApp hanya boleh berisi angka.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        $fotoName = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('uploads/hospitals', $fotoName);
        }



        $waInput = $this->request->getPost('whatsapp');
        $waFormatted = $waInput ? '+62' . ltrim(ltrim($waInput, '+62'), '0') : '';

        $data = [
            'nama'            => $this->request->getPost('nama'),
            'foto'            => $fotoName,
            'jenis'           => $this->request->getPost('jenis'),
            'kelas'           => $this->request->getPost('kelas'),
            'alamat'          => $this->request->getPost('alamat'),
            'kecamatan'       => $this->request->getPost('kecamatan'),
            'telepon'         => $this->request->getPost('telepon'),
            'whatsapp'        => $waFormatted,
            'email'           => $this->request->getPost('email'),
            'website'         => $this->request->getPost('website'),
            'jam_operasional' => $this->request->getPost('jam_operasional'),
            'status_bpjs'     => $this->request->getPost('status_bpjs') ? 1 : 0,
            'rating'          => $this->request->getPost('rating'),
            'latitude'        => $this->request->getPost('latitude'),
            'longitude'       => $this->request->getPost('longitude'),
            'deskripsi'       => $this->request->getPost('deskripsi'),

            'link_gmaps'      => $this->request->getPost('link_gmaps'),
            'fasilitas'       => $this->request->getPost('fasilitas') ? json_encode(array_values(array_filter($this->request->getPost('fasilitas')))) : null,
            'layanan'         => $this->request->getPost('layanan') ? json_encode(array_values(array_filter($this->request->getPost('layanan')))) : null,
            'jadwal_dokter'   => $this->request->getPost('jadwal_dokter') ? json_encode(array_values(array_filter($this->request->getPost('jadwal_dokter'), function($j) { return !empty($j['nama_dokter']); }))) : null,
        ];
        $hospitalModel->insert($data);
        return redirect()->to(base_url('admin'))->with('success', 'Data rumah sakit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hospitalModel = new Hospital();
        $data['hospital'] = $hospitalModel->find($id);
        if (!$data['hospital']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/hospital_edit', $data);
    }

    public function update($id)
    {
        $hospitalModel = new Hospital();
        $hospital = $hospitalModel->find($id);

        $validationRules = [
            'nama' => [
                'rules' => "required|is_unique[hospitals.nama,id,{$id}]",
                'errors' => [
                    'required' => 'Nama rumah sakit harus diisi.',
                    'is_unique' => 'Nama rumah sakit sudah terdaftar. Setiap nama rumah sakit tidak boleh sama.'
                ]
            ],
            'foto' => [
                'rules' => 'permit_empty|uploaded[foto]|is_image[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif,image/webp]',
                'errors' => [
                    'is_image' => 'File yang diupload harus berupa gambar.',
                    'max_size' => 'Ukuran foto maksimal 5MB.',
                    'mime_in'  => 'Format foto harus JPG, JPEG, PNG, GIF, atau WEBP.'
                ]
            ],
            'telepon' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'Nomor telepon hanya boleh berisi angka.'
                ]
            ],
            'whatsapp' => [
                'rules' => 'permit_empty|numeric',
                'errors' => [
                    'numeric' => 'WhatsApp hanya boleh berisi angka.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        $fotoName = $hospital['foto']; // keep old photo by default
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Delete old photo if exists
            if ($hospital['foto'] && file_exists('uploads/hospitals/' . $hospital['foto'])) {
                unlink('uploads/hospitals/' . $hospital['foto']);
            }
            $fotoName = $foto->getRandomName();
            $foto->move('uploads/hospitals', $fotoName);
        }



        $waInput = $this->request->getPost('whatsapp');
        $waFormatted = $waInput ? '+62' . ltrim(ltrim($waInput, '+62'), '0') : '';

        $data = [
            'nama'            => $this->request->getPost('nama'),
            'foto'            => $fotoName,
            'jenis'           => $this->request->getPost('jenis'),
            'kelas'           => $this->request->getPost('kelas'),
            'alamat'          => $this->request->getPost('alamat'),
            'kecamatan'       => $this->request->getPost('kecamatan'),
            'telepon'         => $this->request->getPost('telepon'),
            'whatsapp'        => $waFormatted,
            'email'           => $this->request->getPost('email'),
            'website'         => $this->request->getPost('website'),
            'jam_operasional' => $this->request->getPost('jam_operasional'),
            'status_bpjs'     => $this->request->getPost('status_bpjs') ? 1 : 0,
            'rating'          => $this->request->getPost('rating'),
            'latitude'        => $this->request->getPost('latitude'),
            'longitude'       => $this->request->getPost('longitude'),
            'deskripsi'       => $this->request->getPost('deskripsi'),

            'link_gmaps'      => $this->request->getPost('link_gmaps'),
            'fasilitas'       => $this->request->getPost('fasilitas') ? json_encode(array_values(array_filter($this->request->getPost('fasilitas')))) : null,
            'layanan'         => $this->request->getPost('layanan') ? json_encode(array_values(array_filter($this->request->getPost('layanan')))) : null,
            'jadwal_dokter'   => $this->request->getPost('jadwal_dokter') ? json_encode(array_values(array_filter($this->request->getPost('jadwal_dokter'), function($j) { return !empty($j['nama_dokter']); }))) : null,
        ];
        $hospitalModel->update($id, $data);
        return redirect()->to(base_url('admin'))->with('success', 'Data rumah sakit berhasil diupdate');
    }

    public function delete($id)
    {
        $hospitalModel = new Hospital();
        $hospital = $hospitalModel->find($id);
        // Delete photo file if exists
        if ($hospital && $hospital['foto'] && file_exists('uploads/hospitals/' . $hospital['foto'])) {
            unlink('uploads/hospitals/' . $hospital['foto']);
        }
        // Delete gallery files if exist
        if ($hospital && $hospital['galeri']) {
            $galeriNames = json_decode($hospital['galeri'], true) ?: [];
            foreach ($galeriNames as $gName) {
                if (file_exists('uploads/hospitals/galeri/' . $gName)) {
                    unlink('uploads/hospitals/galeri/' . $gName);
                }
            }
        }
        $hospitalModel->delete($id);
        return redirect()->to(base_url('admin'))->with('success', 'Data rumah sakit berhasil dihapus');
    }
}
