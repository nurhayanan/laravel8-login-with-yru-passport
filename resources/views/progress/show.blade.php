@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/contract') }}">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> วิจัย - รายละเอียดรายงานผลดำเนินงาน
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
      {{-- @php
        $data = DB::table('projects')->get();
      @endphp --}}



        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$data->id_project}} {{$data->project_name}}</div>
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
                            <table class="table table-hover">
                                <tr>
                                  <td>ดาวน์โหลดแบบฟอร์ม</td>
                                  <td><a href="{{asset('images/22375_เอกสารหมายเลข 2 สัญญาค้ำ.docx')}}">แบบ สวพ.1_รายงานความก้าวหน้า</a><br>

                                </td>

                                </tr>

                              </table>
                    </div>



                        <div class="card">
                        <div class="card-header">รายงานความก้าวหน้า</div>
                    <div class="card-body">

                            <form method="POST" action="{{ route('progress.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <table class="table table-hover">
                                @foreach ( $users as $user)

                                @endforeach
                                <tbody>
                                    <tr>
                                        <td width="30%">คำอธิบาย</td>
                                        <td>รายงานความก้าวหน้าโครงการวิจัย</td>
                                    </tr>
                                    <tr>
                                        <td>ไฟล์หลักฐาน</td>
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

                                    <tr>
                                        <td>สถานะ</td>
                                        <td></td>
                                    </tr>


                                    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                                    {!! Form::hidden('project_id', $data->id , ["class"=>"form-control"]) !!}
                                    {!! Form::hidden('status', null, ['class' => 'form-control']) !!}
                                </tbody>


                            </table>

                        </div>
                    </div>
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
