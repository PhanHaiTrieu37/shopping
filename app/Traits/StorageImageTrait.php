<?php
namespace App\Traits;
use Storage;

trait StorageImageTrait{
    public function storageTraitUpload($request, $fieldName, $folderName)
    {
       if($request->hasFile($fieldName)) {
           $file = $request->$fieldName;
           $fileNameOrigin = $file->getClientOriginalName();
           $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
           $filePath = $request->file($fieldName)->storeAs('public/' . $folderName .'/' . auth()->id(), $fileNameHash);
           $dataUploadTrait = [
               'file_name' => $fileNameOrigin,
               'file_path'=> Storage::url($filePath)
           ];
           return $dataUploadTrait;
       }
       return null;
    }

    public function storageTraitUploadMutiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $folderName .'/' . auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path'=> Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
