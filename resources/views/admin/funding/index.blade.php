
@extends('layouts.admin.back')
@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แหล่งทุน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">แหล่งทุน</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลแหล่งทุน</h3>
                            <h6 class="text-danger">
                                <a href="{{ route('funding.create') }}" class="btn btn-outline-primary "
                                    style="float: right;"><span class='fa fa-plus'></span>เพิ่มข้อมูล</a>
                            </h6>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" >ลำดับ</th>
                                        <th scope="col">แหล่งทุน</th>
                                        <th scope="col">จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($data as $key => $value)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $value->funding_name }}</td>
                                        <td>

                                            <form action="{{ route('funding.destroy',$value->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <a href="{{ route('funding.edit',$value->id) }}" class="btn btn-sm btn-success"><span
                                                        class='fa fa-edit'></span>แก้ไข</a>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">
                                                        <i class="fa fa-trash"></i> ลบ</button>

                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
