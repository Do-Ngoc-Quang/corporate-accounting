<?php

namespace App\Http\Controllers;

use App\Models\PhieuChi;
use App\Models\PhieuThu;
use App\Models\PhieuThuChiTiet;
use Illuminate\Http\Request;

class SoNhatKyChungController extends Controller
{
    public function index()
    {
        $sonhatky = [];
        return view('content.nhatky.sonhatkychung', compact('sonhatky'));
    }

    //Phiếu thu ----------------------------------------------------------------- //
    public function get_PT()
    {
        $sonhatky = PhieuThu::get();
        return response()->json($sonhatky);
    }

    public function get_TK_NO($mchungtu)
    {
        $TaiKhoanNo = PhieuThuChiTiet::where('MaChungTu',$mchungtu)->value('TaiKhoanNo');
        return response()->json($TaiKhoanNo);
    }
    public function get_TK_CO($mchungtu)
    {
        $TaiKhoanCo = PhieuThuChiTiet::where('MaChungTu',$mchungtu)->value('TaiKhoanCo');
        return response()->json($TaiKhoanCo);
    }
    //--------------------------------------------------------------------------- //

    public function get_PC()
    {
        $sonhatky = PhieuChi::get();
        return response()->json($sonhatky);
    }
}
