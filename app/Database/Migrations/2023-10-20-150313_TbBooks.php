<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbBooks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'book_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'synopsis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'publisher' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'published_year' => [
                'type' => 'YEAR',
                'constraint' => '4',
                'null' => true,
            ],
            'genre' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'book_img' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'price' => [
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
        $this->forge->addKey('book_id', true);
        $this->forge->createTable('tb_books');
    }

    public function down()
    {
        $this->forge->dropTable('tb_books');
    }
}
