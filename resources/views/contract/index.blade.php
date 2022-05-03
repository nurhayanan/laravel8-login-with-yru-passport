@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> วิจัย - สัญญารับทุนวิจัย
                </li>
            </ol>
        </nav>
    </div>
</div>
            <div class="container">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;             {{-- @php
                    $announ = DB::table('announces')
                    ->join('years', 'announces.year_id', '=', 'years.id')
                    ->join('fundings', 'announces.funding_id', '=', 'fundings.id')
                    ->select('announces.*', 'years.name','fundings.name as n2')
                    ->get(); --}}
                    {{-- @endphp --}}
                    {{-- @foreach ($announ as $rows)@endforeach --}}
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ปีงบประมาณ</h3>
                                    {{-- <h6 class="text-danger">
                                        <a href="/contract/create" class="btn btn-outline-primary "
                                            style="float: right;"><span class='fa fa-plus'></span>เพิ่มข้อมูล</a>
                                    </h6> --}}
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-sm table-striped">
                        <thead>

                            <tr>
                                <th scope="col">รหัสโครงการ</th>
                                <th scope="col">ชื่อโครงการ(ที่อนุมัติแล้ว)</th>
                                <th scope="col">งบที่อนุมัติ</th>
                                <th scope="col">หมายเหตุ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                @foreach ($data as $row)
                                <th scope="row">{{$row->id_project}}</th>
                                <td><a href="{{route('contract.show',$row->id)}}">{{$row->project_name}}</a></td>
                                <td>{{$row->budget}}</a></td>
                                {{-- <td><a class="btn btn-sm btn-info"
                                    href="{{ route('contract.show2', $row->id) }}">
                                    ดูรายละเอียด
                                </a></td> --}}
                                <td></td>
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
        <br><br><br><br><br><br>
@endsection
