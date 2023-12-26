@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Menu bên trái -->
        @include('menu.menu')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main">
            <h1>Report</h1>

            <table>
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->MaChungTu }}</td>
                        <td>{{ $row->LoaiChungTu }}</td>
                        <!-- Add more columns as needed -->
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