<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];

    public function sellers()
    {
    	return $this->belongsToMany(Seller::class, SellerArea::class);
    }

    public function rules()
    {
    	return ['name' => 'required|min:5|max:255'];
    }
}
