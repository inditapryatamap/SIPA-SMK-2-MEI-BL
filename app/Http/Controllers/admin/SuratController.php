<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\GuruPembimbing;
use App\Models\MagangPKL;
use App\Models\Perusahaan;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    public function index()
    {
        $data['surat'] = Surat::select(
            'surat.id', 
            'surat.status',
            'surat.file',  
            'jenis_surat.name as jenis_surat',
            'siswa.nama as nama_siswa', 
            'siswa.nis',
        )
        ->join('siswa', 'siswa.id', 'surat.id_siswa')
        ->join('jenis_surat', 'jenis_surat.id', 'surat.id_jenis_surat')
        ->paginate(1);
        return view('admin.pages.surat.list', compact('data'));
    }

    public function detail($id_surat)
    {
        $data['surat'] = Surat::select(
            'surat.id', 
            'surat.status',
            'surat.file',  
            'surat.keterangan',
            'surat.created_at',
            'jenis_surat.name as jenis_surat_nama',
            'jenis_surat.description as jenis_surat_description',
            'siswa.nama as nama_siswa', 
            'siswa.nis',
        )
        ->where('surat.id', $id_surat)
        ->join('siswa', 'siswa.id', 'surat.id_siswa')
        ->join('jenis_surat', 'jenis_surat.id', 'surat.id_jenis_surat')
        ->first();
        return view('admin.pages.surat.detail', compact('data'));
    }

    public function go_update_file(Request $request, $id_surat)
    {
        $validator = Validator::make($request->all(), [
            'file_data' => ['required', 'mimetypes:application/pdf', 'max:10000'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file_data')) {
            if (Surat::where('id', $id_surat)->exists()) {
                $file = Surat::where('id', $id_surat)->first()->file;
                if ($file != null) {
                    $deleteFile = $this->deleteFile($file);
                    if ($deleteFile === true) {
                        $query = Surat::where('id', $id_surat)->update([
                            'file' => $this->uploadFile($request->file_data, 'data'),
                            'status' => 'diverifikasi'
                        ]);

                        if ($query) {
                            return redirect()->back()->with(['success' => 'Surat berhasil diperbarui']);
                        }
                        return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
                    } else {
                        return redirect()->back()->with(['errors' => 'Gagal menghapus file sebelumnya, file lama tidak ditemukan']);
                    }
                } else {
                    $query = Surat::where('id', $id_surat)->update([
                        'file' => $this->uploadFile($request->file_data, 'data'),
                        'status' => 'diverifikasi'
                    ]);

                    if ($query) {
                        return redirect()->back()->with(['success' => 'Surat berhasil diperbarui']);
                    }
                    return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
                }
            }
            return redirect()->back()->with(['errors' => 'Surat tidak ditemukan']);
        }
        return redirect()->back()->with(['errors' => 'File surat harus diisi']);

    }
}
