<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use Session;

class AreaController extends Controller
{
	protected $model;

	public function __construct(Area $model)
	{
		$this->model = $model;
	}

    public function index()
    {
    	$areas = $this->model->all();
    	return view('area.index', compact('areas'));
    }

    public function create()
    {
    	return view('area.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules() ?? []);

    	$this->model->create($request->all());

    	Session::flash('status', 'Criado com sucesso');
        
    	return redirect()->route('areas.index');
    }

    public function edit($id)
    {
    	$area = $this->model->find($id);
    	return view('area.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->rules() ?? []);
        
    	$area = $this->model->find($id);
    	$area->fill($request->all())->save();

    	Session::flash('status', 'Atualizado com sucesso');

    	return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
    	$area = $this->model->find($id);

        if ($area->sellers()->count() > 0) {
            Session::flash('error', "Não foi possível deletar, pois existe(m) ({$area->sellers()->count()}) vendedor(es) vinculado(s)");
            return back();
        }

    	$area->delete();

    	Session::flash('status', 'Deletado com sucesso');

    	return redirect()->route('areas.index');
    }
}
