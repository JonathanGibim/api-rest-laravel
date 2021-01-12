@extends('layouts.app')

@section('conteudo')

<div class="col-md-6">

	<h1>Cadastro de clientes</h1>

	@isset($alerta)
	<div class="alert alert-{{ $alertaClass }}">
		{{ $alerta }}
	</div>
	@endisset

	<form action="cadastrar" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="nome" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
		</div>
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
		</div>
		<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
	</form>

</div>

@endsection