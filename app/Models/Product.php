<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price', 'description', 'user_id'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

//    public static function search($request): \LaravelIdea\Helper\App\Models\_IH_Product_C|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Pagination\LengthAwarePaginator|array
//    {
//        $products = Product::query();
//
//        if (isset($request['search'])) {
//            $products = $products->where('title', 'LIKE', '%'.$request['search'].'%');
//        }
//        return $products->paginate(5);
//    }
}
