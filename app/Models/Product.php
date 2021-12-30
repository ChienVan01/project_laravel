<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','Info','Price','Quantity','Avatar','Status','Origin',];
    
    
    public function ProductType()
    {
        return $this->belongsTo(ProductType::class, 'ProductType_id');
    }
}
