<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'storage',
        'path',
        'origin_name',
        'file_name',
        'mimetype',
        'file_type',
        'file_size'
    ];

    protected $appends = ['url', 'thumb'];

    public function getUrlAttribute(){
        $path = $this->attributes['path'];
        switch($this->attributes['storage']){
            case 'oss':
                return $this->attributes['url']=config('app.domain.oss.cdn').$path.'@!middle_600w_twm';
            case 'local':
            default:
                return $this->attributes['url']=asset($path);
        }
    }

    public function getThumbAttribute(){
        $path = $this->attributes['path'];
        switch($this->attributes['storage']){
            case 'oss':
                return $this->attributes['thumb'] = config('app.domain.oss.cdn').$path.'@!thumb_200w_150h_crop';
            case 'local':
            default:
                return $this->attributes['thumb'] = asset($path);
        }
    }
}
