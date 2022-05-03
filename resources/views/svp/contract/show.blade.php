@extends('layouts.svp.back')

@section('content')
    <div class="container">

                        <form action="{{ route('svp.update1',$data->id) }}" method="POST">                       
                            {{ csrf_field() }}
                           

                              <div class="row justify-content-center">
                                  <div class="col-md-12">
                                    @foreach ( $project as $row)

                                    @endforeach
        
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

                                            <form action="{{ route('contract.update',$data->id) }}" method="PUT">

                                              {{ csrf_field() }}
                                              <div class="col-md-12">
                                                  <table class="table table-hover">

                                                      <tbody>
                                                          <tr>
                                                              <td width="30%">ชื่อ-สกุล</td>
                                                              <td>{{ $row->name }}</td>
                                                          </tr>
                                                          <tr>
                                                              <td>ตำแหน่ง</td>
                                                              <td>{{$row->job_position }}</td>
                                                          </tr>

                                                          <tr>
                                                              <td>สังกัด</td>
                                                              <td>{{ $row->department }}</td>
                                                          </tr>

                                                          <tr>
                                                              <td>ที่อยู่</td>
                                                              <td> {{ $row->address_present }}</td>
                                                          </tr>

                                                          <tr>
                                                              <td>เบอร์โทร</td>
                                                              <td> {{ $row->mobile }}</td>
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
                                                              <td> <input type="date" class="form-control" id="date" name="date"></td>
                                                          </tr>

                                                          <tr>
                                                              <td>ระยะเวลา</td>
                                                              <td> <input type="text" class="form-control" id="period" name="period"></td>
                                                          </tr>

                                                          <tr>
                                                              <td>ผู้ค้ำประกัน</td>
                                                              <td>
                                                                {{ $data->guarantor }}
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td>แบบฟอร์มดาวน์โหลด</td>
                                                              <td><a href="{{ $data->file_path }}">{{ $data->filenames }}</a></td>

                                                          </tr>
                                                          <tr>
                                                            <td width="30%">ผลการพิจารณา</td>
                                                            <td>
                                                                {{-- status=1 ->อนุมัติ
                                                                status=2 ->ไม่อนุมัติ
                                                                status=3 ->แก้ไข --}}
                                                                {!! Form::hidden('project_id', $row->id , ["class"=>"form-control"]) !!}
                                                                <div class="form-group radioeffect">
                                                                    <input name="status"  value="1" class="css-checkbox radioshow"
                                                                        type="radio" >
                                                                    <label for="radio1" class="css-label radGroup1">อนุมัติ</label><br>

                                                                    <input name="status"   class="css-checkbox radioshow" type="radio">
                                                                    <label for="radio1" class="css-label radGroup1">ไม่อนุมัติ</label><br>

                                                                    <input name="status" id="radio2" value="3" class="css-checkbox radioshow"
                                                                        type="radio" >
                                                                    <label for="radio2" class="css-label radGroup1" name="status" id="status" value="3">ส่งกลับเพื่อแก้ไข</label>
                                                                </div>
                                                                <div class="div1 allshow" style="display: none;">
                                                                    เกรด:
                                                                        <div class="col-md-8">
                                                                            <select class="form-control col-md-4" id="cread" name="cread" required onchange="Change(this.value);">
                                                                              <option value="-">---</option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                            </select>
                                                                          </div>
                                                                </div>
                                                                <div class="div2 allshow" style="display: none;">
                                                                    หมายเหตุ: <textarea id='comment' name='comment' rows='4' cols='80'></textarea>
                                                                </div>

                                                            </td>
                                                           </tr>

                                                          {{-- {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                                                          {!! Form::hidden('project_id', $row->id , ["class"=>"form-control"]) !!} --}}
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
                        </div>
                    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.radioshow').on('change', function() {
                var val = $(this).attr('data-class');
                $('.allshow').hide();
                $('.' + val).show();
            });
        });
    </script>
@endsection
