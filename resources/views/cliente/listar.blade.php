@extends('layouts.app')

@section('conteudo')

<div class="col-md-12">

	<h1>Listagem de clientes</h1>

	@isset($alerta)
	<div class="alert alert-{{ $alertaClass }}">
		{{ $alerta }}
	</div>
	@endisset

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Cod.</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th colspan="2" class="text-center">Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($clientes as $cliente)
			<tr>
				<th scope="row">{{ $cliente->id }}</th>
				<td>{{ $cliente->nome }}</td>
				<td>{{ $cliente->email }}</td>
				<td class="text-center"><a href="{{ url('/') }}/cliente/editar/{{ $cliente->id }}" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
				<td class="text-center"><a href="{{ url('/') }}/cliente/excluir/{{ $cliente->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>

@endsection