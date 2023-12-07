<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
    public function up()
    {
      $this->db->disableForeignKeyChecks();

      $this->forge->addField([
        'id' => [
          'type'           => 'INT',
          'constraint'     => 5,
          'unsigned'       => TRUE,
          'auto_increment' => TRUE
        ],
        'title'       => [
          'type'           => 'VARCHAR',
          'constraint'     => '100',
        ],
        'description'       => [
          'type'           => 'TEXT',
        ],
        'author'       => [
          'type'           => 'VARCHAR',
          'constraint'     => '100',
        ],
        'number_pages'       => [
          'type'           => 'INT',
          'constraint'     => 5,
        ],
        'created_at'       => [
          'type'           => 'DATETIME',
        ],
        'updated_at'       => [
          'type'           => 'DATETIME',
        ],
      ]);
      $this->forge->addKey('id', true);
      $this->forge->createTable('books');
    }

    public function down()
    {
      $this->forge->dropTable('books');
    }
}
