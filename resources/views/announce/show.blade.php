@extends('layouts.app')

@section('content')

@foreach ($data as  $row) @endforeach
<center><img src="/image/{{ $row->image }}" ></center>
<br>

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
