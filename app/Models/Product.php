<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price', 'description'
    ];

    public function products(){
        return $this->belongsToMany(Category::class);
    }

    public static function search($request)
    {
        $products = Product::query();

        if (isset($request['search'])) {
            $products = $products->where('title', 'LIKE', '%'.$request['search'].'%');
        }

        return $products->paginate(1);
    }
}
