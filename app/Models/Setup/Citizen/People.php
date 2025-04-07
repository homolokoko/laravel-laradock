<?php

namespace App\Models\Setup\Citizen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

class People extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasRelationships;

    protected $table = 'citizen_people';
    protected $fillable = ['city_id', 'name'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function city()
    {
        return
            $this->belongsTo(
                City::class,
                'city_id'
            );
    }

    public function state()
    {
        return
            $this->hasOneDeepFromRelations(
                $this->city(),
                (new City)->state()
            );
    }

    public function country()
    {
        return
            $this->hasOneDeepFromRelations(
                $this->state(),
                (new State)->country()
            );
    }
}
