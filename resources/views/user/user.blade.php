@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Menu -->
        @include('menu.menu')
        <style>
            .card-body {
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-bottom: 20px;
            }

            #uploadedAvatar {
                border: 1px solid #ccc;
            }
        </style>
        <!-- Khung hiển thị thông tin bên phải -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main">

            <form action="user_update/{{$user->id}}" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('storage/upload_avatars/' . $user->avatar) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Tải ảnh lên</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="avatar" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>

                            <p class="text-muted mb-0">Cho phép JPG, GIF hoặc PNG.</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{$user->email}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Họ và tên</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Số điện thoại</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">VN (+84)</span>
                                <input type="text" id="sodienthoai" name="sodienthoai" class="form-control" value="{{$user->sodienthoai}}" placeholder="Số điện thoại" />
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="diachi" name="diachi" value="{{$user->diachi}}" placeholder="Địa chỉ" />
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-center">
                        <button type="btn" class="btn btn-info me-2">Save changes</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>
<script>
    const avatarInput = document.getElementById('avatar');
    const avatarImg = document.getElementById('uploadedAvatar');

    avatarInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            avatarImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection