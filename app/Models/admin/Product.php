<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=['name','price','sale_price','slug','description','image','category_id','featured'];
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 
    public function images()
    {
        return $this->hasMany(ImgProduct::class);
    }
}
