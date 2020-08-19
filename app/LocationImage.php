<?php

namespace App;

use App\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LocationImage extends Model
{
    public function location(){
        return $this->belongsTo(Location::class);
    }

    /* static public function getUrlByFilePath($filePath, $w = null, $h = null){

        if(!$w && !$h) {
          return Storage::url($filePath);
        }
  
        $path = dirname($filePath);
        $filename = basename($filePath);
  
        $file = "{$path}/crop{$w}x{$h}_{$filename}";
  
        return Storage::url($file);
      }
  
      public function getUrl($w = null, $h = null)
      {
        return LocationImage::getUrlByFilePath($this->file, $w,$h);
      } */
}
