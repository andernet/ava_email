<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class P_Instrutor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_instrutor'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'instrutor_div'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'instrutor_nome'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_status'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id_instrutor', true);

        $this->forge->addForeignKey('id_status', 'p_status', 'id_status', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('p_instrutor', false);

        

        //$this->db->query("INSERT INTO p_instrutor (instrutor_sigla, instrutor_descricao, id_instrutor_status, id_instrutor_tipo) VALUES ('CBI', 'instrutor Básico de Inteligência 2022', '1', '1'), ('CTIC', 'instrutor para Tratamento de Informações Classificadas', '1', '1'), ('CAI', 'instrutor de Análise de Inteligência', '1', '1'), ('CBI-OF', 'instrutor Básico de Inteligência para Oficiais', '1', '1'), ('CBI-GD', 'instrutor Básico de Inteligência para Graduados', '1', '1'), ('CAVI-OF', 'instrutor Avançado de Inteligência para Oficiais', '1', '1'), ('CAVI-GD', 'instrutor Avançado de Inteligência para Graduados', '1', '1'), ('CBOI', 'instrutor Básico de Operações', '1', '1')");
    }

    public function down()
    {
        $this->forge->dropTable('p_instrutor');
    }
}