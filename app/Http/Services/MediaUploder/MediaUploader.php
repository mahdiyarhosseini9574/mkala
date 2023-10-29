<?php

namespace App\Http\Services\MediaUploder;

class MediaUploader
{
    public function upload($file):array
    {
        $url=$file->store('/assets/images');
        return [
          'url'=>$url,
          'size'=>$file->getSize(),
          'extension'=>$file->getExtension(),
        ];
    }

}
