
@extends('layouts.admin.back')
@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ประกาศรับทุนวิจัย</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">ประกาศรับทุนวิจัย</li>
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
                            <h3 class="card-title">ข้อมูลประกาศทุนวิจัย</h3>
                            <h6 class="text-danger">
                                <a href="{{ route('announce.create') }}" class="btn btn-outline-primary "
                                    style="float: right;"><span class='fa fa-plus'></span>เพิ่มข้อมูล</a>
                            </h6>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" >ลำดับ</th>
                                        <th scope="col">ปีงบประมาณ</th>
                                        <th scope="col">แหล่งทุน</th>
                                        <th scope="col">หน่วยงาน</th>
                                        <th scope="col">วันที่รับ</th>
                                        <th scope="col">วันที่สิ้นสุด</th>
                                        <th scope="col">รายละเอียด</th>
                                        <th scope="col">จัดการ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($data as $key => $value)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td  width="10px">{{ $value->year_name }}</td>
                                        <td>{{ $value->funding_name }}</td>
                                        <td>{{ $value->agency_name }}</td>
                                        <td>{{ $value->start }}</td>
                                        <td>{{ $value->end }}</td>
                                        <td><img src="/image/{{ $value->image }}"  width="100px"></td>
                                        <td>

                                            <form action="{{ route('issuess.destroy',$value->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <a href="{{ route('issuess.edit',$value->id) }}" class="btn btn-sm btn-success"><span
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
