<?php

namespace App\Models\Setup\Defect;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Root extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    protected $primaryKey = 'id';
    protected $table = 'defect';
    protected $translatedAttributes = ['name'];
    protected $translationForeignKey = 'defect_id';
    // protected $hidden = ['translations'];



}
