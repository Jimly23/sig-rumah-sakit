<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFasilitasLayananJadwalToHospitals extends Migration
{
    public function up()
    {
        $fields = [
            'fasilitas' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'layanan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'jadwal_dokter' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ];
        $this->forge->addColumn('hospitals', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('hospitals', ['fasilitas', 'layanan', 'jadwal_dokter']);
    }
}
