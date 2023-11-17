@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Menu bên trái -->
        @include('menu.menu')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main">
            <h6 style="color: red;">CẤP QUYỀN SỬ DỤNG PHẦN MỀM</h6>
            <table class="custom-table" id="dataTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Cấp bậc</th>
                        <th>Thêm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr data-id="{{ $user->id }}" id="{{ $user->id }}" onclick="highlightRow(this)">
                        <td><input style="width: 100px; text-align: center;" readonly type="text" name="" id="" value="{{ $user->id }}"></td>
                        <td><input style="width: 250px; text-align: center;" readonly type="text" name="" id="" value="{{ $user->name }}"></td>
                        <td><input style="width: 250px; text-align: center;" readonly type="text" name="" id="" value="{{ $user->email }}"></td>
                        <td><input style="width: 200px; text-align: center;" readonly type="text" name="" id="" value="<?= $user->isAdmin == 1 ? 'Admin' : 'Nhân viên' ?>"></td>
                        <td><input style="width: 100px; text-align: center;" type="checkbox" id="Them" value="{{ $user->id }}" <?= $user->Them == 1 ? 'checked' : '' ?>></td>
                        <td><input style="width: 100px; text-align: center;" type="checkbox" id="Sua" value="{{ $user->id }}" <?= $user->Sua == 1 ? 'checked' : '' ?>></td>
                        <td><input style="width: 100px; text-align: center;" type="checkbox" id="Xoa" value="{{ $user->id }}" <?= $user->Xoa == 1 ? 'checked' : '' ?>></td>
                    </tr>
                    @endforeach
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

    
</script>

@endsection