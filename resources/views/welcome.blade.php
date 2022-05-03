@extends('layouts.app')

@section('content')
{{--
  <header>
      @php
          $data = DB::table('announces')->get();
      @endphp
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      @foreach ($data as $item) @endforeach
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('/image/{{ $item->image }}')" width="100px" >
          {{-- <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div> --}}


  <div class="container my-5">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">ประกาศทุนวิจัย</h4>
                  <h6 class="text-danger"></h6>
    <table class="table">
      @php

      $data = DB::table('announces')
              ->join('years', 'announces.year_id', '=', 'years.id')
              ->join('fundings', 'announces.funding_id', '=', 'fundings.id')
              ->join('agencies', 'announces.agency_id', '=', 'agencies.id')
              ->select('announces.*', 'years.year_name','fundings.funding_name','agencies.agency_name')
              ->get();
      $datenow = date('Y-m-d');  //วันที่ปัจจุบัน
     @endphp
            <thead>
             <tr>
                <th scope="col">ปีงบประมาณ</th>
                <th scope="col">แหล่งทุน</th>
                <th scope="col">หน่วยงาน</th>
                <th scope="col">ช่วงเวลาเปิดรับ</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($data as $row)
              <tr>

                <td>{{$row->year_name}}</td>
                <td><a href="{{route('announce.show',$row->id)}}">{{$row->funding_name}}</a></td>
                <td>{{$row->agency_name}}</td>
                @php
                $date = $row->start;
                $date1 = $row->end;

                formatDate($date); // call custom helper function

                @endphp
                @if($datenow >=$row->start && $datenow <= $row->end)
                <td><i class="fa fa-calendar-check-o" aria-hidden="true" style="color:green"></i> {{formatDate($date)}}-{{formatDate($date1)}}</td>
                @else
                <td><i class="fa fa-calendar-minus-o" aria-hidden="true" style="color:red"></i>{{formatDate($date)}}-{{formatDate($date1)}}</td>
            @endif
            </tr>

                @endforeach
            </tbody>

    </table>


             </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

<div class="row my-6">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ติดต่อ</h4>
                <h5><a href="http://srdi.yru.ac.th/" target="_blank">สถาบันวิจัยและพัฒนาชายแดนภาคใต้</a></h5>
                <p><a href="http://srdi.yru.ac.th/research/" target="_blank">งานส่งเสริมการวิจัยและข้อมูลท้องถิ่น</a></p>
                <p><i class="fa fa-phone"></i> 073-299635, 073-299699 ต่อ 31002</p>
                <p><a href="http://srdi.yru.ac.th/hrd/" target="_blank">งานพัฒนาทรัพยากรมนุษย์ (บริการวิชาการ)</a></p>
                <p><i class="fa fa-phone"></i> 073-299699 ต่อ 31000</p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="fa fa-calendar"></i> ปฏิทินงานวิจัยและงานบริการวิชาการ
                </h4>
                <div class="responsive-iframe-container">
                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=yru.ac.th_pl2r5mgjhhvhskhu0s37hj9smc%40group.calendar.google.com&amp;color=%231B887A&amp;ctz=Asia%2FBangkok" width="700" height="400" frameborder="0" scrolling="no" style="border-width: 0;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
