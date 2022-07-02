<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\MagangPKL;
use App\Models\ReviewPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $data['kegiatan'] = MagangPKL::where('id_siswa', Auth::guard('siswa')->user()->id)
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
        ->select(
            'pengajuan_magang_pkl.id', 
            'perusahaan.nama_perusahaan',
            'jenis_kegiatan.nama_kegiatan', 
            'jenis_kegiatan.durasi', 
        )
        ->where('pengajuan_magang_pkl.status', 'diverifikasi')
        ->get();

        if ($request['id_magang_pkl'] != null) {
            $data['id_magang_pkl'] = $request['id_magang_pkl'];
            $data['dokumen_individu'] = DokumenReview::select(
                'dokumen.id',
            )
            ->where([['dokumen.id_magang_pkl', $request['id_magang_pkl']], ['tipe', 'individu'], ['id_siswa', Auth::guard('siswa')->user()->id]])
            ->first();

            $data['dokumen_kelompok'] = DokumenReview::select(
                'dokumen.id',
            )
            ->where([['dokumen.id_magang_pkl', $request['id_magang_pkl']], ['tipe', 'kelompok']])
            ->first();
        } else {
            $data['id_magang_pkl'] = null;
        }

        // dd($data);

        return view('siswa.pages.unggah_dokumen', compact('data'));
    }

    public function detail($id_dokumen)
    {
        if (DokumenReview::where('id', $id_dokumen)->exists()) {
            $data['dokumen'] = DokumenReview::select(
                'siswa.nis',
                'siswa.nama as nama_siswa',
                'pengajuan_magang_pkl.id_jenis_kegiatan',
                'pengajuan_magang_pkl.id_perusahaan',
                'perusahaan.nama_perusahaan',
                'dokumen.id',
                'dokumen.judul_laporan',
                'dokumen.file_laporan_ms_word',
                'dokumen.file_laporan_pdf',
                'jenis_kegiatan.nama_kegiatan', 
                'jenis_kegiatan.durasi', 
                'dokumen.status_guru_pembimbing', 
            )
            ->where('dokumen.id', $id_dokumen)
            ->join('siswa', 'siswa.id', 'dokumen.id_siswa')
            ->join('pengajuan_magang_pkl', 'pengajuan_magang_pkl.id', 'dokumen.id_magang_pkl')
            ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
            ->join('jenis_kegiatan', 'jenis_kegiatan.id', 'pengajuan_magang_pkl.id_jenis_kegiatan')
            ->first();

            return view('siswa.pages.dokumen.detail', compact('data'));
        }
        return redirect()->back()->with(['errors' => 'Dokumen tidak ditemukan']);
    }

    public function go_create_dokumen_individu(Request $request, $id_magang_pkl)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'judul_laporan' => ['required', 'string'],
            'file_laporan_ms_word' => ['required', 'mimes:doc,docx'],
            'file_laporan_pdf' => ['required', 'mimes:pdf', 'max:10240'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // dd(Auth::guard('siswa')->user()->id);
        $query = DokumenReview::create([
            'id_siswa' => Auth::guard('siswa')->user()->id,
            'tipe' => 'individu',
            'id_magang_pkl' => $id_magang_pkl,
            'judul_laporan' => $request->judul_laporan,
            'status_guru_pembimbing' => 0,
            'file_laporan_ms_word' => $this->uploadFile($request->file_laporan_ms_word, 'file_dokumen'),
            'file_laporan_pdf' => $this->uploadFile($request->file_laporan_pdf, 'file_dokumen'),
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Dokumen berhasil diupload']);
        } else {
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
    }

    public function go_create_dokumen_kelompok(Request $request, $id_magang_pkl)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'judul_laporan' => ['required', 'string'],
            'file_laporan_ms_word' => ['required', 'mimes:doc,docx'],
            'file_laporan_pdf' => ['required', 'mimes:pdf', 'max:10240'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // dd(Auth::guard('siswa')->user()->id);
        $query = DokumenReview::create([
            'id_siswa' => Auth::guard('siswa')->user()->id,
            'tipe' => 'kelompok',
            'id_magang_pkl' => $id_magang_pkl,
            'judul_laporan' => $request->judul_laporan,
            'status_guru_pembimbing' => 0,
            'file_laporan_ms_word' => $this->uploadFile($request->file_laporan_ms_word, 'file_dokumen'),
            'file_laporan_pdf' => $this->uploadFile($request->file_laporan_pdf, 'file_dokumen'),
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Dokumen berhasil diupload']);
        } else {
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
    }
}
