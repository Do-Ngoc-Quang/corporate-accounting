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
    public function get_ChungTu(Request $request)
    {
        switch ($request->LoaiChungTu) {

            case 'PT':
                $sonhatky = PhieuThu::get();
                return response()->json($sonhatky);
                break;
            case 'PC':
                $sonhatky = PhieuChi::get();
                return response()->json($sonhatky);
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
            case '':
                break;
        }
    }

    public function get_TK_NO(Request $request, $mchungtu)
    {

        $TaiKhoanNo = PhieuThuChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanNo');
        return response()->json($TaiKhoanNo);
    }
    public function get_TK_CO(Request $request, $mchungtu)
    {
        $TaiKhoanCo = PhieuThuChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanCo');
        return response()->json($TaiKhoanCo);
    }
    public function get_SoTien(Request $request, $mchungtu)
    {
        $SoTien = PhieuThuChiTiet::where('MaChungTu', $mchungtu)->value('SoTien');
        return response()->json($SoTien);
    }
    //--------------------------------------------------------------------------- //

    //Phiếu thu ----------------------------------------------------------------- //
    public function get_PC()
    {
    }
    //--------------------------------------------------------------------------- //

    // //Phiếu thu ----------------------------------------------------------------- //
    // public function get_()
    // {
    //     $sonhatky = ::get();
    //     return response()->json($sonhatky);
    // }
    // //--------------------------------------------------------------------------- //
}
