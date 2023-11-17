<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DanhMucHangHoa;

class DanhMucHangHoasController extends Controller
{
    public function index()
    {
        $danhmuchanghoa = DanhMucHangHoa::get();

        return view('content.danhmuc.danhmuchanghoa', compact('danhmuchanghoa'));
    }


    public function store(Request $request)
    {
        $exist_MaHang = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('MaHang');

        if (!$exist_MaHang) {
            $validator = Validator::make($request->all(), [
                'MaHang' => 'required',
                'TenHang' => 'required',
                'NhomHang' => 'required',
                'DonViTinh' => 'required',
                'SoLuongTonDau' => 'required',
                'ThanhTienTonDau' => 'required',
                'NgayTonDau' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }

            DanhMucHangHoa::create([
                'MaHang' => $request->MaHang,
                'TenHang' => $request->TenHang,
                'NhomHang' => $request->NhomHang,
                'DonViTinh' => $request->DonViTinh,
                'SoLuongTonDau' => $request->SoLuongTonDau,
                'ThanhTienTonDau' => $request->ThanhTienTonDau,
                'NgayTonDau' => $request->NgayTonDau,
            ]);

            return response()->json(['success']);
        } else {
            return response()->json(['error'], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $danhmuchanghoa = DanhMucHangHoa::find($id);

        if (!$danhmuchanghoa) {
            return response()->json(['error']);
        }

        $danhmuchanghoa->update([
            'TenHang' => $request->TenHang,
            'NhomHang' => $request->NhomHang,
            'DonViTinh' => $request->DonViTinh,
            'SoLuongTonDau' => $request->SoLuongTonDau,
            'ThanhTienTonDau' => $request->ThanhTienTonDau,
            'NgayTonDau' => $request->NgayTonDau,
        ]);

        return response()->json(['success']);
    }

    public function delete($id)
    {
        DanhMucHangHoa::find($id)->delete();

        return response()->json(['success']);
    }


    // ------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Lấy thông tin hàng hóa
    public function get_HangHoa()
    {
        $hanghoa = DanhMucHangHoa::pluck('MaHang');
        return response()->json($hanghoa);
    }
}
