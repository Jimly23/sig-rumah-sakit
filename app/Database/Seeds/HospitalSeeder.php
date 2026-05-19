<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Hospital;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        $hospitalModel = new Hospital();
        $hospitals = [
            [
                'nama' => 'RSUD Brebes',
                'jenis' => 'RS Umum',
                'kelas' => 'B',
                'alamat' => 'Jl. Jenderal Sudirman No.181, Brebes, Jawa Tengah 52212',
                'kecamatan' => 'Brebes',
                'telepon' => '(0283) 671003',
                'whatsapp' => '08123456789',
                'email' => 'rsud@brebeskab.go.id',
                'website' => 'https://rsudbrebes.brebeskab.go.id',
                'jam_operasional' => '24 Jam',
                'status_bpjs' => true,
                'rating' => 4.2,
                'latitude' => '-6.8694',
                'longitude' => '109.0436',
                'deskripsi' => 'Rumah Sakit Umum Daerah Brebes merupakan pusat rujukan utama di Kabupaten Brebes dengan fasilitas lengkap.',
            ],
            [
                'nama' => 'RS Bhakti Asih Brebes',
                'jenis' => 'RS Umum',
                'kelas' => 'C',
                'alamat' => 'Jl. Pangeran Diponegoro No.125, Wanasari, Brebes, Jawa Tengah',
                'kecamatan' => 'Wanasari',
                'telepon' => '(0283) 672200',
                'whatsapp' => null,
                'email' => null,
                'website' => null,
                'jam_operasional' => '24 Jam',
                'status_bpjs' => true,
                'rating' => 4.0,
                'latitude' => '-6.8600',
                'longitude' => '109.0500',
                'deskripsi' => 'Rumah sakit swasta dengan layanan Ibu dan Anak unggulan.',
            ],
            [
                'nama' => 'RSUD Bumiayu',
                'jenis' => 'RS Umum',
                'kelas' => 'C',
                'alamat' => 'Jl. Raya Bumiayu, Bumiayu, Brebes, Jawa Tengah',
                'kecamatan' => 'Bumiayu',
                'telepon' => '(0289) 430581',
                'whatsapp' => null,
                'email' => null,
                'website' => null,
                'jam_operasional' => '24 Jam',
                'status_bpjs' => true,
                'rating' => 3.9,
                'latitude' => '-7.2333',
                'longitude' => '109.0167',
                'deskripsi' => 'Rumah sakit umum daerah di wilayah selatan Kabupaten Brebes.',
            ],
        ];

        foreach ($hospitals as $hospital) {
            $hospitalModel->insert($hospital);
        }
    }
}
