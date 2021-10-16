@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div _ngcontent-irs-c70="" class="content-title content-title-clear ng-star-inserted">
        <h4 _ngcontent-irs-c70="">วิจัย - โครงการขอทุน</h4>
    </div>
    <div class="container">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ปีงบประมาณ &nbsp;{{ $year->year_name }}</h3>
                                <h6 class="text-danger">
                                    <a href="{{ route('project.create') }}" class="btn btn-outline-primary "
                                        style="float: right;"><span class='fa fa-plus'></span>เพิ่มข้อมูล</a>
                                </h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">แหล่งทุน</th>
                                            <th scope="col">ชื่อโครงการ</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">ผลการพิจารณา</th>
                                            <th scope="col">หมายเหตุ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr>
                                                <th scope="row">{{ $value->funding_name }}</th>
                                                <td>{{ $value->project_name }}</td>
                                                @if ($value->status == '1')
                                                    <td><span class="badge badge-success">อนุมัติ</span></td>
                                                @elseif($value->status =='2')
                                                    <td><span class="badge badge-danger">ไม่อนุมัติ</span></td>
                                                @elseif($value->status =='3')
                                                    <td><span class="badge badge-danger">แก้ไข</span></td>
                                                @else
                                                    <td><span class="badge badge-warning">รอการตรวจสอบ</span></td>
                                                @endif
                                                <td>{{ $value->cread }} </td>
                                                {{-- @if ($value->status == '1')
                                                    <td></td>
                                                @elseif($value->status =='2')
                                                    <td></td>
                                                @elseif($value->status =='3') --}}
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{route('project.show',$value->id)}}">
                                                            ดูรายละเอียด
                                                        </a>

                                                    </td>
                                                {{-- @else --}}
                                                    {{-- <td></td>
                                                @endif --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {!! $data->links() !!} --}}
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
