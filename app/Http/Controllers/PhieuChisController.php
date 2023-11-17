<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhieuChi;
use App\Models\PhieuChiChiTiet;
use Illuminate\Support\Facades\Validator;
use App\Models\DanhMucTaiKhoan;

class PhieuChisController extends Controller
{

    public function index()
    {
        $phieuchi = PhieuChi::get();
        return view('content.giaodich.phieuchi', compact('phieuchi'));
    }

    public function get_PhieuChi($machungtu)
    {
        $phieuchi = PhieuChi::where('MaChungTu', $machungtu)->get();

        return response()->json($phieuchi);
    }

    //Hàm xử lý tạo mới 
    public function store(Request $request)
    {
        $exist_PhieuChi = PhieuChi::where('MaChungTu', $request->MaChungTu)->value('MaChungTu');

        //Kiểm tra xem đã tồn tại phiếu chi này có trong database chưa
        if (!$exist_PhieuChi) {

            $validator = Validator::make($request->all(), [
                //Phiếu chi
                'MaChungTu' => 'required',
                'LoaiChungTu' => 'required',
                'NgayChungTu' => 'required',
                'SoChungTu' => 'required',
                'HoTen' => 'required',
                'DiaChi' => 'required',
                'SoChungTuGoc' => 'required',
                'MaKhachHang' => 'required',
                'TenKhachHang' => 'required',
                'MaSoThue' => 'required',
                'DienGiai' => 'required',
                'BieuThue' => 'required',
                'SoXeRy' => 'required',
                'SoHoaDon' => 'required',
                'NgayHoaDon' => 'required',
                'ThueSuat' => 'required',
                'MatHang' => 'required',

                //Phiếu chi chi tiết
                'DienGiaiChiTiet' => 'required',
                'SoTien' => 'required',
                'TaiKhoanNo' => 'required',
                'TaiKhoanCo' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }

            PhieuChi::create([
                'MaChungTu' => $request->MaChungTu,
                'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                'SoChungTu' => $request->SoChungTu,
                'HoTen' => $request->HoTen,
                'DiaChi' => $request->DiaChi,
                'SoChungTuGoc' => $request->SoChungTuGoc,
                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,
                'DienGiai' => $request->DienGiai,
                'BieuThue' => $request->BieuThue,
                'SoXeRy' => $request->SoXeRy,
                'SoHoaDon' => $request->SoHoaDon,
                'NgayHoaDon' => $request->NgayHoaDon,
                'ThueSuat' => $request->ThueSuat,
                'MatHang' => $request->MatHang,
            ]);

            PhieuChiChiTiet::create([
                'MaChungTu' => $request->MaChungTu,
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                'TaiKhoanNo' => $request->TaiKhoanNo,
                'TaiKhoanCo' => $request->TaiKhoanCo
            ]);


            //Cập nhật số dư cho tài khoản gốc - Xử lý sau
            $id_TaiKhoan_No = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoan_Co = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('id'); // lấy id của tài khoản ghi nhận có

            $tongSoDuNoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('SoDuNoDau');
            $tongSoDuCoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('SoDuCoDau');

            $temp_SoDuNoDau = (float)$tongSoDuNoDau + (float)$request->SoTien;
            $temp_SoDuCoDau = (float)$tongSoDuCoDau + (float)$request->SoTien;

            //Cập nhật số dư nợ cho tài khoản ghi nhận tăng
            $taikhoanNO = DanhMucTaiKhoan::find($id_TaiKhoan_No);
            $taikhoanNO->update([
                'SoDuNoDau' => $temp_SoDuNoDau
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận giảm
            $taikhoanCO = DanhMucTaiKhoan::find($id_TaiKhoan_Co);
            $taikhoanCO->update([
                'SoDuCoDau' => $temp_SoDuCoDau
            ]);

            //Kiểm thử dữ liệu
            $data = [
                '$id_TaiKhoan_No' => $id_TaiKhoan_No,
                '$id_TaiKhoan_Co' => $id_TaiKhoan_Co,
                '$tongSoDuNoDau' => $tongSoDuNoDau,
                '$tongSoDuCoDau' => $tongSoDuCoDau,
                '$temp_SoDuNoDau' => $temp_SoDuNoDau,
                '$temp_SoDuCoDau' => $temp_SoDuCoDau,
                '$TaiKhoanNo' => $request->TaiKhoanNo,
                '$TaiKhoanCo' => $request->TaiKhoanCo,
                '$taikhoanNO' => $taikhoanNO,
                '$taikhoanCO' => $taikhoanCO
            ];
            return response()->json($data);


            return response()->json(['success']);
        } else {
            return response()->json(['error'], 400);
        }
    }

    //Hàm xử lý cập nhật
    public function update(Request $request, $id)
    {
        $phieuchi = PhieuChi::find($id);

        if ($phieuchi) {

            $phieuchi->update([
                // 'MaChungTu' => $request->MaChungTu,
                // 'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                // 'SoChungTu' => $request->SoChungTu,
                'HoTen' => $request->HoTen,
                'DiaChi' => $request->DiaChi,
                'SoChungTuGoc' => $request->SoChungTuGoc,
                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,
                'DienGiai' => $request->DienGiai,
                'BieuThue' => $request->BieuThue,
                'SoXeRy' => $request->SoXeRy,
                'SoHoaDon' => $request->SoHoaDon,
                'NgayHoaDon' => $request->NgayHoaDon,
                'ThueSuat' => $request->ThueSuat,
                'MatHang' => $request->MatHang,
            ]);
            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }

    // ------------------------------------------------------------------------------------------------------------------------------------//

    // Phiếu chi chi tiết
    public function get_PhieuChiChiTiet($machungtu)
    {
        $phieuchichitiet = PhieuChiChiTiet::where('MaChungTu', $machungtu)->get();

        return response()->json($phieuchichitiet);
    }


    //Hàm xử lý cập nhật thông tin phiếu chi chi tiết
    public function phieuchichitiet_update(Request $request, $id)
    {
        $phieuchichitiet = PhieuChiChiTiet::find($id);

        if ($phieuchichitiet) {

            //Cập nhật lại số dư tài khoản - Xử lý sau
            $id_TaiKhoan_No = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoan_Co = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('id'); // lấy id của tài khoản ghi nhận có

            $tongSoDuNoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('SoDuNoDau');
            $tongSoDuCoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('SoDuCoDau');

            //Lấy số tiền trong kho cơ sở dũ liệu để so sánh
            $SoTien_in_database = PhieuChiChiTiet::where('id', $id)->value('SoTien');

            if ((float)$SoTien_in_database > (float)$request->SoTien) {
                $temp_SoDuNoDau = (float)$tongSoDuNoDau - ((float)$SoTien_in_database - (float)$request->SoTien);
                $temp_SoDuCoDau = (float)$tongSoDuCoDau - ((float)$SoTien_in_database - (float)$request->SoTien);
            } else {
                $temp_SoDuNoDau = (float)$tongSoDuNoDau + ((float)$request->SoTien - (float)$SoTien_in_database);
                $temp_SoDuCoDau = (float)$tongSoDuCoDau + ((float)$request->SoTien - (float)$SoTien_in_database);
            }


            //Cập nhật chi tiết
            $phieuchichitiet->update([
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                // 'TaiKhoanNo' => $request->TaiKhoanNo,
                // 'TaiKhoanCo' => $request->TaiKhoanCo
            ]);

            //Cập nhật số dư nợ cho tài khoản ghi nhận tăng
            $taikhoanNO = DanhMucTaiKhoan::find($id_TaiKhoan_No);
            $taikhoanNO->update([
                'SoDuNoDau' => $temp_SoDuNoDau
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận giảm
            $taikhoanCO = DanhMucTaiKhoan::find($id_TaiKhoan_Co);
            $taikhoanCO->update([
                'SoDuCoDau' => $temp_SoDuCoDau
            ]);
            

            $data = ([
                'id' => $id,
                'id_TaiKhoan_No' => $id_TaiKhoan_No,
                'id_TaiKhoan_Co' => $id_TaiKhoan_Co,
                'SoTien_in_database' => $SoTien_in_database,
                'SoTien' => $request->SoTien,
                'temp_SoDuNoDau' => $temp_SoDuNoDau,
                'temp_SoDuCoDau' => $temp_SoDuCoDau,
                'tongSoDuNoDau' => $tongSoDuNoDau,
                'tongSoDuCoDau' => $tongSoDuCoDau,
            ]);
            return response()->json($data);

            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
