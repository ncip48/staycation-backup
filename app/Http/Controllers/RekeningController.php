<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{

    public function __construct()
    {
    }

    public function index_api()
    {
        $rekening = Rekening::select('rekening.*', 'banks.nama', 'banks.logo')->where('rekening.status', 'Aktif')->join('banks', 'rekening.id_bank', '=', 'banks.id')->get();
        return response()->json($rekening);
    }
}
