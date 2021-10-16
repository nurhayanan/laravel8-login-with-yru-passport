@extends('layouts.svp.back')

@section('content')
<div class="container">
    <div class="container-fluid">
        {{-- <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>
              <div class="info-box-content">
                <?php
                  $researchtypes = DB::table('researchtypes')->count();
                ?>
                <span class="info-box-text">ประเภทการวิจัย</span>
                <span class="info-box-number">
                  {{$researchtypes}}
                  <small>ประเภท</small>
                </span>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-university"></i></span>
              <div class="info-box-content">
                <?php
                $agencies = DB::table('agencies')->count();
              ?>
                <span class="info-box-text">หน่วยงาน</span>
                <span class="info-box-number">
                  {{$agencies}}
                  <small>หน่วยงาน</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
              <?php
              $projects = DB::table('projects')->where('status', '=', 2)->count();
            ?>
              <div class="info-box-content">
                <span class="info-box-text">อนุมัติ</span>
                <span class="info-box-number">
                  {{$projects}}
                  <small>โครงการ</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas  fa-times-circle"></i></span>
              <?php
              $projects = DB::table('projects')->where('status', '=', 3)->count();
            ?>
              <div class="info-box-content">
                <span class="info-box-text">แก้ไข</span>
                <span class="info-box-number">
                  {{$projects}}
                  <small>โครงการ</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box --> --}}
          {{-- </div>
          <!-- /.col -->
        </div> --}}

        <!-- /.row -->
          <!-- TABLE: ข้อเสนอโครงการ -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">ข้อเสนอโครงการ</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0 text-center">
                  <thead>
                    <?php
                    $projects = DB::table('projects')->get();
                  ?>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อโครงการ</th>
                    <th>รหัสโครงการ</th>
                    <th>สถานะ</th>
                    <th>วันที่อนุมัติ</th>
                    <th>รายละเอียด</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($projects as $row)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$row->project_name}}</td>
                      <td>00-0000</td>

                        @if($row->status =='1')
                        <td><span class="badge badge-success">อนุมัติ</span></td>
                        @elseif($row->status =='2')
                        <td><span class="badge badge-danger">ไม่อนุมัติ</span></td>
                        @elseif($row->status =='3')
                        <td><span class="badge badge-danger">แก้ไข</span></td>
                         @else
                        <td><span class="badge badge-warning">รอการตรวจสอบ</span></td>
                        @endif

                      <td>{{$row->created_at}}</td>
                      <td>
                        <a class="btn btn-sm btn-info" href="{{route('svp.project.show',$row->id)}}">ดูรายละเอียด</a>
                      </td>

                    </tr>
                    @php
                    $i++;
                    @endphp
                      @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
    </div>
    </div>
</div>
@endsection
