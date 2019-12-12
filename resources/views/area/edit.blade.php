@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Área</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <form class="form-horizontal" action="{{ route('areas.update', $area->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$area->name}}" placeholder="Informe o nome" />
                                </div>
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                                <a href="{{ route('areas.index') }}" class="btn btn-secondary">Voltar</a>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
