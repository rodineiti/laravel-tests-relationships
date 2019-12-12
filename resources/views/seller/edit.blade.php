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
                            <form class="form-horizontal" action="{{ route('sellers.update', $seller->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$seller->name}}" placeholder="Informe o nome" />
                                </div>
                                <div class="form-group">
                                    <label>Áras</label>
                                    @foreach($areas as $area)
                                        @php $selected = false @endphp
                                        @foreach($seller->areas as $item)
                                            @if ($item->pivot->area_id == $area->id)
                                                @php $selected = true @endphp
                                            @endif
                                        @endforeach

                                        <div class="form-check">
                                          <input class="form-check-input" name="area[]" type="checkbox" value="{{ $area->id }}" id="default-{{ $area->id }}" {{ $selected == true ? "checked" : ''}}>
                                          <label class="form-check-label" for="default-{{ $area->id }}">
                                            {{ $area->name }}
                                          </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-primary" type="submit">Atualizar</button>
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
