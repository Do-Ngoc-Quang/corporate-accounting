@extends('layouts.app')

@section('content')

<style>
    #select_loaiChungTu {
        margin-bottom: 10px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Menu bên trái -->
        @include('menu.menu')

        <!-- Khung hiển thị thông tin bên phải -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main">

            <h6 style="color: red;">SỔ NHẬT KÝ CHUNG</h6>

            <div>
                <label for="select_loaiChungTu">Loại: </label>
                <select id="select_loaiChungTu">
                    <option value="" disabled selected>Chọn loại chứng từ</option>
                    <option value="PT">Phiếu thu</option>
                    <option value="PC">Phiếu chi</option>
                    <option value="NH">Phiếu nhập</option>
                    <option value="XH">Phiếu xuất</option>
                    <option value="GS">Ghi sổ</option>
                    <option value="TG">Ngân hàng</option>
                </select>
            </div>
            <table class="custom-table" id="dataTable">
                <thead>
                    <tr>
                        <th style="width: 120px;">Loại chứng từ</th>
                        <th style="width: 120px;">Ngày</th>
                        <th style="width: 100px;">Số chứng từ</th>
                        <th>Diễn giải</th>
                        <th style="width: 100px;">Mã KH nợ</th>
                        <th style="width: 100px;">Mã KH có</th>
                        <th style="width: 110px;">Tài khoản nợ</th>
                        <th style="width: 110px;">Tài khoản có</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </main>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ------------------------------------------------------------------------------------------------------ //

    document.getElementById('select_loaiChungTu').addEventListener('change', function() {
        var selectedValue = this.value;

        switch (selectedValue) {

            case 'PT':
                $.ajax({
                    url: 'get_ChungTu',
                    type: 'GET',
                    data: {
                        LoaiChungTu: selectedValue
                    },

                    success: function(data) {
                        displayData(data, selectedValue);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;

            case 'PC':
                $.ajax({
                    url: 'get_ChungTu',
                    type: 'GET',
                    data: {
                        LoaiChungTu: selectedValue
                    },
                    success: function(data) {
                        displayData(data, selectedValue);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;

            case 'NH':
                $.ajax({
                    url: 'get_ChungTu',
                    type: 'GET',
                    data: {
                        LoaiChungTu: selectedValue
                    },
                    success: function(data) {
                        displayData(data, selectedValue);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;

            case 'XH':
                $.ajax({
                    url: 'get_ChungTu',
                    type: 'GET',
                    data: {
                        LoaiChungTu: selectedValue
                    },
                    success: function(data) {
                        displayData(data, selectedValue);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;

            case 'GS':
                $.ajax({
                    url: 'get_ChungTu',
                    type: 'GET',
                    data: {
                        LoaiChungTu: selectedValue
                    },
                    success: function(data) {
                        displayData(data, selectedValue);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;

            case 'TG':
                $.ajax({
                    url: 'get_ChungTu',
                    type: 'GET',
                    data: {
                        LoaiChungTu: selectedValue
                    },
                    success: function(data) {
                        displayData(data, selectedValue);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;
            default:
                break;
        }

    });

    function displayData(data, loaiChungTu) {
        var tableBody = $('#dataTable tbody');
        tableBody.empty();

        data.forEach(async function(item) {
            var row = '<tr>';
            row += '<td>' + item.LoaiChungTu + '</td>';
            row += '<td>' + item.NgayChungTu + '</td>';
            row += '<td>' + item.SoChungTu + '</td>';
            row += '<td>' + item.DienGiai + '</td>';

            switch (loaiChungTu) {
                case 'PT':
                    row += '<td></td>'; //Mã khách hàng nợ
                    row += '<td>' + item.MaKhachHang + '</td>'; //Mã khách hàng có
                    //Tài khoản nợ - có
                    try {
                        //Tài khoản nợ
                        var TaiKhoanNo = await getTaiKhoanNo(item);
                        row += '<td>' + TaiKhoanNo + '</td>';

                        //Tài khoản có
                        var TaiKhoanCo = await getTaiKhoanCo(item);
                        row += '<td>' + TaiKhoanCo + '</td>';

                        //Số tiền
                        var soTien = await getSoTien(item);
                        row += '<td>' + soTien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</td>';

                    } catch (error) {
                        console.error(error);
                    }
                    break;

                case 'PC':
                    row += '<td>' + item.MaKhachHang + '</td>'; //Mã khách hàng nợ
                    row += '<td></td>'; //Mã khách hàng có
                    //Tài khoản nợ - có
                    try {
                        //Tài khoản nợ
                        var TaiKhoanNo = await getTaiKhoanNo(item);
                        row += '<td>' + TaiKhoanNo + '</td>';

                        //Tài khoản có
                        var TaiKhoanCo = await getTaiKhoanCo(item);
                        row += '<td>' + TaiKhoanCo + '</td>';

                        //Số tiền
                        var soTien = await getSoTien(item);
                        row += '<td>' + soTien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</td>';

                    } catch (error) {
                        console.error(error);
                    }
                    break;

                case 'NH':
                    row += '<td></td>'; //Mã khách hàng nợ
                    row += '<td>' + item.MaKhachHang + '</td>'; //Mã khách hàng có
                    //Tài khoản nợ - có
                    try {
                        //Tài khoản nợ
                        var TaiKhoanNo = await getTaiKhoanNo(item);
                        row += '<td>' + TaiKhoanNo + '</td>';

                        //Tài khoản có
                        var TaiKhoanCo = await getTaiKhoanCo(item);
                        row += '<td>' + TaiKhoanCo + '</td>';

                        //Số tiền
                        var soTien = await getSoTien(item);
                        row += '<td>' + soTien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</td>';

                    } catch (error) {
                        console.error(error);
                    }
                    break;

                case 'XH':
                    row += '<td>' + item.MaKhachHang + '</td>'; //Mã khách hàng nợ
                    row += '<td></td>'; //Mã khách hàng có
                    //Tài khoản nợ - có
                    try {
                        //Tài khoản nợ
                        var TaiKhoanNo = await getTaiKhoanNo(item);
                        row += '<td>' + TaiKhoanNo + '</td>';

                        //Tài khoản có
                        var TaiKhoanCo = await getTaiKhoanCo(item);
                        row += '<td>' + TaiKhoanCo + '</td>';

                        //Số tiền
                        var soTien = await getSoTien(item);
                        row += '<td>' + soTien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</td>';

                    } catch (error) {
                        console.error(error);
                    }
                    break;

                case 'GS':
                    row += '<td>' + (item.MaKhachHangNo ? item.MaKhachHangNo : '') + '</td>'; //Mã khách hàng nợ
                    row += '<td>' + (item.MaKhachHangCo ? item.MaKhachHangCo : '') + '</td>'; //Mã khách hàng có
                    //Tài khoản nợ - có
                    try {
                        //Tài khoản nợ
                        var TaiKhoanNo = await getTaiKhoanNo(item);
                        row += '<td>' + TaiKhoanNo + '</td>';

                        //Tài khoản có
                        var TaiKhoanCo = await getTaiKhoanCo(item);
                        row += '<td>' + TaiKhoanCo + '</td>';

                        //Số tiền
                        var soTien = await getSoTien(item);
                        row += '<td>' + soTien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</td>';

                    } catch (error) {
                        console.error(error);
                    }
                    break;

                case 'TG':
                    row += '<td>' + (item.ThuChi == 2 ? item.MaKhachHang : '') + '</td>'; //Mã khách hàng nợ
                    row += '<td>' + (item.ThuChi == 1 ? item.MaKhachHang : '') + '</td>'; //Mã khách hàng có
                    //Tài khoản nợ - có
                    try {
                        //Tài khoản nợ
                        var TaiKhoanNo = await getTaiKhoanNo(item);
                        row += '<td>' + TaiKhoanNo + '</td>';

                        //Tài khoản có
                        var TaiKhoanCo = await getTaiKhoanCo(item);
                        row += '<td>' + TaiKhoanCo + '</td>';

                        //Số tiền
                        var soTien = await getSoTien(item);
                        row += '<td>' + soTien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</td>';

                    } catch (error) {
                        console.error(error);
                    }
                    break;

                default:
                    break;
            }
            row += '</tr>';
            tableBody.append(row);
        });

        function getTaiKhoanNo(item) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: 'get_TK_NO/' + item.MaChungTu,
                    type: 'GET',
                    data: {
                        LoaiChungTu: loaiChungTu
                    },

                    success: function(TaiKhoanNo) {
                        resolve(TaiKhoanNo);
                    },
                    error: function(error) {
                        reject(error);
                    }
                });
            });
        }

        function getTaiKhoanCo(item) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: 'get_TK_CO/' + item.MaChungTu,
                    type: 'GET',
                    data: {
                        LoaiChungTu: loaiChungTu
                    },

                    success: function(TaiKhoanCo) {
                        resolve(TaiKhoanCo);
                    },
                    error: function(error) {
                        reject(error);
                    }
                });
            });
        }

        function getSoTien(item) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: 'get_SoTien/' + item.MaChungTu,
                    type: 'GET',
                    data: {
                        LoaiChungTu: loaiChungTu
                    },

                    success: function(SoTien) {
                        resolve(SoTien);
                    },
                    error: function(error) {
                        reject(error);
                    }
                });
            });
        }
    }
</script>
@endsection