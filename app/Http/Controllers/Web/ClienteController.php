<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class ClienteController extends Controller
{
    public function list() {

		$client = new Client;
		$response = $client->get('http://localhost/api-rest-laravel/public/api/clientes');
		$clientes = json_decode($response->getBody());

		return view('cliente/listar', [ 'clientes' => $clientes ] );

	}

	public function add(Request $request) {

		$client = new Client;
		$response = $client->request('POST','http://localhost/api-rest-laravel/public/api/cliente/add', [
			'form_params' => [
				'nome' => $request->nome,
				'email' => $request->email
			]
		]);

		$dados = json_decode($response->getBody()->getContents());
		if($dados->retorno == "ok"){
			$alerta = "Cadastro realizado com sucesso";
			$alertaClass = "success";
		}else{
			$alerta = "Ocorreu um erro ao cadastrar";
			$alertaClass = "danger";
		}

		return view('cliente/cadastrar', [ 'alerta' => $alerta, 'alertaClass' => $alertaClass ]);
	}


	public function select($id) {

		$client = new Client;
		$response = $client->get('http://localhost/api-rest-laravel/public/api/clientes/'.$id);
		$cliente = json_decode($response->getBody());

		return view('cliente/editar', [ 'cliente' => $cliente ] );

	}

	public function update(Request $request, $id) {

		$client = new Client;

		$response = $client->request('PUT','http://localhost/api-rest-laravel/public/api/cliente/'.$id, [
			'form_params' => [
				'nome' => $request->nome,
				'email' => $request->email
			]
		]);
		
		$dados = json_decode($response->getBody()->getContents());
		if($dados->retorno == "ok"){
			$alerta = "alteração realizado com sucesso";
			$alertaClass = "success";
		}else{
			$alerta = "Ocorreu um erro ao alterar";
			$alertaClass = "danger";
		}

		$responseCliente = $client->get('http://localhost/api-rest-laravel/public/api/clientes/'.$id);
		$cliente = json_decode($responseCliente->getBody());
		
		return view('cliente/editar', [ 'cliente' => $cliente, 'alerta' => $alerta, 'alertaClass' => $alertaClass ]);

	}

	public function delete($id) {

		$client = new Client;
		$response = $client->delete('http://localhost/api-rest-laravel/public/api/cliente/'.$id);

		$dados = json_decode($response->getBody());
		if($dados->retorno == "ok"){
			$alerta = "Excluído com sucesso";
			$alertaClass = "success";

			$response = $client->get('http://localhost/api-rest-laravel/public/api/clientes');
			$clientes = json_decode($response->getBody());
		}else{
			$alerta = "Ocorreu um erro ao excluir";
			$alertaClass = "danger";
		}

		return view('cliente/listar', [ 'clientes' => $clientes, 'alerta' => $alerta, 'alertaClass' => $alertaClass ]);

	}

}
