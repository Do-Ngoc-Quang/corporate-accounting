@extends('layouts.app')
<style>
    #main-content-subform {
        display: flex;
        flex-direction: column;
        height: 93vh;
    }

    #section1 {
        height: 63vh;
        border: 1px solid #333;
        /* border-bottom: none; */
        padding: 6px;
        overflow-y: auto;
    }

    #section2 {
        height: 30vh;
        border: 1px solid #333;
        padding: 6px;
        overflow-y: auto;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Menu bên trái -->
    @include('menu.menu')

    <!-- Khung hiển thị thông tin bên phải -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main" id="main-content-subform">
        <div id="section1">
            <h6 style="text-align:center; color: red;">DANH MỤC KHÁCH HÀNG</h6>
            <table class="custom-table" id="dataTable1">
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Tên khách hàng</th>
                        <th>Mã số thuế</th>
                        <th>Địa chỉ</th>
                        <th>Tỉnh/Thành phố</th>
                        <th>Điện thoại</th>
                        <th>Fax</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhmuckhachhang as $khachhang)
                    <tr data-id="{{ $khachhang->MaKhachHang }}" id="{{ $khachhang->MaKhachHang }}" onclick="highlightRowandCollect(<?= $khachhang->MaKhachHang ?>, this)">
                        <td><input style="width: 50px; text-align: center;" readonly type="text" id="MaKhachHang" value="{{ $khachhang->MaKhachHang }}"></td>
                        <td><input style="width: 200px; text-align: center;" type="text" id="TenKhachHang" value="{{ $khachhang->TenKhachHang }}"></td>
                        <td><input style="width: 110px; text-align: center;" type="text" id="MaSoThue" value="{{ $khachhang->MaSoThue }}"></td>
                        <td><input style="width: 300px; text-align: center;" type="text" id="DiaChi" value="{{ $khachhang->DiaChi }}"></td>
                        <td><input style="width: 110px; text-align: center;" type="text" id="TinhThanhPho" value="{{ $khachhang->TinhThanhPho }}"></td>
                        <td><input style="width: 110px; text-align: center;" type="text" id="DienThoai" value="{{ $khachhang->DienThoai }}"></td>
                        <td><input style="width: 90px; text-align: center;" type="text" id="Fax" value="{{ $khachhang->Fax }}"></td>
                        <td>
                            <button type="button" onclick="updateKhachHang(<?= $khachhang->id ?>, this)">Cập nhật</button> <button type="submit" onclick="deleteKhachHang(<?= $khachhang->id ?>, this)">Xóa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btnAddnew" style="margin-top: 10px; border-radius: 10px;" type="button" onclick="addNewRow()">Thêm khách hàng</button>
        </div>
        <div id="section2">
            <h6 style="text-align:center; color: red;">CÁC TÀI KHOẢN CÔNG NỢ</h6>
            <table class="custom-table" id="dataTable2">
                <thead>
                    <tr>
                        <th style="width: 120px;">Tài khoản</th>
                        <th style="width: 380px;">Số dư nợ đầu</th>
                        <th style="width: 382px;">Số dư có đầu</th>
                        <th style="width: 180px;">Ngày số dư</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </main>
