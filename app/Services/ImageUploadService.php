<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    public static function uploadImage(UploadedFile $file, string $folder): string|null
    {
        self::checkExistingDirectory($folder);

        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

        $imagePath = $folder . '/' . $imageName;

        $imageDataDecoded = file_get_contents($file->getRealPath());

        if ($imageDataDecoded !== false) {

            if (Storage::disk('public')->put($imagePath, $imageDataDecoded)) {
                $fullPath = 'storage/' . $imagePath;
                return $fullPath;
            }
        }

        return null;
    }

    public static function deleteImage(string $path): void
    {
        if(!empty($path)){
            $fullPath = public_path($path);
            if (file_exists($fullPath)) {
                File::delete($path);
            }
        }
    }

    protected static function checkExistingDirectory(string $folder): void
    {
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }
    }
}
