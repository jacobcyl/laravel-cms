<?php

namespace App\Services;

use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Notification;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * FileUpload.
 */
class FileUpload
{
    /**
     * Handle the file upload. Returns the array on success, or false
     * on failure.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @param string    $path where to upload file
     * @param string    $fileName file new name
     * @param string    $category [assets, avatar, tmp]
     * @param string    $storage storage of file [local, oss, aws,...]
     *
     * @return array|bool
     */
    public function handle(UploadedFile $file, $path = 'uploads', $category = 'assets', $fileName = null, $storage = 'local')
    {
        Log::debug('handle function');
        $input = [];
        $input['storage'] = $storage;
        $input['category'] = $category;

        //$originName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $originName = explode('.', $file->getClientOriginalName())[0];

        if(empty($fileName)){
            // Detect and transform Croppa pattern to avoid problem with Croppa::delete()
            $fileName = preg_replace('#([0-9_]+)x([0-9_]+)#', '$1-$2', $originName);
        }

        $input['path'] = $path;
        $input['extension'] = '.'.$file->getClientOriginalExtension();
        $input['file_size'] = $file->getClientSize();
        $input['mimetype'] = $file->getClientMimeType();
        $input['file_name'] = $fileName.$input['extension'];
        $input['origin_name'] = $originName.$input['extension'];

        $fileTypes = config('file.types');
        try {
            $input['type'] = $fileTypes[strtolower($file->getClientOriginalExtension())];
        } catch (Exception $e) {
            $input['type'] = 'd';
        }

        $filecounter = 1;
        while (file_exists($input['path'].'/'.$input['file_name'])) {
            $input['file_name'] = $fileName.'_'.$filecounter++.$input['extension'];
        }

        try {
            Log::debug('file info', $input);
            $file->move($input['path'], $input['file_name']);
            list($input['width'], $input['height']) = getimagesize($input['path'].'/'.$input['file_name']);
            Log::debug('File uploaded');
            return $this->saveToMedia($input);

            //return $input;
        } catch (FileException $e) {
            Log::error($e->getMessage());
            Notification::error($e->getmessage());

            return false;
        }
    }

    private function saveToMedia(array $input){
        Log::debug($input);
        $input['path'] = $input['path'].'/'.$input['file_name'];
        $user = auth()->user();
        if($user) $input['user_id'] = $user->id;

        if($input['category'] != 'tmp') return Media::create($input);
        
        return $input;
    }
}