<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class S_Certificado_emitido extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_certificado_emitido'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'cod_aluno'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'unsigned'       => true,
                
            ],
            'cod_verificacao'   => [
                'type'       => 'VARCHAR',
                'constraint' => 60,
            ],
            'data_envio'          => [
                'type'       => 'DATETIME',
            ],


            'created_at datetime default current_timestamp',
    'updated_at datetime default current_timestamp on update current_timestamp',

        ]);

        $this->forge->addKey('id_certificado_emitido', true);
        
        //$this->forge->addForeignKey('cod_aluno', 's_user', 'cod_aluno', 'CASCADE', 'CASCADE');

        $this->forge->createTable('s_certificado_emitido', false);
        
    }

    public function down()
    {
        $this->forge->dropTable('s_certificado_emitido');
    }
}