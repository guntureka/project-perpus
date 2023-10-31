<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPayments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'payment_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'loan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('payment_id', true);
        $this->forge->addForeignKey('loan_id', 'tb_loans', 'loan_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_payments');
    }

    public function down()
    {
        $this->forge->dropTable('tb_payments');
    }
}
