<?php

namespace App\Repositories\Admin;
use App\Interfaces\Admin\JenisSuratRepositoryInterface;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;
use App\Models\JenisSurat;

class JenisSuratRepository implements JenisSuratRepositoryInterface 
{
    public function listJenisSurat() 
    {
        $data['jenis-surat'] = JenisSurat::paginate(10);
        return $data;
    }

    public function createJenisSurat($request)
    {
        return JenisSurat::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public function updateJenisSurat($request)
    {
        if (JenisSurat::where('id', $request->id_jenis_surat)->exists()) {
            return JenisSurat::where('id', $request->id_jenis_surat)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }
        return false;
    }

    public function deleteJenisSurat($id_jenis_surat)
    {
        if (JenisSurat::where('id', $id_jenis_surat)->exists()) {
            return JenisSurat::where('id', $id_jenis_surat)->delete();
        }
        return false;
    }
}