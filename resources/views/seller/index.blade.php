@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vendedores</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="{{ route('sellers.create') }}">Adicionar</a>
                            <hr />
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Áreas</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sellers as $seller)
                                        <tr>
                                            <td>{{ $seller->id }}</td>
                                            <td>{{ $seller->name }}</td>
                                            <td>
                                                <ul>
                                                @foreach($seller->areas as $item)
                                                    <li>{{ $item->name }}</li>
                                                @endforeach
                                                </ul>
                                            </td>
                                            <td><a class="btn btn-info" href="{{ route('sellers.edit', $seller->id) }}">Editar</a></td>
                                            <td>
                                                <form action="{{ route('sellers.destroy', $seller->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger " onclick="return confirm('Confirma a exclusão?');">Deletar</button>
                                            </form>
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
