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
                    <option value="PT">Phiếu thu</option>
                    <option value="PC">Phiếu chi</option>
                    <option value="PN">Phiếu nhập</option>
                    <option value="PX">Phiếu xuất</option>
                    <option value="GS">Ghi sổ</option>
                    <option value="TG">Ngân hàng</option>
                    <option value="KC">Kết chuyển</option>
                    <option value="NT">Nhập hàng trả lại</option>
                    <option value="XT">Xuất hàng trả lại</option>
                </select>
            </div>
            <table class="custom-table" id="dataTable">
                <thead>
                    <tr>
                        <th>Loại chứng từ</th>
                        <th>Ngày</th>
                        <th>Số chứng từ</th>
                        <th>Diễn giải</th>
                        <th>Mã KH nợ</th>
                        <th>Mã KH có</th>
                        <th>Tài khoản nợ</th>
                        <th>Tài khoản có</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach($sonhatky as $snk)
                    <tr>
                        <td>{{ $snk->LoaiChungTu }}</td>
                        <td>{{ $snk->NgayChungTu }}</td>
                        <td>{{ $snk->SoChungTu }}</td>
                        <td>{{ $snk->DienGiai }}</td>
                        <td>{{ $snk->MaKhachHang }}</td>
                        <td>{{ $snk->MaKhachHang }}</td>
                        <td>{{ $snk->MaKhachHang }}</td>
                        <td>{{ $snk->MaKhachHang }}</td>
                        <td>{{ $snk->MaKhachHang }}</td>

                    </tr>
                    @endforeach -->
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
                    url: 'get_PT',
                    type: 'GET',

                    success: function(data) {
                        console.log(data);
                        displayData_KH_Co(data);
                    },
                    error: function(error) {
                        console.error('Đã xảy ra lỗi:', error);
                    }
                });
                break;
            case 'PC':
                $.ajax({
                    url: 'get_PC',
                    type: 'GET',
                });
                break;
            case 'PN':

                break;
            case 'PX':

                break;
            case 'GS':

                break;
            case 'TG':

                break;
            case 'NT':

                break;
            case 'XT':

                break;
            default:
                break;
        }

    });

    // Hàm để hiển thị dữ liệu trong bảng
    function displayData_KH_No(data) {
        var tableBody = $('#dataTable tbody');
        tableBody.empty();

        // Lặp qua mảng dữ liệu và tạo các dòng trong bảng
        data.forEach(function(item) {
            var row = '<tr>';
            row += '<td>' + item.LoaiChungTu + '</td>';
            row += '<td>' + item.NgayChungTu + '</td>';
            row += '<td>' + item.SoChungTu + '</td>';
            row += '<td>' + item.DienGiai + '</td>';
            row += '<td>' + item.MaKhachHang + '</td>'; //Mã khách hàng nợ
            row += '<td></td>';
            row += '<td>' + item.MaKhachHang + '</td>';
            row += '<td>' + item.MaKhachHang + '</td>';
            row += '<td>' + item.MaKhachHang + '</td>';
            row += '</tr>';

            tableBody.append(row);
        });
    }

    function displayData_KH_Co(data) {
        var tableBody = $('#dataTable tbody');
        tableBody.empty();

        function getTaiKhoanNo(item) {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    url: 'get_TK_NO/' + item.MaChungTu,
                    type: 'GET',

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

                    success: function(TaiKhoanCo) {
                        resolve(TaiKhoanCo);
                    },
                    error: function(error) {
                        reject(error);
                    }
                });
            });
        }

        data.forEach(async function(item) {
            var row = '<tr>';
            row += '<td>' + item.LoaiChungTu + '</td>';
            row += '<td>' + item.NgayChungTu + '</td>';
            row += '<td>' + item.SoChungTu + '</td>';
            row += '<td>' + item.DienGiai + '</td>';
            row += '<td></td>';
            row += '<td>' + item.MaKhachHang + '</td>'; //Mã khách hàng có

            try {
                //Tài khoản nợ
                var TaiKhoanNo = await getTaiKhoanNo(item);
                row += '<td>' + TaiKhoanNo + '</td>';

                //Tài khoản có
                var TaiKhoanCo = await getTaiKhoanCo(item);
                console.log(TaiKhoanCo);
                row += '<td>' + TaiKhoanCo + '</td>';
                
            } catch (error) {
                console.error(error);
            }

            row += '<td></td>';
            row += '</tr>';

            tableBody.append(row);
        });


    }
</script>
@endsection