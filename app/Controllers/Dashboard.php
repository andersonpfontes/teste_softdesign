<?php namespace App\Controllers;

use Exception;


class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
    helper(['Clima']);

    $rest_api_base_url = 'https://api.hgbrasil.com/weather?key=22724492&user_ip=remote';

    $response = perform_http_request($rest_api_base_url);
    $data['clima'] = $response->results;

		echo view('templates/header');
		echo view('dashboard', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
