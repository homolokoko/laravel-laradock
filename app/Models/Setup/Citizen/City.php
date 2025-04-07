<?php

namespace App\Models\Setup\Citizen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasRelationships;

    protected $table = 'citizen_city';
    protected $fillable = ['state_id','name'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function state()
    {
        return
            $this->belongsTo(
                State::class,
                'state_id'
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
