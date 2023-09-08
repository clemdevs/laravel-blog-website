<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    public static function uploadImage(UploadedFile $file, ?Model $model, string $folder = 'images'): string|null
    {
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

        $imagePath = '/'; //by default images are uploaded to 'images/'

        if($model) {
            $imageName = $model->id . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        }
        if ($model instanceof User) {
            $imagePath = '/' . 'user/' . $model->id . '/';
        }
        else if ($model instanceof BlogPost){
            $imagePath = '/' . 'post/' . $model->id . '/';
        }

        $imageDataDecoded = file_get_contents($file->getRealPath());

        $relativePath = $imagePath . $imageName;

        if ($imageDataDecoded !== false) {
            Storage::disk('public')->put($relativePath, $imageDataDecoded);
            $absolutePath = $folder . $relativePath;
            return $absolutePath;
        }

        return null;
    }

    public static function deleteImage(string $path): void
    {
        if(!empty($path)){

            $directoryPath = dirname($path);

            $allFiles = Storage::disk('public')->allFiles($directoryPath);

            try {
                if(Storage::disk('public')->exists($path)){
                    File::delete($path);
                }

                if(empty($allFiles)){
                    File::deleteDirectory($directoryPath);
                }
            } catch (\Exception $e){
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
