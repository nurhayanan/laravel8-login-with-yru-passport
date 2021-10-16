@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div _ngcontent-irs-c70="" class="content-title content-title-clear ng-star-inserted">
        <h4 _ngcontent-irs-c70="">วิจัย - รายละเอียดโครงการขอทุน</h4>
    </div>
    <div class="container">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        รายละเอียดข้อมูลโครงการ
                    </div>
                    <div class="card-body">
        {{-- {!! Form::open(['action' => ['svp\ProjectController@update', $data->id], 'method' => 'POST']) !!} --}}
        {{ csrf_field() }}
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
                        @php

                        @endphp
                        <td>งบประมาณ</td>
                        <td>
                            @php
                                $number =  $data->budget;

                                echo number_format( $number ); //123,456
                            @endphp
                            บาท
                        </td>
                    </tr>
                    @foreach ($projectsub as $key => $projectsubs)
                        {{-- <tr>
                <td>{{$projectsubs->position}}</td>
                <td>{{ $projectsubs->associate  }} </td>
                <td>อัตราส่วน {{ $data->percent }}%</td>
            </tr> --}}
                        {{-- @include('svp/associate') --}}

                        <tr>
                            <td>{{ $projectsubs->position }}</td>
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
                            <div class="form-group radioeffect">

                                <label for="radio1" class="css-label radGroup1">สถานะ:</label><br>
                                @if ($data->status == '1')
                                <span class="badge badge-success">อนุมัติ</span>
                            @elseif($data->status =='2')
                                <span class="badge badge-danger">ไม่อนุมัติ</span>
                            @elseif($data->status =='3')
                                <span class="badge badge-danger">แก้ไข</span>
                            @else
                                <span class="badge badge-warning">รอการตรวจสอบ</span>
                            @endif
                            <br>
                                <label for="radio1" class="css-label radGroup1">ข้อเสนอแนะ:</label><br>
                                {{ $data->comment }}

                            </div>

                        </td>
                    </tr>




                </tbody>


            </table>


        </div>

        <div class="text-center">
            {{-- <input type="submit" name="submit" value="บันทึก" class="btn btn-success"> --}}
            <a href="{{route('project.edit',$data->id)}}" type="submit" name="submit" class="btn btn-sm btn-danger"><span
                class='fa fa-edit'></span>แก้ไข</a>
        </div>
    </div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>

    {{-- @include('svp/project/create') --}}

    </div>
    </div>
    </div>
    </div>
    <div class="container">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <table id="example1" class="table table-sm table-striped">
            <thead>
                <tr>
                    <th scope="col">วันที่</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">หมายเหตุ</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($comment as $row)
                    <tr>
                        <td>{{ $row->created_at }}</td>
                        @if ($row->status == '1')
                            <td><span class="fa fa-check-circle-o">ผ่านการอนุมัติ</span></td>
                        @elseif($row->status =='2')
                            <td><span class="badge badge-danger">ไม่อนุมัติ</span></td>
                        @elseif($row->status =='3')
                            <td><span class="fa fa-commenting-o">แก้ไขตามข้อเสนอแนะ</span></td>
                        @elseif($row->status =='0')
                            <td><i class="fa fa-paper-plane">ส่งแล้ว รอตอบรับ</i></td>
                        @elseif($row->status =='4')
                            <td><i class="fa fa-mail-reply">ดึงกลับเพื่อแก้ไข</i></td>
                        @else
                            <td><span class="badge badge-warning">รอการตรวจสอบ</span></td>
                        @endif
                        <td>{{ $row->comment }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
