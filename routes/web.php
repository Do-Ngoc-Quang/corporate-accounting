<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DanhMucTaiKhoansController;
use App\Http\Controllers\DanhMucKhachHangVaTaiKhoanCongNosController;
use App\Http\Controllers\DanhMucHangHoasController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhieuThusController;
use App\Http\Controllers\PhieuChisController;
use App\Http\Controllers\PhieuNhapHangHoasController;
use App\Http\Controllers\PhieuXuatHangHoasController;
use App\Http\Controllers\ChungTuGhiSosController;
use App\Http\Controllers\ChungTuKetChuyenController;
use App\Http\Controllers\ChungTuNganHangController;
use App\Http\Controllers\PhieuNhapHangTraLaiController;
use App\Http\Controllers\PhieuXuatHangTraLaiController;
use App\Http\Controllers\SoNhatKyChungController;
use App\Http\Controllers\USERController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Điều hướng vào trang login khi load trang lần đầu
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Tài khoán USER
    Route::controller(USERController::class)->group(function () {
        Route::get('user', 'index')->name('user');
        Route::put('user_update/{id}', 'update');
    });

    // Danh mục tài khoản
    Route::controller(DanhMucTaiKhoansController::class)->group(function () {
        Route::get('danhmuctaikhoan', 'index');
        Route::post('danhmuctaikhoan_add', 'store')->name('dmtk.store');
        Route::put('danhmuctaikhoan_update/{id}', 'update')->name('dmtk.update');
        Route::delete('danhmuctaikhoan_delete/{id}', 'delete')->name('dmtk.delete');
    });

    // Danh mục hàng hóa
    Route::controller(DanhMucHangHoasController::class)->group(function () {
        Route::get('danhmuchanghoa', 'index');
        Route::post('danhmuchanghoa_add', 'store')->name('dmhh.store');
        Route::put('danhmuchanghoa_update/{id}', 'update')->name('dmhh.update');
        Route::delete('danhmuchanghoa_delete/{id}', 'delete')->name('dmhh.delete');

        // Lấy mã hàng hóa
        Route::get('get_maHangHoa', 'get_maHangHoa');

        //Lấy toàn bộ thông tin hàng hóa
        Route::get('get_HangHoa', 'get_HangHoa');
    });

    // Danh mục Khách hàng và các tài khoản công nợ
    Route::controller(DanhMucKhachHangVaTaiKhoanCongNosController::class)->group(function () {
        // Khách hàng
        Route::get('danhmuckhachhang', 'index');
        Route::post('danhmuckhachhang_add', 'store')->name('dmkh.store');
        Route::put('danhmuckhachhang_update/{id}', 'update');
        Route::delete('danhmuckhachhang_delete/{id}', 'delete');

        //Công nợ
        Route::get('taikhoancongnocuakhachhang/{makhachhang}', 'collect_CongNo');
        Route::get('collect_TaiKhoan', 'collect_TaiKhoan');
        Route::post('congnokhachhang_add', 'congno_store')->name('congno.store');
        Route::put('congnokhachhang_update/{id}', 'congno_update');
        Route::delete('congnokhachhang_delete/{id}', 'congno_delete');

        //Cập nhật số dư tài khoản
        Route::put('sodutaikhoan_add_first/{taikhoan}', 'sodutaikhoan_add_first');
        Route::put('sodutaikhoan_update/{taikhoan}', 'sodutaikhoan_update');
        Route::put('sodutaikhoan_delete/{taikhoan}', 'sodutaikhoan_delete');

        //Lấy thông tin khách hàng
        Route::get('get_KhachHang', 'get_KhachHang');
    });

    //Phiếu thu và chi tiết phiếu thu
    Route::controller(PhieuThusController::class)->group(function () {

        //Phiếu thu
        Route::get('phieuthu', 'index');
        Route::get('phieuthu/{machungtu}', 'get_PhieuThu');
        Route::post('phieuthu_add', 'store')->name('phieuthu.store');
        Route::put('phieuthu_update/{id}', 'update');
        // Route::delete('_delete/{id}', 'delete');

        //Phiếu thu chi tiết
        Route::get('phieuthuchitiet/{machungtu}', 'get_PhieuThuChiTiet');
        Route::put('phieuthuchitiet_update/{id}', 'phieuthuchitiet_update');
    });

    //Phiếu chi và chi tiết phiếu thu
    Route::controller(PhieuChisController::class)->group(function () {

        //Phiếu thu
        Route::get('phieuchi', 'index');
        Route::get('phieuchi/{machungtu}', 'get_PhieuChi');
        Route::post('phieuchi_add', 'store')->name('phieuchi.store');
        Route::put('phieuchi_update/{id}', 'update');
        // Route::delete('_delete/{id}', 'delete');

        //Phiếu thu chi tiết
        Route::get('phieuchichitiet/{machungtu}', 'get_PhieuChiChiTiet');
        Route::put('phieuchichitiet_update/{id}', 'phieuchichitiet_update');
    });


    //Phiếu nhập hàng hóa
    Route::controller(PhieuNhapHangHoasController::class)->group(function () {
        //Phiếu nhập
        Route::get('phieunhaphanghoa', 'index');
        Route::get('phieunhaphanghoa/{machungtu}', 'get_PhieuNhapHangHoa');
        Route::post('phieunhaphanghoa_add', 'store')->name('phieunhaphanghoa.store');
        Route::put('phieunhaphanghoa_update/{id}', 'update');

        //Chi tiết phiếu nhập
        Route::get('phieunhaphanghoachitiet/{machungtu}', 'get_PhieuNhapHangHoaChiTiet');
        Route::put('phieunhaphanghoachitiet_update/{id}', 'phieunhaphanghoachitiet_update');

        //
        Route::get('get_maPhieuNhapHang', 'get_maPhieuNhapHang');
        Route::get('get_PhieuNhapHang', 'get_PhieuNhapHang');
        Route::get('get_DonGia/{machungtu}', 'get_DonGia');
    });

    //Phiếu xuất hàng hóa
    Route::controller(PhieuXuatHangHoasController::class)->group(function () {
        //Phiếu xuất
        Route::get('phieuxuathanghoa', 'index');
        Route::get('phieuxuathanghoa/{machungtu}', 'get_PhieuXuatHangHoa');
        Route::post('phieuxuathanghoa_add', 'store')->name('phieuxuathanghoa.store');
        Route::put('phieuxuathanghoa_update/{id}', 'update');

        //Chi tiết phiếu xuất
        Route::get('phieuxuathanghoachitiet/{machungtu}', 'get_PhieuXuatHangHoaChiTiet');
        Route::put('phieuxuathanghoachitiet_update/{id}', 'phieuxuathanghoachitiet_update');

        //
        Route::get('get_PhieuXuatHang', 'get_PhieuXuatHang');
    });

    //Chứng từ ghi sổ
    Route::controller(ChungTuGhiSosController::class)->group(function () {
        //Chứng từ ghi sổ
        Route::get('chungtughiso', 'index');
        Route::get('chungtughiso/{machungtu}', 'get_Chungtughiso');
        Route::post('chungtughiso_add', 'store')->name('chungtughiso.store');
        Route::put('chungtughiso_update/{id}', 'update');

        //Chứng từ ghi sổ chi tiết
        Route::get('chungtughisochitiet/{machungtu}', 'get_Chungtughisochitiet');
        Route::put('chungtughisochitiet_update/{id}', 'chungtughisochitiet_update');
    });

    //Chứng từ ngân hàng
    Route::controller(ChungTuNganHangController::class)->group(function () {
        //Chứng từ ngân hàng
        Route::get('chungtunganhang', 'index');
        Route::get('chungtunganhang/{machungtu}', 'get_Chungtunganhang');
        Route::post('chungtunganhang_add', 'store')->name('chungtunganhang.store');
        Route::put('chungtunganhang_update/{id}', 'update');

        //Chứng từ ngân hàng chi tiết
        Route::get('chungtunganhangchitiet/{machungtu}', 'get_Chungtunganhangchitiet');
        Route::put('chungtunganhangchitiet_update/{id}', 'chungtunganhangchitiet_update');
    });

    //Chứng từ kết chuyển
    Route::controller(ChungTuKetChuyenController::class)->group(function () {
        //Chứng từ ngân hàng
        Route::get('chungtuketchuyen', 'index');
        Route::get('chungtuketchuyen/{machungtu}', 'get_chungtuketchuyen');
        Route::post('chungtuketchuyen_add', 'store')->name('chungtuketchuyen.store');
        Route::put('chungtuketchuyen_update/{id}', 'update');

        //Chứng từ ngân hàng chi tiết
        Route::get('chungtuketchuyenchitiet/{machungtu}', 'get_chungtuketchuyenchitiet');
        Route::put('chungtuketchuyenchitiet_update/{id}', 'chungtuketchuyenchitiet_update');
    });

    //Phiếu nhập hàng trả lại
    Route::controller(PhieuNhapHangTraLaiController::class)->group(function () {
        //Phiếu nhập hàng trả lại
        Route::get('phieunhaphangtralai', 'index');
        Route::get('phieunhaphangtralai/{machungtu}', 'get_phieunhaphangtralai');
        Route::post('phieunhaphangtralai_add', 'store')->name('phieunhaphangtralai.store');
        Route::put('phieunhaphangtralai_update/{id}', 'update');

        //Chi tiết
        Route::get('phieunhaphangtralaichitiet/{machungtu}', 'get_phieunhaphangtralaichitiet');
        Route::put('phieunhaphangtralaichitiet_update/{id}', 'phieunhaphangtralaichitiet_update');
    });

    //Phiếu xuất hàng trả lại
    Route::controller(PhieuXuatHangTraLaiController::class)->group(function () {
        //Phiếu xuất hàng trả lại
        Route::get('phieuxuathangtralai', 'index');
        Route::get('phieuxuathangtralai/{machungtu}', 'get_phieuxuathangtralai');
        Route::post('phieuxuathangtralai_add', 'store')->name('phieuxuathangtralai.store');
        Route::put('phieuxuathangtralai_update/{id}', 'update');

        //Chi tiết
        Route::get('phieuxuathangtralaichitiet/{machungtu}', 'get_phieuxuathangtralaichitiet');
        Route::put('phieuxuathangtralaichitiet_update/{id}', 'phieuxuathangtralaichitiet_update');
    });

    //Sổ nhật ký chung
    Route::controller(SoNhatKyChungController::class)->group(function () {
        Route::get('sonhatkychung', 'index');

        //Phiếu thu
        Route::get('get_ChungTu', 'get_ChungTu');
        Route::get('get_TK_NO/{machungtu}', 'get_TK_NO');
        Route::get('get_TK_CO/{machungtu}', 'get_TK_CO');
        Route::get('get_SoTien/{machungtu}', 'get_SoTien');

        //Phiếu chi
        // Route::get('get_PC', 'get_PC');
    });

    //Phân quyền
    Route::controller(PhanQuyenController::class)->group(function () {
        Route::get('phanquyen', 'index');
    });
});
