<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\DokumenReview;
use App\Models\GuruPembimbing;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        $data['jurusan'] = Jurusan::paginate();
        return view('admin.pages.master-data.jurusan.list', compact('data'));
    }

    public function create()
    {
        return view('admin.pages.master-data.jurusan.create');
    }
}
