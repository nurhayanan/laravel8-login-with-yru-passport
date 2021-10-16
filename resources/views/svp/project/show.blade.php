@extends('layouts.svp.back')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">รายละเอียดโครงการ</div>
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
                        <form action="{{ route('svp.update',$data->id) }}" method="POST">                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <td width="30%">ชื่อโครงการ</td>
                                        <td>{{ $data->project_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>ชื่อโครงการภาษาอังกฤษ</td>
                                        <td>{{ $data->name_eng }}</td>
                                    </tr>
                                    @include('svp/project/index')

                                    <tr>
                                        <td>งบประมาณ</td>
                                        <td>{{ $data->budget }}</td>
                                    </tr>
                                    @foreach ($projectsub as $key => $projectsubs)
                                    {{-- <tr>
                                        <td>{{$projectsubs->position}}</td>
                                        <td>{{ $projectsubs->associate  }} </td>
                                        <td>อัตราส่วน {{ $data->percent }}%</td>
                                    </tr> --}}
                                    {{-- @include('svp/associate') --}}

                                        <tr>
                                            <td>{{$projectsubs->position}}</td>
                                            <td>
                                                {{ $projectsubs->associate }}
                                            </td>
                                            <td>
                                                อัตราส่วน {{ $projectsubs->percent }}%
                                            </td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>ไฟล์ Proposol</td>
                                        <td><a href="{{ $data->file_path }}">{{ $data->name }}</a></td>
                                    </tr>
                                   <tr>
                                    <td width="30%">ผลการพิจารณา</td>
                                    <td>
                                        {{-- status=1 ->อนุมัติ
                                        status=2 ->ไม่อนุมัติ
                                        status=3 ->แก้ไข --}}
                                        {!! Form::hidden('project_id', $data->id , ["class"=>"form-control"]) !!}
                                        <div class="form-group radioeffect">
                                            <input name="status" id="radio1" value="1" class="css-checkbox radioshow"
                                                type="radio" data-class="div1">
                                            <label for="radio1" class="css-label radGroup1">อนุมัติ</label><br>

                                            <input name="status"  value="2" class="css-checkbox radioshow" type="radio">
                                            <label for="radio1" class="css-label radGroup1">ไม่อนุมัติ</label><br>

                                            <input name="status" id="radio2" value="3" class="css-checkbox radioshow"
                                                type="radio" data-class="div2">
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




                                </tbody>


                            </table>

                        </div>

                        <div class="text-center">
                            <input type="submit" name="submit" value="บันทึก" class="btn btn-success">
                        <a href="/project" class="btn btn-danger">ย้อนกลับ</a>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    {{-- @include('svp/project/create') --}}

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
