<?php

namespace App\Models\Setup\Defect;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RootTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'defect_translation';
    protected $fillable = ['name', 'defect_id'];
}
