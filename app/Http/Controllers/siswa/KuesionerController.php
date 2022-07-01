<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;
use App\Models\JurnalHarian;
use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerJawabanSelect;
use App\Models\KuesionerSelect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KuesionerController extends Controller
{
    public function index()
    {
        $data['kuesioner'] = Kuesioner::where('for', 'siswa')->get();
        for ($i=0; $i < count($data['kuesioner']); $i++) {
            $data['kuesioner'][$i]->option = KuesionerSelect::where('id_kuesioner', $data['kuesioner'][$i]->id)->get();
        }

        if (KuesionerJawaban::where([['for', 'siswa'], ['id_user', Auth::guard('siswa')->user()->id]])->exists()) {
            $data['jawaban'] = KuesionerJawaban::select(
                'kuesioner_jawaban.id',
                'kuesioner_jawaban.id_kuesioner',
                'kuesioner_jawaban.id_user',
                'kuesioner_jawaban.jawaban',
                'kuesioner.for',
                'kuesioner.type',
                'kuesioner.pertanyaan',
            )
            ->where([['kuesioner_jawaban.for', 'siswa'], ['kuesioner_jawaban.id_user', Auth::guard('siswa')->user()->id]])
            ->join('kuesioner', 'kuesioner.id', 'kuesioner_jawaban.id_kuesioner')
            ->get();
            for ($i=0; $i < count($data['jawaban']); $i++) {
                $data['jawaban'][$i]->option = KuesionerJawabanSelect::where('id_kuesioner_jawaban', $data['jawaban'][$i]->id)->get();
            }
        }

        // dd($data);

        return view('siswa.pages.riwayat.kuesioner', compact('data'));
    }

    public function go_save_kuesioner(Request $request)
    {

        DB::beginTransaction();
        try {

            KuesionerJawaban::where([['for', 'siswa'], ['id_user', Auth::guard('siswa')->user()->id]])->delete();
            for ($i=0; $i < count($request->jawaban); $i++) {
                if ($request->jawaban[$i]['type'] !== 'select') {
                    KuesionerJawaban::create([
                        'id_kuesioner' => $request->jawaban[$i]['id'],
                        'id_user' => Auth::guard('siswa')->user()->id,
                        'for' => 'siswa',
                        'jawaban' => $request->jawaban[$i]['value']
                    ]);
                } else {
                    $id = KuesionerJawaban::create([
                        'id_kuesioner' => $request->jawaban[$i]['id'],
                        'id_user' => Auth::guard('siswa')->user()->id,
                        'for' => 'siswa',
                        'jawaban' => '-'
                    ])->id;
                        
                    for ($k=0; $k < count($request->jawaban[$i]['option']); $k++) { 
                        KuesionerJawabanSelect::firstOrCreate([
                            'id_kuesioner_jawaban' => $id,
                            'option' => $request->jawaban[$i]['option'][$k],
                        ]);
                    }
                }
               
            }
            DB::commit();
            return redirect()->back()->with(['success' => 'Kuesioner berhasil diperbarui']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['errors' => $e->getMessage()]);
        }
        
    }

    public function go_delete_kuesioner()
    {
        if (KuesionerJawaban::where([['for', 'siswa'], ['id_user', Auth::guard('siswa')->user()->id]])->exists()) {
            $query = KuesionerJawaban::where([['for', 'siswa'], ['id_user', Auth::guard('siswa')->user()->id]])->delete();
            
            if ($query) {
                return redirect()->back()->with(['success' => 'Kuesioner ini telah berhasil di hapus']);
            }
            return redirect()->back()->with(['errors' => 'Query gagal, Ada kesalahan sistem. Coba kembali beberapa saat']);
        }
        return redirect()->back()->with(['errors' => 'Kuesioner tidak ditemukan']);
    }
}
