<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLoans extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'loan_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'book_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'loan_date' => [
                'type' => 'DATE',
            ],
            'return_date' => [
                'type' => 'DATE',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'is_loan' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ]);
        $this->forge->addKey('loan_id', true);
        $this->forge->addForeignKey('book_id', 'tb_books', 'book_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'tb_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_loans');
    }

    public function down()
    {
        $this->forge->dropTable('tb_loans');
    }
}
