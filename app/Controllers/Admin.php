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

        // Handle file upload
        $foto = $this->request->getFile('foto');
        $fotoName = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('uploads/hospitals', $fotoName);
        }

        // Handle multiple file upload for galeri
        $galeriFiles = $this->request->getFiles();
        $galeriNames = [];
        if (isset($galeriFiles['galeri']) && is_array($galeriFiles['galeri'])) {
            foreach ($galeriFiles['galeri'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/hospitals/galeri', $newName);
                    $galeriNames[] = $newName;
                }
            }
        }

        $data = [
            'nama'            => $this->request->getPost('nama'),
            'foto'            => $fotoName,
            'jenis'           => $this->request->getPost('jenis'),
            'kelas'           => $this->request->getPost('kelas'),
            'alamat'          => $this->request->getPost('alamat'),
            'kecamatan'       => $this->request->getPost('kecamatan'),
            'telepon'         => $this->request->getPost('telepon'),
            'whatsapp'        => $this->request->getPost('whatsapp'),
            'email'           => $this->request->getPost('email'),
            'website'         => $this->request->getPost('website'),
            'jam_operasional' => $this->request->getPost('jam_operasional'),
            'status_bpjs'     => $this->request->getPost('status_bpjs') ? 1 : 0,
            'rating'          => $this->request->getPost('rating'),
            'latitude'        => $this->request->getPost('latitude'),
            'longitude'       => $this->request->getPost('longitude'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'galeri'          => !empty($galeriNames) ? json_encode($galeriNames) : null,
            'link_gmaps'      => $this->request->getPost('link_gmaps'),
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

        // Handle multiple file upload for galeri
        $galeriFiles = $this->request->getFiles();
        $galeriNames = [];
        // Keep existing galeri if exist
        if (!empty($hospital['galeri'])) {
            $galeriNames = json_decode($hospital['galeri'], true) ?: [];
        }

        // Handle delete galeri
        $deleteGaleri = $this->request->getPost('delete_galeri');
        if ($deleteGaleri && is_array($deleteGaleri)) {
            foreach ($deleteGaleri as $delImg) {
                if (file_exists('uploads/hospitals/galeri/' . $delImg)) {
                    unlink('uploads/hospitals/galeri/' . $delImg);
                }
                $galeriNames = array_diff($galeriNames, [$delImg]);
            }
        }
        $galeriNames = array_values($galeriNames); // reindex

        if (isset($galeriFiles['galeri']) && is_array($galeriFiles['galeri'])) {
            foreach ($galeriFiles['galeri'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/hospitals/galeri', $newName);
                    $galeriNames[] = $newName;
                }
            }
        }

        $data = [
            'nama'            => $this->request->getPost('nama'),
            'foto'            => $fotoName,
            'jenis'           => $this->request->getPost('jenis'),
            'kelas'           => $this->request->getPost('kelas'),
            'alamat'          => $this->request->getPost('alamat'),
            'kecamatan'       => $this->request->getPost('kecamatan'),
            'telepon'         => $this->request->getPost('telepon'),
            'whatsapp'        => $this->request->getPost('whatsapp'),
            'email'           => $this->request->getPost('email'),
            'website'         => $this->request->getPost('website'),
            'jam_operasional' => $this->request->getPost('jam_operasional'),
            'status_bpjs'     => $this->request->getPost('status_bpjs') ? 1 : 0,
            'rating'          => $this->request->getPost('rating'),
            'latitude'        => $this->request->getPost('latitude'),
            'longitude'       => $this->request->getPost('longitude'),
            'deskripsi'       => $this->request->getPost('deskripsi'),
            'galeri'          => !empty($galeriNames) ? json_encode($galeriNames) : null,
            'link_gmaps'      => $this->request->getPost('link_gmaps'),
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
