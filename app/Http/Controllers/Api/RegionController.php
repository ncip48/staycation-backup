<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function get_regencies($id)
    {
        $data['provinces'] = DB::connection('mysql2')
            ->table('regencies')
            ->select('*')
            ->where('province_id', $id)
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Success get regencies',
            'data' => $data,
        ]);
    }
}
