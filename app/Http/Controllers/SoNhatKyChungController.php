<?php

namespace App\Http\Controllers;

use App\Models\ChungTuGhiSo;
use App\Models\ChungTuGhiSoChiTiet;
use App\Models\PhieuChi;
use App\Models\PhieuChiChiTiet;
use App\Models\PhieuNhapHangHoa;
use App\Models\PhieuNhapHangHoaChiTiet;
use App\Models\PhieuThu;
use App\Models\PhieuThuChiTiet;
use App\Models\PhieuXuatHangHoa;
use App\Models\PhieuXuatHangHoaChiTiet;
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

            case 'NH':
                $sonhatky = PhieuNhapHangHoa::get();
                return response()->json($sonhatky);
                break;

            case 'XH':
                $sonhatky = PhieuXuatHangHoa::get();
                return response()->json($sonhatky);
                break;

            case 'GS':
                $sonhatky = ChungTuGhiSo::get();
                return response()->json($sonhatky);
                break;

            case '':
                break;

            default:
                break;
        }
    }

    public function get_TK_NO(Request $request, $mchungtu)
    {
        switch ($request->LoaiChungTu) {
            case 'PT':
                $TaiKhoanNo = PhieuThuChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanNo');
                return response()->json($TaiKhoanNo);
                break;

            case 'PC':
                $TaiKhoanNo = PhieuChiChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanNo');
                return response()->json($TaiKhoanNo);
                break;

            case 'NH':
                $TaiKhoanNo = PhieuNhapHangHoa::where('MaChungTu', $mchungtu)->value('TaiKhoanNo');
                return response()->json($TaiKhoanNo);
                break;

            case 'XH':
                $TaiKhoanNo = PhieuXuatHangHoa::where('MaChungTu', $mchungtu)->value('TaiKhoanNoGiaBan');
                return response()->json($TaiKhoanNo);
                break;

            case 'GS':
                $TaiKhoanNo = ChungTuGhiSoChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanNo');
                return response()->json($TaiKhoanNo);
                break;

            case '':
                break;

            default:
                break;
        }
    }
    public function get_TK_CO(Request $request, $mchungtu)
    {
        switch ($request->LoaiChungTu) {
            case 'PT':
                $TaiKhoanCo = PhieuThuChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanCo');
                return response()->json($TaiKhoanCo);
                break;

            case 'PC':
                $TaiKhoanCo = PhieuChiChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanCo');
                return response()->json($TaiKhoanCo);
                break;

            case 'NH':
                $TaiKhoanCo = PhieuNhapHangHoa::where('MaChungTu', $mchungtu)->value('TaiKhoanCo');
                return response()->json($TaiKhoanCo);
                break;

            case 'XH':
                $TaiKhoanCo = PhieuXuatHangHoa::where('MaChungTu', $mchungtu)->value('TaiKhoanCoGiaBan');
                return response()->json($TaiKhoanCo);
                break;

            case 'GS':
                $TaiKhoanCo = ChungTuGhiSoChiTiet::where('MaChungTu', $mchungtu)->value('TaiKhoanCo');
                return response()->json($TaiKhoanCo);
                break;
            case '':
                break;

            default:
                break;
        }
    }
    public function get_SoTien(Request $request, $mchungtu)
    {
        switch ($request->LoaiChungTu) {
            case 'PT':
                $SoTien = PhieuThuChiTiet::where('MaChungTu', $mchungtu)->value('SoTien');
                return response()->json($SoTien);
                break;

            case 'PC':
                $SoTien = PhieuChiChiTiet::where('MaChungTu', $mchungtu)->value('SoTien');
                return response()->json($SoTien);
                break;

            case 'NH':
                $SoTien = PhieuNhapHangHoaChiTiet::where('MaChungTu', $mchungtu)->value('ThanhTien');
                return response()->json($SoTien);
                break;

            case 'XH':
                $SoTien = PhieuXuatHangHoaChiTiet::where('MaChungTu', $mchungtu)->value('ThanhTienGiaBan');
                return response()->json($SoTien);
                break;

            case 'GS':
                $SoTien = ChungTuGhiSoChiTiet::where('MaChungTu', $mchungtu)->value('SoTien');
                return response()->json($SoTien);
                break;
            case '':
                break;

            default:
                break;
        }
    }
    //--------------------------------------------------------------------------- //
}
