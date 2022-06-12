<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($value, $path)
    {
        $file = $value;
        $nama_file = preg_replace('/\s+/', '', time()."_".$file->getClientOriginalName());
        $tujuan_upload = public_path('/assets/images/'.$path);
        $file->move($tujuan_upload, $nama_file);
        return '/assets/images/'.$path.'/'.$nama_file;
    }

    public function deleteFile($url)
    {
        $file_path = public_path() . '/' . $url;
        return unlink($file_path);
    }
}
