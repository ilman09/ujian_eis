<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBerandaTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "status" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('berandas', true); //If NOT EXISTS create table beranda
    }

    public function down()
    {
        $this->forge->dropTable('berandas', true);
    }
}
