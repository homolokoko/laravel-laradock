<?php

namespace App\Models\Setup\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Root extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_root';
    protected $fillable = ['title', 'is_publish'];
    protected $hidden = ['created_at','updated_at','deleted_at'];


}
