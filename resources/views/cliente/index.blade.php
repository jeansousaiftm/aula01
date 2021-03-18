<!DOCTYPE html>

<html>
	<body>
		<form method="POST" action="/cliente">
			@csrf
			<div>
				<label for="nome">Nome: </label>
				<input type="text" id="nome" name="nome" value="{{ $cliente->nome }}" />
			</div>
			<div>
				<label for="email">E-mail: </label>
				<input type="email" id="email" name="email" value="{{ $cliente->email }}" />
			</div>
			<div>
				<a href="/cliente">Novo</a>
				<input type="hidden" id="id" name="id" value="{{ $cliente->id }}" />
				<button type="submit">Salvar</button>
			</div>
		</form>
		
		<br/>
		
		<table border="1">
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Edit</th>
					<th>Del</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($clientes as $cliente)
					<tr>
						<td>{{ $cliente->nome }}</td>
						<td>{{ $cliente->email }}</td>
						<td>
							<a href="/cliente/{{ $cliente->id }}/edit">Edit</a>
						</td>
						<td>
							<form action="/cliente/{{ $cliente->id }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="DELETE" />
								<button type="submit" onclick="return confirm('Tem Certeza?');">Del</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</body>
</html>