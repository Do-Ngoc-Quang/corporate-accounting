<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChungTuKetChuyen;
use App\Models\ChungTuKetChuyenChiTiet;

class ChungTuKetChuyenController extends Controller
{
    public function index()
    {
        $chungtuketchuyen = ChungTuKetChuyen::get();
        return view('content.giaodich.chungtuketchuyen', compact('chungtuketchuyen'));
    }
}
