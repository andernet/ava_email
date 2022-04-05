<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class P_Instrucao extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_instrucao'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'instrucao_sigla'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'instrucao_descricao'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_status'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey('id_instrucao', true);

        $this->forge->addForeignKey('id_status', 'p_status', 'id_status', 'CASCADE', 'CASCADE');
        
        //$this->forge->addForeignKey('id_instrucao_tipo', 'p_instrucao_tipo', 'id_instrucao_tipo', 'CASCADE', 'CASCADE');


        $this->forge->createTable('p_instrucao', false);

        

        //$this->db->query("INSERT INTO p_instrucao (instrucao_sigla, instrucao_descricao, id_instrucao_status, id_instrucao_tipo) VALUES ('CBI', 'instrucao Básico de Inteligência 2022', '1', '1'), ('CTIC', 'instrucao para Tratamento de Informações Classificadas', '1', '1'), ('CAI', 'instrucao de Análise de Inteligência', '1', '1'), ('CBI-OF', 'instrucao Básico de Inteligência para Oficiais', '1', '1'), ('CBI-GD', 'instrucao Básico de Inteligência para Graduados', '1', '1'), ('CAVI-OF', 'instrucao Avançado de Inteligência para Oficiais', '1', '1'), ('CAVI-GD', 'instrucao Avançado de Inteligência para Graduados', '1', '1'), ('CBOI', 'instrucao Básico de Operações', '1', '1')");
    }

    public function down()
    {
        $this->forge->dropTable('p_instrucao');
    }
}