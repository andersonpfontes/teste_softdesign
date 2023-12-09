<?php namespace App\Controllers;

use App\Models\BookModel;
use Exception;


class Dashboard extends BaseController
{
  protected $bookModel;

  public function __construct()
  {
    $this->bookModel = new BookModel();
  }

	public function index()
	{
		$data = [];
    helper(['Clima']);

    $result = $this->bookModel->findAll();

    $rest_api_base_url = 'https://api.hgbrasil.com/weather?key=22724492&user_ip=remote';

    $response = perform_http_request($rest_api_base_url);
    $data['clima'] = $response->results;
    $data['countBooks'] = count($result);

		echo view('templates/header');
		echo view('dashboard', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
