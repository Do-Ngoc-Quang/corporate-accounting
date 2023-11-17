@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Menu bên trái -->
        @include('menu.menu')

        <!-- Khung hiển thị thông tin bên phải -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main">
            <h6 style="color: red;">DANH MỤC TÀI KHOẢN</h6>
            <table class="custom-table" id="dataTable">
                <thead>
                    <tr>
                        <th>Mã tài khoản</th>
                        <th>Tên tài khoản</th>
                        <th>Số dư Nợ đầu</th>
                        <th>Số dư Có đầu</th>
                        <th>Có định khoản</th>
                        <th>Cấp</th>
                        <th>Ngày số dư</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhmuctaikhoan as $taikhoan)
                    <tr data-id="{{ $taikhoan->TaiKhoan }}" id="{{ $taikhoan->TaiKhoan }}" onclick="highlightRow(this)">
                        <td><input style="width: 80px; text-align: center;" readonly type="text" name="" id="TaiKhoan" value="{{ $taikhoan->TaiKhoan }}"></td>
                        <td><input style="width: 300px; text-align: center;" type="text" name="" id="TenTaiKhoan" value="{{ $taikhoan->TenTaiKhoan }}"></td>
                        <td><input style="width: 165px; text-align: center;" readonly type="text" name="" id="SoDuNoDau" value="{{ $taikhoan->SoDuNoDau }}"></td>
                        <td><input style="width: 165px; text-align: center;" readonly type="text" name="" id="SoDuCoDau" value="{{ $taikhoan->SoDuCoDau }}"></td>
                        <td><input style="text-align: center;" type="checkbox" name="" id="CoDinhKhoan" value="{{ $taikhoan->CoDinhKhoan }}" <?= $taikhoan->CoDinhKhoan == 1 ? 'checked' : '' ?>></td>
                        <td><input style="width: 25px; text-align: center;" type="text" name="Cap" id="Cap" value="{{ $taikhoan->Cap }}"></td>
                        <td><input style="width: 115px; text-align: center;" type="date" id="NgaySoDu" name="NgaySoDu" value="{{ $taikhoan->NgaySoDu }}"></td>
                        <td>
                            <input type="hidden" name="" id="TaiKhoan" value="{{ $taikhoan->TaiKhoan }}">
                            <button type="button" onclick="updateDMTK(<?= $taikhoan->id ?>, this)">Cập nhật</button> <button type="submit" onclick="deleteDMTK(<?= $taikhoan->id ?>, this)">Xóa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btnAddnew" style="margin-top: 10px;" type="button" onclick="addNewRow()">Thêm mới tài khoản</button>
        </main>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var isNewRowAdded = false; // Biến để đánh dấu trạng thái

    // Hàm xử lý thêm mới một tài khoản
    function addNewRow() {
        if (!isNewRowAdded) {
            var tableBody = document
                .getElementById("dataTable")
                .getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Các ô input cho dữ liệu mới
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);

            cell1.innerHTML = '<input style="width: 80px; text-align: center;" type="text" id="taiKhoan" placeholder="Mã">';
            cell2.innerHTML = '<input style="width: 300px; text-align: center;" type="text" id="tenTaiKhoan" placeholder="Tên tài khoản">';
            cell3.innerHTML = '<input style="width: 165px; text-align: center;" readonly type="text" id="soDuNoDau" value="0">';
            cell4.innerHTML = '<input style="width: 165px; text-align: center;" readonly type="text" id="soDuCoDau" value="0">';
            cell5.innerHTML = '<input style="margin: 0; padding: 0;" type="checkbox" id="coDinhKhoan">';
            cell6.innerHTML = '<input style="width: 25px; text-align: center;" type="text" id="cap">';
            cell7.innerHTML = '<input style="width: 115px; text-align: center;" type="date" id="ngaySoDu">';
            cell8.innerHTML = '<button type="button" onclick="addNewDMTK(this)">Tạo mới</button> <button type="button" onclick="cancelAdd(this)">Hủy</button>';

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRowAdded = true;

        }

    }

    // Hàm xử lý thêm mới một tài khoản
    function addNewDMTK() {

        var taikhoan = $("#taiKhoan").val();
        var tenTaiKhoan = $("#tenTaiKhoan").val();
        var soDuNoDau = $("#soDuNoDau").val();
        var soDuCoDau = $("#soDuCoDau").val();
        var coDinhKhoan = $("#coDinhKhoan").is(":checked") ? 1 : 0;
        var cap = $("#cap").val();
        var ngaySoDu = $("#ngaySoDu").val();


        $.ajax({
            method: 'POST',
            url: "{{ route('dmtk.store') }}",
            data: {
                TaiKhoan: taikhoan,
                TenTaiKhoan: tenTaiKhoan,
                SoDuNoDau: soDuNoDau,
                SoDuCoDau: soDuCoDau,
                CoDinhKhoan: coDinhKhoan,
                Cap: cap,
                NgaySoDu: ngaySoDu
            },
            success: function(response) {
                // Xử lý phản hồi
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Tạo tài khoản kế toán thành công");
                    console.log(response);

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 3100); // Đợi 3,1 giây trước khi reload
                }
            },
            error: function(error) {
                toastr.error("Mã tài khoản đã tồn tại");
                console.log(error);
            }
        });
    }

    // Hàm xử lý cập nhật thông tin tài khoản kế toán
    function updateDMTK(id, tr_row) {

        // Lấy phần tử cha (dòng tr) của button được nhấn
        var row = tr_row.closest('tr');

        // Lấy các giá trị từ các ô input của dòng
        var tenTaiKhoan = row.querySelector('#TenTaiKhoan').value;
        // var soDuNoDau = row.querySelector('#SoDuNoDau').value;
        // var soDuCoDau = row.querySelector('#SoDuCoDau').value;
        var coDinhKhoan = row.querySelector('#CoDinhKhoan').checked ? 1 : 0;
        var cap = row.querySelector('#Cap').value;
        var ngaySoDu = row.querySelector("#NgaySoDu").value;

        $.ajax({
            method: "PUT",
            // type: 'PUT',
            url: '/danhmuctaikhoan_update/' + id,
            data: {
                TenTaiKhoan: tenTaiKhoan,
                // SoDuNoDau: soDuNoDau,
                // SoDuCoDau: soDuCoDau,
                CoDinhKhoan: coDinhKhoan,
                Cap: cap,
                NgaySoDu: ngaySoDu
            },
            success: function(response) {
                // Xử lý phản hồi
                toastr.success("Cập nhật tài khoản thành công");

                //Đoạn code dưới đây thực thi sự cập nhật, tức hiển thị dữ liệu sau khi cập nhật mà không tải lại trang
                // $("tr[data-id=" + id + "]").find("td:nth-child(1) input").val(TaiKhoan);
                // $("tr[data-id=" + id + "]").find("td:nth-child(2) input").val(TenTaiKhoan);
                // $("tr[data-id=" + id + "]").find("td:nth-child(3) input").val(SoDuNoDau);
                // $("tr[data-id=" + id + "]").find("td:nth-child(4) input").val(SoDuCoDau);
                // $("tr[data-id=" + id + "]").find("td:nth-child(5) input").val(CoDinhKhoan);
                // $("tr[data-id=" + id + "]").find("td:nth-child(6) input").val(Cap);
                // $("tr[data-id=" + id + "]").find("td:nth-child(7) input").val(NgaySoDu);
            },
            error: function(error) {
                // Xử lý lỗi
                toastr.error("Lỗi cập nhật");
                console.log(error);
            }
        });
    }

    // Hàm xử lý xóa tài khoản kế toán
    function deleteDMTK(id, thisRow) {

        var trObj = $(thisRow);

        if (confirm("Bạn có chắc là xóa tài khoản kế toán này?")) {
            $.ajax({
                method: "DELETE",
                url: "/danhmuctaikhoan_delete/" + id,
                success: function(response) {
                    // Xử lý phản hồi
                    toastr.success("Xóa tài khoản kế toán thành công");
                    trObj.parents("tr").remove();
                },
                error: function(error) {
                    toastr.error("Tài khoản này còn công nợ?");
                    console.log(error);
                }

            });
        }

    }

    // Hàm hủy thêm mới tài khoản 
    function cancelAdd(row) {
        // Xóa dòng khi hủy thêm mới
        row.parentNode.parentNode.remove();
        isNewRowAdded = false;
    }
</script>

@endsection