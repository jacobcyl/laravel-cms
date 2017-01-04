<?php

namespace App\Observers;

use App\Models\Media;
//use Croppa;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use App\Facades\FileUpload;

class FileObserver
{
    /**
     * On delete, unlink files and thumbs.
     *
     * @param Model $model eloquent
     *
     * @return mixed false or void
     */
    public function deleted(Model $model)
    {
        if (!$attachments = $model->attachments) {
            return;
        }

        foreach ($attachments as $fieldname) {
            $this->deleteFile($fieldname, $model);
        }
    }

    /**
     * Delete file and thumbs.
     *
     * @param string $fieldname
     * @param Model  $model
     *
     * @return void
     */
    private function deleteFile($fieldname, Model $model)
    {
        $filename = $model->getOriginal($fieldname);
        if (empty($filename)) {
            return;
        }
        $file = '/uploads/'.$model->getTable().'/'.$filename;
        try {
            //Croppa::delete($file);
            File::delete(public_path().$file);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * On save, upload files.
     *
     * @param Model $model eloquent
     *
     * @return mixed false or void
     */
    public function saving(Model $model)
    {
        /*
        if (!$attachments = $model->attachments) {
            return;
        }

        foreach ($attachments as $inputname => $fieldname) {
            if (Request::hasFile($inputname)) {
                // delete prev image
                $file = FileUpload::handle(Request::file($inputname), 'uploads/'.$model->getTable());

                if($file)
                    $model->$fieldname = $file['id'];
                
            } else {
                if ($model->$inputname == 'delete') {
                    $model->$fieldname = null;
                } else {
                    $model->$fieldname = $model->getOriginal($fieldname);
                }
            }
        }
        */
    }


    public function saved(Model $model){
        if(Request::has('categories')){
            $categories = Request::get('categories');
            $model->categories()->sync($categories);
        }
    }

    /**
     * On update, delete previous file if changed.
     *
     * @param Model $model eloquent
     *
     * @return mixed false or void
     */
    /*
    public function updated(Model $model)
    {
        if (!$attachments = $model->attachments) {
            return;
        }

        foreach ($attachments as $inputname => $fieldname) {

            // Nothing to do if file did not change
            if (!$model->isDirty($fieldname)) {
                continue;
            }
            //$this->deleteFile($fieldname, $model);
        }
    }
    */
}