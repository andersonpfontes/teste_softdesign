<?php

namespace App\Controllers;

use App\Models\BookModel;

class Books extends BaseController
{

  protected $bookModel;

  public function __construct()
  {
    $this->bookModel = new BookModel();
  }

  public function index()
  {
    $result = $this->bookModel->findAll();

    $data = [
      'rows' => count($result),
      'books'=>  $result
    ];

    echo view('templates/header');
    echo view('books', $data);
    echo view('templates/footer');
  }

  public function register(){
    $data = [];
    helper(['form']);

    if ($this->request->getMethod() == 'post') {
      //let's do the validation here
      $rules = [
        'title' => 'required|min_length[3]|max_length[100]',
        'description' => 'required',
        'author' => 'required|min_length[3]|max_length[100]',
        'number_pages' => 'required|min_length[1]|max_length[10]',
      ];

      if (! $this->validate($rules)) {
        $data['validation'] = $this->validator;
      }else{

        $newData = [
          'title' => $this->request->getVar('title'),
          'description' => $this->request->getVar('description'),
          'author' => $this->request->getVar('author'),
          'number_pages' => $this->request->getVar('number_pages'),
        ];

        $this->bookModel->save($newData);

        $session = session();
        $session->setFlashdata('success', 'Successful Registration');
        return redirect()->to(base_url().'/books');

      }
    }


    echo view('templates/header', $data);
    echo view('books');
    echo view('templates/footer');
  }

}