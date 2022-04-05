<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class P_Status extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status'            => [
                'type'          => 'INT',
                'constraint'    => 2,
            ],
            'status_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ]
            
            ]);

        
        $this->forge->addKey('id_status', true);
        $this->forge->createTable('p_status', false);

      
        $this->db->query("INSERT INTO p_status (status, status_descricao) VALUES ('1', 'INATIVO'), ('2', 'ATIVO')");
    }

    public function down()
    {
        $this->forge->dropTable('p_status');
    }
}