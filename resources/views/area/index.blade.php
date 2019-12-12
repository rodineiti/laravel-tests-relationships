@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Áreas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('areas.create') }}">Adicionar</a>
                            <hr />
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Qtd. Vendedores</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($areas as $area)
                                        <tr>
                                            <td>{{ $area->id }}</td>
                                            <td>{{ $area->name }}</td>
                                            <td>{{ $area->sellers()->count() }}</td>
                                            <td><a class="btn btn-info" href="{{ route('areas.edit', $area->id) }}">Editar</a></td>
                                            <td>
                                                @if($area->sellers()->count() == 0)
                                                <form action="{{ route('areas.destroy', $area->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger " onclick="return confirm('Confirma a exclusão?');">Deletar</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
