@extends('layouts.app')

@section('content')
<div _ngcontent-irs-c70="" class="content-title content-title-clear ng-star-inserted">
                <h4 _ngcontent-irs-c70="">วิจัย - รายละเอียดสัญญาจ้าง</h4>
            </div>
<div class="container">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
      {{-- @php
        $data = DB::table('projects')->get();
      @endphp --}}
      @foreach ( $data as $row)

      @endforeach


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$row->project_name}}</div>
                    <div class="card-body">
                        @if ($errors->all())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="card">
                        <div class="card-header">ข้อมูลนักวิจัย</div>
                    <div class="card-body">

                            <form method="POST" action="{{ route('contract.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <table class="table table-hover">
                                @foreach ( $users as $user)

                                @endforeach
                                <tbody>
                                    <tr>
                                        <td width="30%">ชื่อ-สกุล</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>ตำแหน่ง</td>
                                        <td>{{$user->job_position }}</td>
                                    </tr>

                                    <tr>
                                        <td>สังกัด</td>
                                        <td>{{ $user->department }}</td>
                                    </tr>

                                    <tr>
                                        <td>ที่อยู่</td>
                                        <td> {{ $user->address_present }}</td>
                                    </tr>

                                    <tr>
                                        <td>เบอร์โทร</td>
                                        <td> {{ $user->mobile }}</td>
                                    </tr>

                                </tbody>


                            </table>

                        </div>
                    </div>
                </div>
                        <div class="card">
<div class="card-header">รายละเอียดสัญญา</div>
                    <div class="card-body">
                         <div class="col-md-12">
                            <table class="table table-hover">

                                <tbody>
                                    <tr>
                                        <td width="30%">แหล่งทุน</td>
                                        <td>{{ $row->funding_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>งบประมาณ</td>
                                        <td>{{ $row->budget }}</td>
                                    </tr>

                                    <tr>
                                        <td>วันที่ทำสัญญา</td>
                                        <td> <input class="form-control " type="date" id="date" name="date"></td>
                                    </tr>

                                    <tr>
                                        <td>ระยะเวลา</td>
                                        <td> <input class="form-control " type="text" id="period" name="period"> </td>
                                    </tr>

                                    <tr>
                                        <td>ผู้ค้ำประกัน</td>
                                        <td>
                                            <input type="text" class="form-control" id="guarantor" name="guarantor">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>แบบฟอร์มดาวน์โหลด</td>
                                        <td>

                                            <a href="{{asset('images/22375_เอกสารหมายเลข 2 สัญญาค้ำ.docx')}}">22375_เอกสารสัญญาค้ำ</a><br>
                                        <a href="{{asset('images/22376_เอกสารหมายเลข 2 สัญญารับทุน แก้.docx')}}">22376_เอกสารสัญญารับทุน</a> </td>
                                    </tr>
                                    <tr>
                                        <td>อัพโหลดแบบฟอร์ม</td>
                                        <td>
                                            <div class="input-group hdtuto control-group lst increment" >
                                                <input type="file" name="filenames[]" class="myfrm form-control">
                                                <div class="input-group-btn">
                                                  <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                              </div>
                                              <div class="clone hide">
                                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                                  <input type="file" name="filenames[]" class="myfrm form-control">
                                                  <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                  </div>
                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                                    {!! Form::hidden('project_id', $row->id , ["class"=>"form-control"]) !!}
                                    {{-- {!! Form::hidden('status', null, ['class' => 'form-control']) !!} --}}



                                </tbody>


                            </table>

                        </div>

                        <div class="text-center">
                            <button type="submit" name="status" id="status" value="2"
                                class="btn btn-success">บันทึก</button>

                            <a href="/svp/dashboard" class="btn btn-primary">ย้อนกลับ</a>
                        </div>
                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".hdtuto").remove();
      });
    });
</script>
