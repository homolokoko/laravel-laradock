<?php
namespace App\Lib;

class ResourceMap
{
    public static function getValueText($list)
    {
        return $list->map(fn($item)=>['value'=>$item->id,'text'=>$item->name]);
    }
}
