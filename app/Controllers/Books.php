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
        $session->setFlashdata('success', 'Registrado com sucesso');
        return redirect()->to(base_url().'/books');

      }
    }


    echo view('templates/header', $data);
    echo view('books');
    echo view('templates/footer');
  }

  public function findOnly()
  {
    $id = $this->request->getVar('id');

    $book = $this->bookModel->find($id);
    $data = [
      'book' => $book
    ];
    return $this->response->setJSON($data);
  }

  /**
   * @throws \ReflectionException
   */
  public function edit()
  {
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

        $upData = [
          'id' => $this->request->getPost('id'),
          'title' => $this->request->getPost('title'),
          'description' => $this->request->getPost('description'),
          'author' => $this->request->getPost('author'),
          'number_pages' => $this->request->getPost('number_pages'),
        ];

        try {
          $this->bookModel->save($upData);

          $session = session();
          $session->setFlashdata('success', 'Atualizado com Sucesso');
          return redirect()->to(base_url().'/books');

        } catch (\ReflectionException $e) {

        }
      }

      echo view('templates/header');
      echo view('books');
      echo view('templates/footer');

    }

  }

  public function destroy()
  {
    $id = $this->request->getVar('id');
    $this->bookModel->delete($id);

    $data = [
      'status' => 'Puf! Seu registro foi excluído!',
      'icon' => 'success'
    ];

    return $this->response->setJSON($data);
  }

}