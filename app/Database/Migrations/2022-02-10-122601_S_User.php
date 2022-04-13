<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class S_User extends Migration
{
    public function up()            
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'nome_aluno'       => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'cpf'       => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'id_tratamento'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_posto'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_quadro'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_especialidade'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_om'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'saram'       => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'id_curso'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
            'id_situacao'    => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_user_tipo'    => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'id_curso'    => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'email'    => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'unsigned'   => true,
            ],
            'cod_aluno'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ], 'created_at datetime default current_timestamp', 'updated_at datetime default current_timestamp on update current_timestamp',
            ]);

        
        $this->forge->addKey('id_user', true);


        $this->forge->addForeignKey('id_user_tipo', 'p_user_tipo', 'id_user_tipo');

        $this->forge->createTable('s_user', false);

        $this->db->query("INSERT INTO `s_user` (`id_user`, `username`, `nome_aluno`, `cpf`, `id_tratamento`, `id_posto`, `id_quadro`, `id_especialidade`, `id_om`, `saram`, `id_curso`, `id_situacao`, `id_user_tipo`, `email`, `cod_aluno`, `password`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'Admin', '71472649168', '1', '1', '1', '1', '1', '123', '1', '1', '1', 'andernet@gmail.com', '112313', '$2y$10$3kjq1C8ZuHH12.MoKGJBM.p3vFCE1SgTW5T7v5T7uFVT0UwFH9vti', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");

                
    }

    public function down()
    {
        $this->forge->dropTable('s_user');
    }

}