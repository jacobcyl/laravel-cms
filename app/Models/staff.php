<?php

namespace App\Models;

use App\Support\SetupOrder;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use Translatable, SetupOrder;

    public $translationModel = StaffTranslations::class;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['status', 'avatar_id'];
    

    public function avatar(){
        return $this->hasOne(Media::class, 'id', 'avatar_id');
    }
}
