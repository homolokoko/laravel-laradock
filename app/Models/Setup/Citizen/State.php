<?php

namespace App\Models\Setup\Citizen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'citizen_state';
    protected $fillable = ['country_id','name'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function country()
    {
        return
            $this->belongsTo(
                Country::class,
                'country_id'
            );
    }
}
