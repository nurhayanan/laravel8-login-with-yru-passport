
@extends('layouts.admin.back')
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ประกาศทุนวิจัย</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">ประกาศทุนวิจัย</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            กรอกข้อมูลประกาศทุนวิจัย
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('announce.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>ปีงบประมาณ:</strong>
                                            <select class='form-control ' id='year_id' name='year_id'>
                                                <option>--ตัวเลือก--</option>
                                                @foreach ($year as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id ? 'selected' : '' }}>
                                                        {{ $item->year_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>แหล่งทุน:</strong>
                                            <select class='form-control ' id='funding_id' name='funding_id'>
                                                <option>--ตัวเลือก--</option>
                                                @foreach ($funding as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id ? 'selected' : '' }}>
                                                        {{ $item->funding_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>หน่วยงาน:</strong>
                                            <select class='form-control ' id='agency_id' name='agency_id'>
                                                <option>--ตัวเลือก--</option>
                                                @foreach ($agency as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id ? 'selected' : '' }}>
                                                        {{ $item->agency_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>วันที่รับ:</strong>
                                            <input class="form-control " type="date" id="start" name="start">
                                            <strong>วันที่สิ้นสุด:</strong>
                                            <input class="form-control " type="date" id="end" name="end">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>รูปภาพ:</strong>
                                            <input type="file" name="image" class="form-control" placeholder="image">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                        <a href="/issuess" class="btn btn-danger">ย้อนกลับ</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
