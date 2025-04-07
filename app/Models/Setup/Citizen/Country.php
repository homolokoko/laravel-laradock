<?php

namespace App\Models\Setup\Citizen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'citizen_country';
    protected $fillable = ['name','official','cc2','cc3'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
