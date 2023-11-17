<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PhieuXuatHangHoa;
use App\Models\PhieuXuatHangHoaChiTiet;
use App\Models\DanhMucTaiKhoan;
use App\Models\DanhMucHangHoa;
use App\Models\PhieuNhapHangHoa;

class PhieuXuatHangHoasController extends Controller
{
    // ------------------------------------------------------------------------------------------------------------------------- //
    public function index()
    {
        $phieuxuathanghoa = PhieuXuatHangHoa::get();
        return view('content.giaodich.phieuxuathanghoa', compact('phieuxuathanghoa'));
    }

    // Lấy data của Phiếu xuất để hiển thị lên màn hình
    public function get_PhieuXuatHangHoa($machungtu)
    {
        $phieuxuathanghoa = PhieuXuatHangHoa::where('MaChungTu', $machungtu)->get();
        return response()->json($phieuxuathanghoa);
    }

    //Hàm xử lý tạo mới 
    public function store(Request $request)
    {
        $exist_PhieuXuatHangHoa = PhieuXuatHangHoa::where('MaChungTu', $request->MaChungTu)->value('MaChungTu');

        //Kiểm tra xem đã tồn tại trong database chưa
        if (!$exist_PhieuXuatHangHoa) {

            $validator = Validator::make($request->all(), [
                //Phiếu nhập
                'MaChungTu' => 'required',
                'LoaiChungTu' => 'required',
                'NgayChungTu' => 'required',
                'SoChungTu' => 'required',
                'DienGiai' => 'required',

                'MaKhachHang' => 'required',
                'TenKhachHang' => 'required',
                'MaSoThue' => 'required',

                'TaiKhoanNoGiaVon' => 'required',
                'TaiKhoanCoGiaVon' => 'required',
                'TaiKhoanNoGiaBan' => 'required',
                'TaiKhoanCoGiaBan' => 'required',
                'TaiKhoanCoGTGT' => 'required',

                'MatHang' => 'required',
                'SoXeRy' => 'required',
                'SoHoaDon' => 'required',
                'NgayHoaDon' => 'required',
                'ThueSuat' => 'required',
                'ThueGTGT' => 'required',

                //Phiếu nhập chi tiết
                'MaHang' => 'required',
                'DonViTinh' => 'required',
                'SoLuong' => 'required',

                'DonGiaVon' => 'required',
                'ThanhTienGiaVon' => 'required',
                'DonGiaBan' => 'required',
                'ThanhTienGiaBan' => 'required',
                'MaChungTuNhap' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }


            PhieuXuatHangHoa::create([
                'MaChungTu' => $request->MaChungTu,
                'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                'SoChungTu' => $request->SoChungTu,
                'DienGiai' => $request->DienGiai,

                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,

                'TaiKhoanNoGiaVon' => $request->TaiKhoanNoGiaVon,
                'TaiKhoanCoGiaVon' => $request->TaiKhoanCoGiaVon,
                'TaiKhoanNoGiaBan' => $request->TaiKhoanNoGiaBan,
                'TaiKhoanCoGiaBan' => $request->TaiKhoanCoGiaBan,
                'TaiKhoanCoGTGT' => $request->TaiKhoanCoGTGT,

                'MatHang' => $request->MatHang,
                'SoXeRy' => $request->SoXeRy,
                'SoHoaDon' => $request->SoHoaDon,
                'NgayHoaDon' => $request->NgayHoaDon,
                'ThueSuat' => $request->ThueSuat,
                'ThueGTGT' => $request->ThueGTGT
            ]);

            PhieuXuatHangHoaChiTiet::create([
                'MaChungTu' => $request->MaChungTu,
                'MaHang' => $request->MaHang,
                'DonViTinh' => $request->DonViTinh,
                'SoLuong' => $request->SoLuong,

                'DonGiaVon' => $request->DonGiaVon,
                'ThanhTienGiaVon' => $request->ThanhTienGiaVon,
                'DonGiaBan' => $request->DonGiaBan,
                'ThanhTienGiaBan' => $request->ThanhTienGiaBan,
                'MaChungTuNhap' => $request->MaChungTuNhap
            ]);


            //Cập nhật số dư cho tài khoản gốc
            $id_TaiKhoanNoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaVon)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoanCoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaVon)->value('id'); // lấy id của tài khoản ghi nhận có
            $id_TaiKhoanNoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaBan)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoanCoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaBan)->value('id'); // lấy id của tài khoản ghi nhận có
            $id_TaiKhoanCoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGTGT)->value('id'); // lấy id của tài khoản ghi nhận có

            $SoDuNoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaVon)->value('SoDuNoDau');
            $SoDuCoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaVon)->value('SoDuCoDau');
            $SoDuNoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaBan)->value('SoDuNoDau');
            $SoDuCoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaBan)->value('SoDuCoDau');
            $SoDuCoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGTGT)->value('SoDuCoDau');

            $temp_SoDuNoGiaVon = (float)$SoDuNoGiaVon + (float)$request->ThanhTienGiaVon;
            $temp_SoDuCoGiaVon = (float)$SoDuCoGiaVon + (float)$request->ThanhTienGiaVon;
            $temp_SoDuNoGiaBan = (float)$SoDuNoGiaBan + (float)$request->ThanhTienGiaBan;
            $temp_SoDuCoGiaBan = (float)$SoDuCoGiaBan + (float)$request->ThanhTienGiaBan;
            $temp_SoDuCoDau_GTGT = (float)$SoDuCoDau_GTGT + (float)$request->ThueGTGT;


            //Cập nhật số dư nợ cho tài khoản ghi nhận nợ
            $taiKhoanNoGiaVon = DanhMucTaiKhoan::find($id_TaiKhoanNoGiaVon);
            $taiKhoanNoGiaVon->update([
                'SoDuNoDau' => $temp_SoDuNoGiaVon
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận có
            $taiKhoanCoGiaVon = DanhMucTaiKhoan::find($id_TaiKhoanCoGiaVon);
            $taiKhoanCoGiaVon->update([
                'SoDuCoDau' => $temp_SoDuCoGiaVon
            ]);

            //Cập nhật số dư nợ cho tài khoản ghi nhận nợ
            $taiKhoanNoGiaBan = DanhMucTaiKhoan::find($id_TaiKhoanNoGiaBan);
            $taiKhoanNoGiaBan->update([
                'SoDuNoDau' => $temp_SoDuNoGiaBan
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận có
            $taiKhoanCoGiaBan = DanhMucTaiKhoan::find($id_TaiKhoanCoGiaBan);
            $taiKhoanCoGiaBan->update([
                'SoDuCoDau' => $temp_SoDuCoGiaBan
            ]);

            //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận có
            $taiKhoanCoGTGT = DanhMucTaiKhoan::find($id_TaiKhoanCoGTGT);
            $taiKhoanCoGTGT->update([
                'SoDuCoDau' => $temp_SoDuCoDau_GTGT
            ]);



            //Cập nhật số lượng và thành tiền tồn đầu
            $id_HangHoa = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('id'); // lấy id của hàng hóa
            $SoLuongTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('SoLuongTonDau');
            $ThanhTienTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('ThanhTienTonDau');

            $temp_SoLuongTonDau = (float)$SoLuongTonDau - (float)$request->SoLuong;
            $temp_ThanhTienTonDau = (float)$ThanhTienTonDau - (float)$request->ThanhTienGiaVon;

            $hanghoa = DanhMucHangHoa::find($id_HangHoa);
            $hanghoa->update([
                'SoLuongTonDau' => $temp_SoLuongTonDau,
                'ThanhTienTonDau' => $temp_ThanhTienTonDau
            ]);


            //Kiểm thử dữ liệu
            $data = [
                // '$id_TaiKhoanNoGiaVon' => $id_TaiKhoanNoGiaVon,
                // '$id_TaiKhoanCoGiaVon' => $id_TaiKhoanCoGiaVon,
                // '$id_TaiKhoanNoGiaBan' => $id_TaiKhoanNoGiaBan,
                // '$id_TaiKhoanCoGiaBan' => $id_TaiKhoanCoGiaBan,
                // '$id_TaiKhoanCoGTGT' => $id_TaiKhoanCoGTGT,

                // '$SoDuNoGiaVon' => $SoDuNoGiaVon,
                // '$SoDuCoGiaVon' => $SoDuCoGiaVon,
                // '$SoDuNoGiaBan' => $SoDuNoGiaBan,
                // '$SoDuCoGiaBan' => $SoDuCoGiaBan,
                // '$SoDuCoDau_GTGT' => $SoDuCoDau_GTGT,

                // '$temp_SoDuNoGiaVon' => $temp_SoDuNoGiaVon,
                // '$temp_SoDuCoGiaVon' => $temp_SoDuCoGiaVon,
                // '$temp_SoDuNoGiaBan' => $temp_SoDuNoGiaBan,
                // '$temp_SoDuCoGiaBan' => $temp_SoDuCoGiaBan,
                // '$temp_SoDuCoDau_GTGT' => $temp_SoDuCoDau_GTGT,


                // '$id_HangHoa' => $id_HangHoa,
                // '$SoLuongTonDau' => $SoLuongTonDau,
                // '$ThanhTienTonDau' => $ThanhTienTonDau,
                // '$request->SoLuong' => $request->SoLuong,
                // '$request->ThanhTienGiaVon' => $request->ThanhTienGiaVon,
                // '$temp_SoLuongTonDau' => $temp_SoLuongTonDau,
                // '$temp_ThanhTienTonDau' => $temp_ThanhTienTonDau,
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
        $phieuxuathanghoa = PhieuXuatHangHoa::find($id);

        if ($phieuxuathanghoa) {

            //Cập nhật lại số dư tài khoản
            $id_TaiKhoanCoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGTGT)->value('id'); // lấy id của tài khoản ghi nhận có

            $SoDuCoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGTGT)->value('SoDuCoDau');

            //Lấy Thuế GTGT trong cơ sở dũ liệu để so sánh
            $ThueGTGT_in_database = PhieuXuatHangHoa::where('id', $id)->value('ThueGTGT');

            if ((float)$ThueGTGT_in_database > (float)$request->ThueGTGT) {
                $temp_SoDuCoDau_GTGT = (float)$SoDuCoDau_GTGT - ((float)$ThueGTGT_in_database - (float)$request->ThueGTGT);
            } else {
                $temp_SoDuCoDau_GTGT = (float)$SoDuCoDau_GTGT + ((float)$request->ThueGTGT - (float)$ThueGTGT_in_database);
            }

            // Cập nhật
            $phieuxuathanghoa->update([

                // 'MaChungTu' => $request->MaChungTu,
                // 'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                // 'SoChungTu' => $request->SoChungTu,
                'DienGiai' => $request->DienGiai,

                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,

                'TaiKhoanNoGiaVon' => $request->TaiKhoanNoGiaVon,
                'TaiKhoanCoGiaVon' => $request->TaiKhoanCoGiaVon,
                'TaiKhoanNoGiaBan' => $request->TaiKhoanNoGiaBan,
                'TaiKhoanCoGiaBan' => $request->TaiKhoanCoGiaBan,
                'TaiKhoanCoGTGT' => $request->TaiKhoanCoGTGT,

                'MatHang' => $request->MatHang,
                'SoXeRy' => $request->SoXeRy,
                'SoHoaDon' => $request->SoHoaDon,
                'NgayHoaDon' => $request->NgayHoaDon,
                'ThueSuat' => $request->ThueSuat,
                'ThueGTGT' => $request->ThueGTGT

            ]);


            //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận có
            $taiKhoanCoGTGT = DanhMucTaiKhoan::find($id_TaiKhoanCoGTGT);
            $taiKhoanCoGTGT->update([
                'SoDuCoDau' => $temp_SoDuCoDau_GTGT
            ]);


            // //Kiểm thử dữ liệu
            // $data = [

            //     // '$id_TaiKhoanCoGTGT' => $id_TaiKhoanCoGTGT,

            //     // '$SoDuCoDau_GTGT' => $SoDuCoDau_GTGT,

            //     // '$temp_SoDuCoDau_GTGT' => $temp_SoDuCoDau_GTGT,
            //     // 'ThueGTGT_in_database' => $ThueGTGT_in_database,
            //     // 'request->ThueGTGT' => $request->ThueGTGT
            // ];
            // return response()->json($data);

            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }


    // --------------------------------------------------------------------------------------------------------------------------------------------------------- //

    //Lấy dữ liệu bảng phiếu nhập chi tiết để hiển thị ra màn hình
    public function get_PhieuXuatHangHoaChiTiet($machungtu)
    {
        $phieuxuathanghoachitiet = PhieuXuatHangHoaChiTiet::where('MaChungTu', $machungtu)->get();
        return response()->json($phieuxuathanghoachitiet);
    }

    //Hàm xử lý cập nhập chi tiết (bảng phụ)
    public function phieuxuathanghoachitiet_update(Request $request, $id)
    {
        $phieuxuathanghoachitiet = PhieuXuatHangHoaChiTiet::find($id);

        if ($phieuxuathanghoachitiet) {

            //Cập nhật lại số dư tài khoản
            $id_TaiKhoanNoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaVon)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoanCoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaVon)->value('id'); // lấy id của tài khoản ghi nhận có
            $id_TaiKhoanNoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaBan)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoanCoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaBan)->value('id'); // lấy id của tài khoản ghi nhận có
            $id_TaiKhoanCoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGTGT)->value('id'); // lấy id của tài khoản ghi nhận có

            $SoDuNoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaVon)->value('SoDuNoDau');
            $SoDuCoGiaVon = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaVon)->value('SoDuCoDau');
            $SoDuNoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGiaBan)->value('SoDuNoDau');
            $SoDuCoGiaBan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGiaBan)->value('SoDuCoDau');
            $SoDuCoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCoGTGT)->value('SoDuCoDau');


            // //Lấy Thuế GTGT trong cơ sở dũ liệu để so sánh
            $ThueGTGT_in_database = PhieuXuatHangHoa::where('id', $request->Id_phieuxuathanghoa)->value('ThueGTGT');

            if ((float)$ThueGTGT_in_database > (float)$request->ThueGTGT) {
                $temp_SoDuCoDau_GTGT = (float)$SoDuCoDau_GTGT - ((float)$ThueGTGT_in_database - (float)$request->ThueGTGT);
            } else {
                $temp_SoDuCoDau_GTGT = (float)$SoDuCoDau_GTGT + ((float)$request->ThueGTGT - (float)$ThueGTGT_in_database);
            }

            //Lấy ThanhTienGiaVon trong cơ sở dữ liệu để so sánh
            $ThanhTienGiaVon_in_database = PhieuXuatHangHoaChiTiet::where('id', $id)->value('ThanhTienGiaVon');

            if ((float)$ThanhTienGiaVon_in_database != (float)$request->ThanhTienGiaVon) {
                $temp_SoDuNoGiaVon = (float)$SoDuNoGiaVon + ((float)$request->ThanhTienGiaVon - (float)$ThanhTienGiaVon_in_database);
                $temp_SoDuCoGiaVon = (float)$SoDuCoGiaVon + ((float)$request->ThanhTienGiaVon - (float)$ThanhTienGiaVon_in_database);
            } else {
                $temp_SoDuNoGiaVon = (float)$ThanhTienGiaVon_in_database;
                $temp_SoDuCoGiaVon = (float)$ThanhTienGiaVon_in_database;
            }

            //Lấy ThanhTienGiaBan trong cơ sở dữ liệu để so sánh
            $ThanhTienGiaBan_in_database = PhieuXuatHangHoaChiTiet::where('id', $id)->value('ThanhTienGiaBan');

            if ((float)$ThanhTienGiaBan_in_database != (float)$request->ThanhTienGiaBan) {
                $temp_SoDuNoGiaBan = (float)$SoDuNoGiaBan + ((float)$request->ThanhTienGiaBan - (float)$ThanhTienGiaBan_in_database);
                $temp_SoDuCoGiaBan = (float)$SoDuCoGiaBan + ((float)$request->ThanhTienGiaBan - (float)$ThanhTienGiaBan_in_database);
            } else {
                $temp_SoDuNoGiaBan = (float)$ThanhTienGiaBan_in_database;
                $temp_SoDuCoGiaBan = (float)$ThanhTienGiaBan_in_database;
            }


            // Cập nhật
            $phieuxuatphanghoa = PhieuXuatHangHoa::find($request->Id_phieuxuathanghoa);
            $phieuxuatphanghoa->update([
                'ThueGTGT' => $request->ThueGTGT
            ]);


            // //Cập nhật số lượng và thành tiền tồn đầu ------------------------------------------------------------------------ //
            $id_HangHoa = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('id'); // lấy id của hàng hóa
            $SoLuongTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('SoLuongTonDau');
            $ThanhTienTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('ThanhTienTonDau');

            //Lấy SoLuong trong cơ sở dữ liệu để so sánh
            $SoLuong_in_database = PhieuXuatHangHoaChiTiet::where('id', $id)->value('SoLuong');
            //Lấy ThanhTienGiaVon 
            $ThanhTienGiaVon_in_database = PhieuXuatHangHoaChiTiet::where('id', $id)->value('ThanhTienGiaVon');
            //Lấy ThanhTienGiaVon_in_database - Thành tiền đã được lấy ở trên - chỉ sử dụng lại

            if ((float)$SoLuong_in_database != (float)$request->SoLuong) {
                $temp_SoLuongTonDau = (float)$SoLuongTonDau - ((float)$request->SoLuong - (float)$SoLuong_in_database);
                $temp_ThanhTienTonDau = (float)$ThanhTienTonDau - ((float)$request->ThanhTienGiaVon - (float)$ThanhTienGiaVon_in_database);
            } else {
                $temp_SoLuongTonDau = (float)$SoLuong_in_database;
                $temp_ThanhTienTonDau = (float)$ThanhTienTonDau;
            }


            $hanghoa = DanhMucHangHoa::find($id_HangHoa);
            $hanghoa->update([
                'SoLuongTonDau' => $temp_SoLuongTonDau,
                'ThanhTienTonDau' => $temp_ThanhTienTonDau
            ]);

            // ---------------------------------------------------------------------------------------------------------------- //

            // Cập nhật chi tiết
            $phieuxuathanghoachitiet->update([

                'DonViTinh' => $request->DonViTinh,
                'SoLuong' => $request->SoLuong,

                'DonGiaVon' => $request->DonGiaVon,
                'ThanhTienGiaVon' => $request->ThanhTienGiaVon,
                'DonGiaBan' => $request->DonGiaBan,
                'ThanhTienGiaBan' => $request->ThanhTienGiaBan,
                'MaChungTuNhap' => $request->MaChungTuNhap
            ]);

            //Cập nhật số dư nợ cho tài khoản ghi nhận nợ
            $taiKhoanNoGiaVon = DanhMucTaiKhoan::find($id_TaiKhoanNoGiaVon);
            $taiKhoanNoGiaVon->update([
                'SoDuNoDau' => $temp_SoDuNoGiaVon
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận có
            $taiKhoanCoGiaVon = DanhMucTaiKhoan::find($id_TaiKhoanCoGiaVon);
            $taiKhoanCoGiaVon->update([
                'SoDuCoDau' => $temp_SoDuCoGiaVon
            ]);

            //Cập nhật số dư nợ cho tài khoản ghi nhận nợ
            $taiKhoanNoGiaBan = DanhMucTaiKhoan::find($id_TaiKhoanNoGiaBan);
            $taiKhoanNoGiaBan->update([
                'SoDuNoDau' => $temp_SoDuNoGiaBan
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận có
            $taiKhoanCoGiaBan = DanhMucTaiKhoan::find($id_TaiKhoanCoGiaBan);
            $taiKhoanCoGiaBan->update([
                'SoDuCoDau' => $temp_SoDuCoGiaBan
            ]);

            //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận có
            $taiKhoanCoGTGT = DanhMucTaiKhoan::find($id_TaiKhoanCoGTGT);
            $taiKhoanCoGTGT->update([
                'SoDuCoDau' => $temp_SoDuCoDau_GTGT
            ]);

            // //Kiểm thử dữ liệu
            // $data = [
            //     '$id_TaiKhoanNoGiaVon' => $id_TaiKhoanNoGiaVon,
            //     '$id_TaiKhoanCoGiaVon' => $id_TaiKhoanCoGiaVon,
            //     '$id_TaiKhoanNoGiaBan' => $id_TaiKhoanNoGiaBan,
            //     '$id_TaiKhoanCoGiaBan' => $id_TaiKhoanCoGiaBan,
            //     '$id_TaiKhoanCoGTGT' => $id_TaiKhoanCoGTGT,

            //     '$SoDuNoGiaVon' => $SoDuNoGiaVon,
            //     '$SoDuCoGiaVon' => $SoDuCoGiaVon,
            //     '$SoDuNoGiaBan' => $SoDuNoGiaBan,
            //     '$SoDuCoGiaBan' => $SoDuCoGiaBan,
            //     '$SoDuCoDau_GTGT' => $SoDuCoDau_GTGT,

            //     '$temp_SoDuNoGiaVon' => $temp_SoDuNoGiaVon,
            //     '$temp_SoDuCoGiaVon' => $temp_SoDuCoGiaVon,
            //     '$temp_SoDuNoGiaBan' => $temp_SoDuNoGiaBan,
            //     '$temp_SoDuCoGiaBan' => $temp_SoDuCoGiaBan,
            //     '$temp_SoDuCoDau_GTGT' => $temp_SoDuCoDau_GTGT,

            //     'DonGiaVon' => $request->DonGiaVon,
            //     '$request->ThanhTienGiaVon' => $request->ThanhTienGiaVon,
            //     'DonGiaBan' => $request->DonGiaBan,
            //     '$request->ThanhTienGiaBan' => $request->ThanhTienGiaBan,
            //     'SoLuong_in_database' => $SoLuong_in_database,
            //     '$request->SoLuong' => $request->SoLuong,

            //     '$id_HangHoa' => $id_HangHoa,
            //     '$SoLuongTonDau' => $SoLuongTonDau,
            //     '$ThanhTienTonDau' => $ThanhTienTonDau,
            //     '$request->SoLuong' => $request->SoLuong,
            //     '$request->ThanhTienGiaVon' => $request->ThanhTienGiaVon,
            //     '$temp_SoLuongTonDau' => $temp_SoLuongTonDau,
            //     '$temp_ThanhTienTonDau' => $temp_ThanhTienTonDau,
            //     'ThanhTienGiaVon_in_database' => $ThanhTienGiaVon_in_database,
            //     'ThanhTienGiaBan_in_database' => $ThanhTienGiaBan_in_database,

            // ];
            // return response()->json($data);

            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }

    // ---------------------------------------------------------------------------------------------------- //
    //Lấy thông tin phiếu nhập hàng - MaChungTu
    public function get_PhieuXuatHang()
    {
        $phieuxuathang = PhieuXuatHangHoa::pluck('MaChungTu');
        return response()->json($phieuxuathang);
    }
}
// Cần làm lại cái đơn giá vốn có sẵn khi nhập ở phiếu nhập
//Cần làm lại cái số lượng, không được phép xuất quá số lượng nhập.