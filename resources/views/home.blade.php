@extends('layouts.app')

@section('conteudo')

<div class="col-md-12">

	<h1>Sistema para controle de clientes</h1>

	<div class="row">
		<div class="col-md-4">
			<a href="{{ url('/') }}/cliente/cadastrar" class="btn btn-success btn-lg" style="width: 100%">
				<i class="fas fa-user-plus"></i><br>Cadastrar cliente
			</a>
		</div>
		<div class="col-md-4">
			<a href="{{ url('/') }}/clientes" class="btn btn-primary btn-lg" style="width: 100%">
				<i class="fas fa-users"></i><br>Listar clientes
			</a>
		</div>
	</div>

</div>

@endsection