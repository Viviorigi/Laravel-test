<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=['name','status','parent_id'];
    use SoftDeletes;
   
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
