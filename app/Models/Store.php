<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'store';
    protected $fillable = ['name'];
    public $appends = ['date'];

    public function getDateAttribute()
    {
        return \Carbon\Carbon::parse($this->updated_at)->format("jS, F Y");
    }

}
