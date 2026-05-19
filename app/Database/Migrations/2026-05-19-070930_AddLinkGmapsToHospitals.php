<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLinkGmapsToHospitals extends Migration
{
    public function up()
    {
        $this->forge->addColumn('hospitals', [
            'link_gmaps' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('hospitals', 'link_gmaps');
    }
}
