@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Área</div>

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
                            <form class="form-horizontal" action="{{ route('sellers.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Informe o nome" />
                                </div>
                                <div class="form-group">
                                    <label>Áras</label>
                                    @foreach($areas as $area)
                                        <div class="form-check">
                                          <input class="form-check-input" name="area[]" type="checkbox" value="{{ $area->id }}" id="default-{{ $area->id }}">
                                          <label class="form-check-label" for="defaultCheck1">
                                            {{ $area->name }}
                                          </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-primary" type="submit">Adicionar</button>
                                <a href="{{ route('sellers.index') }}" class="btn btn-secondary">Voltar</a>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
