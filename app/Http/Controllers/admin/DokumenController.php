<?php



namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\DokumenRepositoryInterface;
use App\Models\DokumenReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DokumenController extends Controller
{
    private DokumenRepositoryInterface $dokumenRepository;

    public function __construct(DokumenRepositoryInterface $dokumenRepository) 
    {
        $this->dokumenRepository = $dokumenRepository;
    }

    public function index($tipe)
    {
        return view('admin.pages.dokumen.list', 
            ["data" => $this->dokumenRepository->listDokumen($tipe)]
        );
    }

    public function detail($id_dokumen)
    {
        return view('admin.pages.dokumen.detail', 
            ["data" => $this->dokumenRepository->detailDokumen($id_dokumen)]
        );
    }
}
