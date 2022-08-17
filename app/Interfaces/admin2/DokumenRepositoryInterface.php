<?php

namespace App\Interfaces\Admin;

interface DokumenRepositoryInterface
{
    public function listDokumen(array $input);
    public function detailDokumen($id_dokumen);
}