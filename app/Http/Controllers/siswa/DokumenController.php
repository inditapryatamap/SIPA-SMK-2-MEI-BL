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
    public function index()
    {
        $data['kegiatan'] = MagangPKL::where('id_siswa', Auth::guard('siswa')->user()->id)
        ->join('perusahaan', 'perusahaan.id', 'pengajuan_magang_pkl.id_perusahaan')
        ->select('pengajuan_magang_pkl.id', 'pengajuan_magang_pkl.jenis_kegiatan', 'perusahaan.nama_perusahaan')
        ->get();

        $data['review_pertanyaan'] = ReviewPertanyaan::select('id', 'pertanyaan', 'tipe_pertanyaan')->get();
        return view('siswa.pages.unggah_dokumen', compact('data'));
    }

    public function go_create_dokumen_review(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'id_magang_pkl' => ['required', 'string'],
            'judul_laporan' => ['required', 'string'],
            'file_laporan_ms_word' => ['required', 'mimes:doc,docx'],
            'file_laporan_pdf' => ['required', 'mimes:pdf', 'max:10240'],
            'dr_sangat_rendah' => ['required', 'integer', 'max:10240'],
            'dr_rendah' => ['required', 'integer'],
            'dr_tinggi' => ['required', 'integer'],
            'dr_sangat_tinggi' => ['required', 'integer'],
            'dr_total_score' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // dd(Auth::guard('siswa')->user()->id);
        $query = DokumenReview::create([
            'id_siswa' => Auth::guard('siswa')->user()->id,
            'id_magang_pkl' => $request->id_magang_pkl,
            'judul_laporan' => $request->judul_laporan,
            'file_laporan_ms_word' => $this->uploadFile($request->file_laporan_ms_word, 'file_dokumen'),
            'file_laporan_pdf' => $this->uploadFile($request->file_laporan_pdf, 'file_dokumen'),
            'jumlah_review_score_sangat_rendah' => $request->dr_sangat_rendah,
            'jumlah_review_score_rendah' => $request->dr_rendah,
            'jumlah_review_score_tinggi' => $request->dr_tinggi,
            'jumlah_review_score_sangat_tinggi' => $request->dr_sangat_tinggi,
            'total_score_review' => $request->dr_total_score,
        ]);

        if ($query) {
            return redirect()->back()->with(['success' => 'Seluruh informasi berhasil diupload']);
        } else {
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
    }
}
