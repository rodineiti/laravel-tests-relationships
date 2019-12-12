<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Seller;
use Session;

class SellerController extends Controller
{
    protected $model;
    protected $area;

	public function __construct(Seller $model, Area $area)
	{
		$this->model = $model;
        $this->area = $area;
	}

    public function index()
    {
    	$sellers = $this->model->with('areas')->get();
        return view('seller.index', compact('sellers'));
    }

    public function create()
    {
        $areas = $this->area->all();
    	return view('seller.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules() ?? []);

        $seller = $this->model->create($request->all());

        if ($request->area) {
            $seller->areas()->attach($request->area);
        }

    	Session::flash('status', 'Criado com sucesso');

    	return redirect()->route('sellers.index');
    }

    public function edit($id)
    {
    	$seller = $this->model->find($id);
        $areas = $this->area->all();
    	return view('seller.edit', compact('seller','areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->model->rules() ?? []);
        
    	$seller = $this->model->with('areas')->find($id);
    	
        $seller->fill($request->all())->save();

        if ($request->area) {
            $seller->areas()->sync($request->area);
        } else {
            $seller->areas()->detach();
        }

    	Session::flash('status', 'Atualizado com sucesso');

    	return redirect()->route('sellers.index');
    }

    public function destroy($id)
    {
    	$seller = $this->model->find($id);
        
        $seller->areas()->detach();

    	$seller->delete();
    	
        Session::flash('status', 'Deletado com sucesso');

    	return redirect()->route('sellers.index');
    }
}
