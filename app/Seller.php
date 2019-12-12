<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['name'];

    public function areas()
    {
    	return $this->belongsToMany(Area::class, SellerArea::class);
    }

    public function rules()
    {
    	return ['name' => 'required|min:5|max:255'];
    }
}
