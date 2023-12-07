<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class users extends Seeder
{
  public function run()
  {
    $data = [
      'firstname' => 'Anderson',
      'lastname' => 'Fontes',
      'email'    => 'admin@admin.com.br',
      'password'    => password_hash('12345678', PASSWORD_DEFAULT),
    ];

    // Simple Queries
    $this->db->query('INSERT INTO users (firstname, lastname, email, password) VALUES(:firstname:, :lastname:, :email:, :password:)', $data);

    // Using Query Builder
    $this->db->table('users')->insert($data);
  }
}