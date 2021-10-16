@extends('layouts.app')

@section('content')

  <header>
      @php
          $data = DB::table('announces')->get();
          $datenow = date('Y-m-d');  //วันที่ปัจจุบัน
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
        <div class="carousel-item active" style="background-image: url('/image/{{ $item->image }}' )" >
          {{-- <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div> --}}
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('/image/{{ $item->image }}' )" >
          {{-- <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div> --}}
        </div>

        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{asset('images/ex3.jpg')}}">
          {{-- <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div> --}}
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

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
                <td>{{$row->funding_name}}</td>
                <td>{{$row->agency_name}}</td>
                @if($datenow  >=$row->start && $datenow <= $row->end)
                <td><i class="fa fa-calendar-check-o" aria-hidden="true" style="color:green"></i> {{$row->start}}-{{$row->end}}</td>
                @else
                <td><i class="fa fa-calendar-minus-o" aria-hidden="true" style="color:red"></i>{{$row->start}}-{{$row->end}}</td>
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

<p>&nbsp;</p>
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
