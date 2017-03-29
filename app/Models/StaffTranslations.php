<?php

namespace App\Models;

use App\Support\TranslateAuthor;
use Illuminate\Database\Eloquent\Model;

class StaffTranslations extends Model
{
    protected $fillable = ['staff_id', 'locale', 'title', 'description'];


    public function getDescriptionAttribute(){
        return str_replace("<br />", chr(13).chr(10), $this->attributes['description']);
    }


    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
