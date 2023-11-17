@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Menu bên trái -->
        @include('menu.menu')

        <!-- Khung hiển thị thông tin bên phải -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main">
            <h6 style="color: red;">DANH MỤC HÀNG HÓA</h6>
            <table class="custom-table" id="dataTable">
                <thead>
                    <tr>
                        <th>Mã hàng</th>
                        <th>Tên hàng</th>
                        <th>Nhóm hàng</th>
                        <th>ĐVT</th>
                        <th>SL tồn đầu</th>
                        <th>Thành tiền tồn đầu</th>
                        <th>Ngày tồn đầu</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhmuchanghoa as $hanghoa)
                    <tr data-id="{{ $hanghoa->MaHang }}" id="{{ $hanghoa->MaHang }}" onclick="highlightRow(this)">
                        <td><input style="width: 100px; text-align: center;" readonly type="text" id="MaHang" value="{{ $hanghoa->MaHang }}"></td>
                        <td><input style="width: 370px; text-align: center;" type="text" id="TenHang" value="{{ $hanghoa->TenHang }}"></td>
                        <td><input style="width: 100px; text-align: center;" type="text" id="NhomHang" value="{{ $hanghoa->NhomHang }}"></td>
                        <td><input style="width: 40px; text-align: center;" type="text" id="DonViTinh" value="{{ $hanghoa->DonViTinh }}"></td>
                        <td><input style="width: 100px; text-align: center;" readonly type="text" id="SoLuongTonDau" value="{{ $hanghoa->SoLuongTonDau }}"></td>
                        <td><input style="width: 150px; text-align: center;" readonly type="text" id="ThanhTienTonDau" value="{{ $hanghoa->ThanhTienTonDau }}"></td>
                        <td><input style="width: 115px; text-align: center;" type="date" id="NgayTonDau" value="{{ $hanghoa->NgayTonDau }}"></td>
                        <td>
                            <!-- <input type="hidden" name="" id="MaHang" value="{{ $hanghoa->MaHang }}"> -->
                            <button type="button" onclick="updateDMHH(<?= $hanghoa->id ?>, this)">Cập nhật</button> <button type="submit" onclick="deleteDMHH(<?= $hanghoa->id ?>, this)">Xóa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btnAddnew" style="margin-top: 10px;" type="button" onclick="addNewRow()">Thêm mới hàng hóa</button>
        </main>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var isNewRowAdded = false; // Biến để đánh dấu trạng thái chỉ được tồn tại một dòng thêm mới

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

            cell1.innerHTML = '<input style="width: 100px; text-align: center;" type="text" id="maHang" placeholder="Mã hàng">';
            cell2.innerHTML = '<input style="width: 370px; text-align: center;" type="text" id="tenHang" placeholder="Tên hàng">';
            cell3.innerHTML = '<input style="width: 100px; text-align: center;" type="text" id="nhomHang" placeholder="Nhóm">';
            cell4.innerHTML = '<input style="width: 40px; text-align: center;" type="text" id="donViTinh" placeholder="đvt">';
            cell5.innerHTML = '<input style="width: 100px; text-align: center;" readonly type="text" id="soLuongTonDau" value="0">';
            cell6.innerHTML = '<input style="width: 150px; text-align: center;" readonly type="text" id="thanhTienTonDau" value="0">';
            cell7.innerHTML = '<input style="width: 115px; text-align: center;" type="date" id="ngayTonDau">';
            cell8.innerHTML = '<button type="button" onclick="addNewDMHH(this)">Tạo mới</button> <button type="button" onclick="cancelAdd(this)">Hủy</button>';

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRowAdded = true;
        }
    }

    // Hàm xử lý thêm mới một tài khoản
    function addNewDMHH() {
        var maHang = $("#maHang").val();
        var tenHang = $("#tenHang").val();
        var nhomHang = $("#nhomHang").val();
        var donViTinh = $("#donViTinh").val();
        var soLuongTonDau = $("#soLuongTonDau").val();
        var thanhTienTonDau = $("#thanhTienTonDau").val();
        var ngayTonDau = $("#ngayTonDau").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('dmhh.store') }}",
            data: {
                MaHang: maHang,
                TenHang: tenHang,
                NhomHang: nhomHang,
                DonViTinh: donViTinh,
                SoLuongTonDau: soLuongTonDau,
                ThanhTienTonDau: thanhTienTonDau,
                NgayTonDau: ngayTonDau
            },
            success: function(response) {
                // Xử lý phản hồi
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Tạo mới hàng hóa thành công");
                    console.log(response);

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 3100); // Đợi 3,1 giây trước khi reload
                }
            },
            error: function(error) {
                toastr.error("Mã hàng hóa đã tồn tại");
                console.log(error);
            }
        });
    }

    // Hàm cập nhật thông tin hàng hóa
    function updateDMHH(id, thisRow) {
        var row = thisRow.closest('tr');
        var tenHang = row.querySelector('#TenHang').value;
        var nhomHang = row.querySelector('#NhomHang').value;
        var donViTinh = row.querySelector('#DonViTinh').value;
        var soLuongTonDau = row.querySelector('#SoLuongTonDau').value;
        var thanhTienTonDau = row.querySelector('#ThanhTienTonDau').value;
        var ngayTonDau = row.querySelector("#NgayTonDau").value;

        $.ajax({
            method: "PUT",
            url: '/danhmuchanghoa_update/' + id,
            data: {
                TenHang: tenHang,
                NhomHang: nhomHang,
                DonViTinh: donViTinh,
                SoLuongTonDau: soLuongTonDau,
                ThanhTienTonDau: thanhTienTonDau,
                NgayTonDau: ngayTonDau
            },
            success: function(response) {
                toastr.success("Cập nhật hàng hóa thành công");

                // Cập nhật dữ liệu trực tiếp trên giao diện
                // row.querySelector("td:nth-child(2) input").value = tenHang;
                // row.querySelector("td:nth-child(3) input").value = nhomHang;
                // row.querySelector("td:nth-child(4) input").value = donViTinh;
                // row.querySelector("td:nth-child(5) input").value = soLuongTonDau;
                // row.querySelector("td:nth-child(6) input").value = thanhTienTonDau;
                // row.querySelector("td:nth-child(7) input").value = ngayTonDau;
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Hàm xóa hàng hóa
    function deleteDMHH(id, thisRow) {
        var trObj = $(thisRow);
        if (confirm("Bạn có chắc là xóa hàng hóa này?")) {
            $.ajax({
                method: "DELETE",
                url: "/danhmuchanghoa_delete/" + id,
                success: function(response) {
                    toastr.success("Xóa hàng hóa thành công");
                    trObj.parents("tr").remove();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }

    // Hàm hủy thêm mới hàng hóa
    function cancelAdd(row) {
        row.closest('tr').remove();
        isNewRowAdded = false;
    }
</script>

@endsection