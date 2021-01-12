<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cliente;

class ClienteController extends Controller
{

	public function add(Request $request) {
		try {
			$cliente = New cliente();
			$cliente->nome = $request->nome;
			$cliente->email = $request->email;

			$cliente->save();

			return ['retorno' => 'ok'];

		} catch(\Exception $erro) {

			return ['retorno' => 'erro', 'details'=>$erro];

		}
	}

	public function list() {

		$cliente = Cliente::all("id", "nome", "email");
		return $cliente;

	}

	public function select($id) {

		$cliente = Cliente::find($id);
		return $cliente;

	}

	public function update(Request $request, $id) {
		try {

			$cliente = Cliente::find($id);

			$cliente->nome = $request->nome;
			$cliente->email = $request->email;

			$cliente->save();

			return ['retorno' => 'ok', 'data' => $request->all()];

		} catch(\Exception $erro) {

			return ['retorno' => 'erro', 'details' => $erro];

		}
	}

	public function delete($id) {
		try {

			$cliente = Cliente::find($id);

			$cliente->delete();

			return ['retorno' => 'ok'];

		} catch(\Exception $erro) {

			return ['retorno' => 'erro', 'details' => $erro];

		}
	}

}
