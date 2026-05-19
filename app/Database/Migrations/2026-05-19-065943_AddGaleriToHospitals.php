<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGaleriToHospitals extends Migration
{
    public function up()
    {
        $this->forge->addColumn('hospitals', [
            'galeri' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('hospitals', 'galeri');
    }
}

