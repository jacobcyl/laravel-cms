<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'email', 'message', 'status'];

    public function getReadStatusAttribute(){
        if($this->attributes['status'] == 'read') return '<span style="color:green">已读</span>';
        else return '<span style="color:red">未读</span>';
    }
}
