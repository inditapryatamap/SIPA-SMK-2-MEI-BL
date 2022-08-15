<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\JenisSuratRepositoryInterface;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisSuratController extends Controller
{
    private JenisSuratRepositoryInterface $jenisSuratRepository;

    public function __construct(JenisSuratRepositoryInterface $jenisSuratRepository) 
    {
        $this->jenisSuratRepository = $jenisSuratRepository;
    }

    public function index()
    {
        return view('admin.pages.master-data.jenis-surat.list', 
            ["data" => $this->jenisSuratRepository->listJenisSurat()]
        );
    }

    public function go_create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($this->jenisSuratRepository->createJenisSurat($request)) {
            return redirect()->back()->with(['success' => 'Jenis surat berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
    }

    public function go_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jenis_surat' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $query = $this->jenisSuratRepository->updateJenisSurat($request);

        if ($query) {
            return redirect()->back()->with(['success' => 'Jenis surat berhasil dibuat']);
        }
        return redirect()->back()->with(['errors' => 'Jenis surat tidak berhasil dibuat']);
    }

    public function go_delete($id_jenis_surat)
    {
        $this->jenisSuratRepository->deleteJenisSurat($id_jenis_surat);
        return redirect()->back()->with(
            ['success' => 'Jenis surat berhasil dihapus']
        );
    }
}
