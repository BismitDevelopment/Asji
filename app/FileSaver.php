<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileSaver
{
    public static function save_image_helper(Model $model, Array $files){
        foreach(array_keys($files) as $key) { 
            # code...
            if ($files[$key]) {
                # code...
                $path = class_basename($model).'_'.$key.'_'.time().'_'.$files[$key]->getClientOriginalName();
                if ($key < count($model->images)) {
                    # code...
        
                    $oldFileName = $model->images[$key]->path;
                    
                    $files[$key]->move('images', $path);
                    
                    Storage::disk('public')->delete('images/'.$oldFileName);
        
                    $model->images[$key]->path = $path;
        
                    $model->push();
        
                } else {
                    # code...
                    $files[$key]->move('images', $path);
                    
                    $model->images()->create([
                        'path' => $path,
                    ]);
                }
            }
        }
    }
    
    public static function save_document_helper(Model $model, Array $files){
        foreach(array_keys($files) as $key) { 
            # code...
            if ($files[$key]) {
                # code...
                $path = class_basename($model).'_'.$key.'_'.time().'_'.$files[$key]->getClientOriginalName();
                if ($key < count($model->documents)) {
                    # code...
        
                    $oldFileName = $model->documents[$key]->path;
                    
                    $files[$key]->move('documents', $path);
                    
                    Storage::disk('public')->delete('documents/'.$oldFileName);
        
                    $model->documents[$key]->path = $path;
        
                    $model->push();
        
                } else {
                    # code...
                    $files[$key]->move('documents', $path);
                    
                    $model->documents()->create([
                        'path' => $path,
                    ]);
                }
            }
        }
    }
}
