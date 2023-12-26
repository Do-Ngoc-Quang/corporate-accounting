<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTaiKhoan;
use Illuminate\Http\Request;
use App\Models\PhieuThu;
use App\Models\PhieuThuChiTiet;
use Illuminate\Support\Facades\Validator;

class PhieuThusController extends Controller
{
    //Phiếu thu
    public function index()
    {
        $phieuthu = PhieuThu::get();
        return view('content.giaodich.phieuthu', compact('phieuthu'));
    }

    public function index_baocao()
    {   
        $data = PhieuThu::get();
        return view('content.baocao.baocao', compact('data'));       
    }

    public function get_PhieuThu($machungtu)
    {
        $phieuthu = PhieuThu::where('MaChungTu', $machungtu)->get();

        return response()->json($phieuthu);
    }

    //Hàm xử lý tạo mới 
    public function store(Request $request)
    {
        $exist_PhieuThu = PhieuThu::where('MaChungTu', $request->MaChungTu)->value('MaChungTu');

        //Kiểm tra xem đã tồn tại phiếu thu này có trong database chưa
        if (!$exist_PhieuThu) {

            $validator = Validator::make($request->all(), [
                //Phiếu thu
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

                //Phiếu thu chi tiết
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

            PhieuThu::create([
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

            PhieuThuChiTiet::create([
                'MaChungTu' => $request->MaChungTu,
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                'TaiKhoanNo' => $request->TaiKhoanNo,
                'TaiKhoanCo' => $request->TaiKhoanCo
            ]);


            //Cập nhật số dư cho tài khoản gốc
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
        $phieuthu = PhieuThu::find($id);

        if ($phieuthu) {

            $phieuthu->update([
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

    // Phiếu thu chi tiết
    public function get_PhieuThuChiTiet($machungtu)
    {
        $phieuthuchitiet = PhieuThuChiTiet::where('MaChungTu', $machungtu)->get();

        return response()->json($phieuthuchitiet);
    }


    //Hàm xử lý cập nhật thông tin phiếu thu chi tiết
    public function phieuthuchitiet_update(Request $request, $id)
    {
        $phieuthuchitiet = PhieuThuChiTiet::find($id);

        if ($phieuthuchitiet) {

            //Cập nhật lại số dư tài khoản
            $id_TaiKhoan_No = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoan_Co = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('id'); // lấy id của tài khoản ghi nhận có

            $tongSoDuNoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('SoDuNoDau');
            $tongSoDuCoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('SoDuCoDau');

            //Lấy số tiền trong kho cơ sở dũ liệu để so sánh
            $SoTien_in_database = PhieuThuChiTiet::where('id', $id)->value('SoTien');

            if ((float)$SoTien_in_database > (float)$request->SoTien) {
                $temp_SoDuNoDau = (float)$tongSoDuNoDau - ((float)$SoTien_in_database - (float)$request->SoTien);
                $temp_SoDuCoDau = (float)$tongSoDuCoDau - ((float)$SoTien_in_database - (float)$request->SoTien);
            } else {
                $temp_SoDuNoDau = (float)$tongSoDuNoDau + ((float)$request->SoTien - (float)$SoTien_in_database);
                $temp_SoDuCoDau = (float)$tongSoDuCoDau + ((float)$request->SoTien - (float)$SoTien_in_database);
            }


            //Cập nhật chi tiết
            $phieuthuchitiet->update([
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
