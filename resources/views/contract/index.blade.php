@extends('layouts.app')

@section('content')

            <div _ngcontent-irs-c70="" class="content-title content-title-clear ng-star-inserted">
                <h4 _ngcontent-irs-c70="">วิจัย - จัดทำสัญญา</h4>
            </div>
            <div class="container">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{-- @php
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
                                <th scope="col">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                @foreach ($data as $row)
                                <th scope="row">{{$row->id}}</th>
                                <td><a href="{{route('contract.create',$row->id)}}">{{$row->project_name}}</a></td>
                                <td>{{$row->budget}}</a></td>
                                
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