</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ---------------------------------------------------------- Khách hàng ------------------------------------------------------------------------------- //

    var isNewRowAdded_KhachHang = false; // Biến để đánh dấu trạng thái chỉ được tồn tại một dòng thêm mới cho Khách hàng

    // Hàm xử lý thêm mới một tài khoản
    function addNewRow() {
        if (!isNewRowAdded_KhachHang) {
            var tableBody = document
                .getElementById("dataTable1")
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

            cell1.innerHTML = '<input style="width: 50px; text-align: center;" type="text" id="maKhachHang" placeholder="Mã">';
            cell2.innerHTML = '<input style="width: 200px; text-align: center;" type="text" id="tenKhachHang" placeholder="Tên khách hàng">';
            cell3.innerHTML = '<input style="width: 110px; text-align: center;" type="text" id="maSoThue" placeholder="Mã số thuế">';
            cell4.innerHTML = '<input style="width: 300px; text-align: center;" type="text" id="diaChi" placeholder="Địa chỉ">';
            cell5.innerHTML = '<input style="width: 110px; text-align: center;" type="text" id="tinhThanhPho" placeholder="Tỉnh/T-Phố">';
            cell6.innerHTML = '<input style="width: 110px; text-align: center;" type="text" id="dienThoai" placeholder="SĐT">';
            cell7.innerHTML = '<input style="width: 90px; text-align: center;" type="text" id="fax" placeholder="Fax">';
            cell8.innerHTML = '<button type="button" onclick="addNewKhachHang(this)">Tạo mới</button> <button type="button" onclick="cancelAddKhachHang(this)">Hủy</button>';

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            //Khi thêm khách hàng, tự động tạo một bản ghi null ở bảng tài khoản công nợ
            // addNewCongNo();

            isNewRowAdded_KhachHang = true;
        }

    }


    // Hàm xử lý thêm mới một tài khoản
    function addNewKhachHang() {
        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();
        var diaChi = $("#diaChi").val();
        var tinhThanhPho = $("#tinhThanhPho").val();
        var dienThoai = $("#dienThoai").val();
        var fax = $("#fax").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('dmkh.store') }}",
            data: {
                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,
                DiaChi: diaChi,
                TinhThanhPho: tinhThanhPho,
                DienThoai: dienThoai,
                Fax: fax
            },
            success: function(response) {
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Thêm khách hàng thành công");
                    console.log(response);

                    setTimeout(function() {
                        location.reload();
                    }, 3100); // Đợi 3,1 giây trước khi reload
                }
            },
            error: function(error) {
                toastr.error("Mã khách hàng đã tồn tại");
                console.log(error);
            }
        });
    }

    // Hàm cập nhật thông tin
    function updateKhachHang(id, thisRow) {
        var row = thisRow.closest('tr');
        var maKhachHang = row.querySelector('#MaKhachHang').value;
        var tenKhachHang = row.querySelector('#TenKhachHang').value;
        var maSoThue = row.querySelector('#MaSoThue').value;
        var diaChi = row.querySelector('#DiaChi').value;
        var tinhThanhPho = row.querySelector('#TinhThanhPho').value;
        var dienThoai = row.querySelector("#DienThoai").value;
        var fax = row.querySelector("#Fax").value;

        $.ajax({
            method: "PUT",
            url: '/danhmuckhachhang_update/' + id,
            data: {
                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,
                DiaChi: diaChi,
                TinhThanhPho: tinhThanhPho,
                DienThoai: dienThoai,
                Fax: fax
            },
            success: function(response) {
                toastr.success("Cập nhật khách hàng thành công");
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Hàm xóa
    function deleteKhachHang(id, thisRow) {
        var trObj = $(thisRow);
        if (confirm("Bạn có chắc là xóa khách hàng này?")) {
            $.ajax({
                method: "DELETE",
                url: "/danhmuckhachhang_delete/" + id,
                success: function(response) {
                    toastr.success("Xóa khách hàng thành công");
                    trObj.parents("tr").remove();
                },
                error: function(error) {
                    toastr.error("Khách hàng này còn công nợ?");
                    console.log(error);
                }
            });
        }
    }



    // ---------------------------------------------------------- Công nợ -------------------------------------------------------------------------------//

    // Xử lý highlight cái dòng được click và hiện thị các tài khoản công nợ của khách hàng cho bảng thứ 2 (bảng phụ)
    function highlightRowandCollect(makhachhang, row) {
        // Bỏ lớp highlight ở tất cả các thẻ tr
        var allRows = document.querySelectorAll(".custom-table tbody tr");
        allRows.forEach(function(r) {
            r.classList.remove("highlight");
        });

        // Thêm lớp highlight cho thẻ tr được click
        row.classList.add("highlight");

        // Xử lý hiện thị các công nợ của khách hàng
        const apiUrl = 'taikhoancongnocuakhachhang/' + makhachhang;

        fetch(apiUrl)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {

                // Lấy thẻ tbody của dataTable2
                var tableBody = document.getElementById("dataTable2").getElementsByTagName("tbody")[0];

                // Xóa toàn bộ nội dung trong tbody
                tableBody.innerHTML = '';

                data.forEach(congno => {

                    // Thêm dữ liệu mới vào tbody
                    var newRow = tableBody.insertRow(tableBody.rows.length);

                    // Gắn giá trị từ đối tượng congno vào các ô input tương ứng
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);

                    cell1.innerHTML = `<input style="width: 100px; text-align: center;" readonly type="text" id="TaiKhoan" value="${congno.TaiKhoan}">`;
                    cell2.innerHTML = `<input style="width: 370px; text-align: center;" type="text" id="update_SoDuNoDau" value="${congno.SoDuNoDau}">`;
                    cell3.innerHTML = `<input style="width: 370px; text-align: center;" type="text" id="update_SoDuCoDau" value="${congno.SoDuCoDau}">`;
                    cell4.innerHTML = `<input style="width: 170px; text-align: center;" readonly type="text" id="NgaySoDu" value="${congno.NgaySoDu}">`;
                    cell5.innerHTML = `<button type="button" onclick="updateCongNoKH('${congno.MaKhachHang}', '${congno.id}', this)">Cập nhật</button> <button type="submit" onclick="deleteCongNoKH('${congno.id}', this)">Xóa</button>`;

                    // Thêm sự kiện cho sự kiện click vào dòng
                    newRow.onclick = function() {
                        highlightRow(this);
                    };
                });
                //Kết thúc vòng lặp hiển thị các công nợ do sự kiện click vào khách hàng


                // Lấy thẻ div chứa table - Tạo botton thêm để điền thông tin công nợ
                var divContainer = document.getElementById("section2");
                // Kiểm tra xem button đã tồn tại chưa
                var existingButton = divContainer.querySelector("#btnAddnewCongNo");

                if (existingButton) {
                    // Nếu tồn tại, xóa nó đi
                    existingButton.remove();
                }

                // Tạo một button mới
                var newButton = document.createElement("button");
                newButton.className = "btnAddnew";
                newButton.id = "btnAddnewCongNo";
                newButton.style = "margin-top: 10px; border-radius: 10px;";
                newButton.type = "button";
                newButton.onclick = function() {
                    addNewCongNo(makhachhang);
                };
                newButton.innerText = "Thêm";

                // Thêm button vào thẻ div
                divContainer.appendChild(newButton);

            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });

    }

    var isNewRowAdded_CongNo = false; // Biến để đánh dấu trạng thái chỉ được tồn tại một dòng thêm mới cho Công nợ

    // Hàm xử lý thêm mới một tài khoản
    function addNewCongNo(makhachhang) {
        if (!isNewRowAdded_CongNo) {
            var tableBody = document
                .getElementById("dataTable2")
                .getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Các ô input cho dữ liệu mới
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);


            const apiUrl = 'collect_TaiKhoan';
            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {

                    // Tạo chuỗi HTML chứa thẻ select và các option
                    var selectTaiKhoan = '<select style="width: 100px; text-align: center;" id="taiKhoan"; max-height: 50px; overflow-y: auto; >';
                    for (var i = 0; i < data.length; i++) {
                        selectTaiKhoan += `<option value="${data[i]}">${data[i]}</option>`;
                    }
                    selectTaiKhoan += '</select>';

                    cell1.innerHTML = selectTaiKhoan;
                })
                .catch(error => {
                    // Handle errors
                    console.error('There was a problem with the fetch operation:', error);
                });


            cell2.innerHTML = '<input style="width: 370px; text-align: center;" type="text" id="soDuNoDau" placeholder="Số dư nợ đầu">';
            cell3.innerHTML = '<input style="width: 370px; text-align: center;" type="text" id="soDuCoDau" placeholder="Số dư có đầu">';
            cell4.innerHTML = '<input style="width: 170px; text-align: center;" type="date" id="ngaySoDu" placeholder="Ngày">';
            cell5.innerHTML = `<button type="button" onclick="addNewCongNoKH('${makhachhang}', this)">Thêm</button> <button type="button" onclick="cancelAddCongNo(this)">Hủy</button>`;

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRowAdded_CongNo = true;
        }
    }

    // Hàm xử lý thêm mới công nợ của khách hàng
    function addNewCongNoKH(makhachhang, thisRow) {

        var row = thisRow.closest('tr');

        var taiKhoan = row.querySelector("#taiKhoan").value;
        var maKhachHang = makhachhang;
        var soDuNoDau = row.querySelector("#soDuNoDau").value;
        var soDuCoDau = row.querySelector("#soDuCoDau").value;
        var ngaySoDu = row.querySelector("#ngaySoDu").value;

        $.ajax({
            method: 'POST',
            url: "{{ route('congno.store') }}",
            data: {
                TaiKhoan: taiKhoan,
                MaKhachHang: maKhachHang,
                SoDuNoDau: soDuNoDau,
                SoDuCoDau: soDuCoDau,
                NgaySoDu: ngaySoDu
            },
            success: function(response) {
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Thêm công nợ thành công");
                    console.log(response);
                    // Hàm gửi yêu cầu cập nhật công nợ lần đầu của tài khoản được thêm
                    $.ajax({
                        method: 'PUT',
                        url: 'sodutaikhoan_add_first/' + taiKhoan,
                        data: {
                            SoDuNoDau: soDuNoDau,
                            SoDuCoDau: soDuCoDau,

                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 3100); // Đợi 3,1 giây trước khi reload
                }

            },
            error: function(error) {
                toastr.error("Tài khoản này đã tồn tại");
                console.log(error);
            }
        });
    }

    // Hàm xử lý cập nhật công nợ của khách hàng
    function updateCongNoKH(makhachhang, id, thisRow) {

        var row = thisRow.closest('tr');
        var taiKhoan = row.querySelector("#taiKhoan").value;

        var soDuNoDau = row.querySelector("#update_SoDuNoDau").value;
        var soDuCoDau = row.querySelector("#update_SoDuCoDau").value;

        $.ajax({
            method: 'PUT',
            url: 'congnokhachhang_update/' + id,
            data: {
                SoDuNoDau: soDuNoDau,
                SoDuCoDau: soDuCoDau
            },
            success: function(response) {
                toastr.success("Cập nhật công nợ thành công");


                //Gửi yêu cầu cập nhật công nợ
                $.ajax({
                    method: 'PUT',
                    url: 'sodutaikhoan_update/' + taiKhoan,
                    data: {
                        id: id,
                        SoDuNoDau: soDuNoDau,
                        SoDuCoDau: soDuCoDau,
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            },
            error: function(error) {
                console.log(error);
            }
        });
    }


    // Hàm xử lý xóa công nợ
    function deleteCongNoKH(id, thisRow) {
        var trObj = $(thisRow);

        var row = thisRow.closest('tr');
        var taiKhoan = row.querySelector("#taiKhoan").value;

        if (confirm("Bạn có chắc là xóa công nợ này?")) {
            $.ajax({
                method: "DELETE",
                url: "/congnokhachhang_delete/" + id,
                success: function(response) {
                    toastr.success("Xóa công nợ thành công");

                    //Gửi yêu cầu cập nhật công nợ
                    $.ajax({
                        method: 'PUT',
                        url: 'sodutaikhoan_delete/' + taiKhoan,
                        data: {
                            id: id
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });

                    trObj.parents("tr").remove();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }


    // Hàm hủy thêm mới Khách hàng
    function cancelAddKhachHang(row) {
        row.closest('tr').remove();
        isNewRowAdded_KhachHang = false;
    }
    // Hàm hủy thêm mới Công nợ
    function cancelAddCongNo(row) {
        row.closest('tr').remove();
        isNewRowAdded_CongNo = false;
    }
</script>


@endsection