<?php

namespace App\Interfaces\Admin;

interface JenisSuratRepositoryInterface
{
    public function listJenisSurat();
    public function createJenisSurat($request);
    public function updateJenisSurat($request);
    public function deleteJenisSurat($id_jenis_surat);
}