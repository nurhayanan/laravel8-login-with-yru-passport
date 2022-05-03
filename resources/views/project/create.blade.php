@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/project') }}">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> วิจัย - เสนอโครงการขอทุน
                </li>
            </ol>
        </nav>
    </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        กรอกข้อมูลโครงการ
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif

                        <form  action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="30%">ชื่อโครงการ<span style="color: red;">*</span></td>
                                        <td> <textarea class="form-control {{ $errors->has('project_name') ? 'has-error' : '' }}"
                                            style="height:50px" name="project_name" placeholder="กรุณากรอกข้อมูล"></textarea>
                                            <span class="text-danger">{{ $errors->first('project_name') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">ชื่อโครงการภาษาอังกฤษ<span style="color: red;">*</span></td>
                                        <td> <textarea class="form-control {{ $errors->has('name_eng') ? 'has-error' : '' }}"
                                            style="height:50px" name="name_eng" placeholder="กรุณากรอกข้อมูล"></textarea>
                                            <span class="text-danger">{{ $errors->first('name_eng') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">แหล่งทุน<span style="color: red;">*</span></td>
                                        <td>
                                            <select class='form-control {{ $errors->has('funding_id') ? 'has-error' : '' }}' id='funding_id' name='funding_id'>
                                                <option>Select Item</option>
                                                @foreach ($funding as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id ? 'selected' : '' }}>
                                                        {{ $item->funding_name }} </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('funding_id') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">หน่วยงาน<span style="color: red;">*</span></td>
                                        <td>
                                            <select class='form-control {{ $errors->has('agency_id') ? 'has-error' : '' }}' id='agency_id' name='agency_id'>
                                                <option>Select Item</option>
                                                @foreach ($agency as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id ? 'selected' : '' }}>
                                                        {{ $item->agency_name }} </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('agency_id') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">ประเภทการวิจัย<span style="color: red;">*</span></td>
                                        <td>
                                            <div class="form-group radioeffect {{ $errors->has('researchtype_id') ? 'has-error' : '' }}">
                                                @foreach ($researchtype as $item)
                                                    <input type="radio" id="researchtype_id" name="researchtype_id"
                                                        value="{{ $item->id }}">
                                                    <label for="male">{{ $item->research_type }}</label> <br>
                                                @endforeach
                                            </div>
                                            <span class="text-danger">{{ $errors->first('researchtype_id') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">สาขาการวิจัย<span style="color: red;">*</span></td>
                                        <td>
                                            <select id="researchfield_id" name="researchfield_id" class="form-control {{ $errors->has('researchfield_id') ? 'has-error' : '' }}">
                                                <option>Select Item</option>
                                                @foreach ($researchfield as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id ? 'selected' : '' }}>
                                                        {{ $item->research_field }} </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('researchfield_id') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" for="strategic">ยุทธศาสตร์<span style="color: red;">*</span></td>
                                        <td>
                                            <select id="strategic" name="strategic_id" class="form-control {{ $errors->has('strategic_id') ? 'has-error' : '' }}">
                                                <option value="" selected disabled>โปรดเลือกยุทธศาสตร์</option>
                                                @foreach ($strategic as $key => $country)
                                                    <option value="{{ $key }}"> {{ $country }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('strategic_id') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%" for="issuess">ประเด็นการวิจัย<span style="color: red;">*</span></td>
                                        <td>
                                            <select name="issuess_id" id="issuess" class="form-control {{ $errors->has('issuess_id') ? 'has-error' : '' }}"></select>
                                        <span class="text-danger">{{ $errors->first('issuess_id') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">งบประมาณ<span style="color: red;">*</span></td>
                                        <td> <input type="number" class="form-control {{ $errors->has('budget') ? 'has-error' : '' }}" style="height:50px" name="budget"
                                                placeholder="กรุณากรอกข้อมูล">
                                                <span class="text-danger">{{ $errors->first('budget') }}</span>
                                        </td>
                                    </tr>
                                    <?php

	                                        $url = "https://api1.yru.ac.th/profile/v1/users?include=journals,articles&paginate_false=true";

	                                        $content = file_get_contents($url);
	                                        $data = json_decode($content);
	                                    ?>
                                    <tr>
                                        <td width="30%">หัวหน้าโครงการ<span style="color: red;">*</span></td>
                                        <td>
                                            <select class="form-select" id="single-select-clear-field" name="leader" data-placeholder="Choose one thing">
                                                <option></option>
                                                <?php $i=0; foreach ($data->data as $data) { $i++;  ?>
                                                    <option value="<?php echo $data->id; ?>"><?php echo $data->special->name_1; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">อัตราส่วน<span style="color: red;">*</span></td>
                                        <td> <input type="number" class="form-control {{ $errors->has('ratio') ? 'has-error' : '' }}" style="height:50px" name="ratio"
                                                placeholder="กรุณากรอกข้อมูล">
                                                <span class="text-danger">{{ $errors->first('ratio') }}</span>
                                        </td>
                                    </tr>

                                    <div class="panel panel-footer">
                                        <table class="table table-bordered" id="crud_table">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อ-สกุล</th>
                                                    <th>อัตราส่วน</th>
                                                    <th>หมายเหตุ</th>
                                                    <th>
                                                        <a href="#" class="btn btn-primary addRow">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            @if (old('row') != '')
                                                <tbody class="validation-tbody-destination"
                                                    id="validation-tbody-destination">
                                                    <?php
                                                    $old_row = old('row');
                                                    $rowReplace = count($old_row);
                                                    ?>
                                                    @foreach ($old_row as $key => $value)
                                                        <tr class="num-row main_data validation" id="num-row">
                                                            <td>
                                                                <div
                                                                    class="form-group {{ $errors->has("row.$key.associate") ? 'has-error' : '' }}">
                                                                    <input type="text"
                                                                        name="row[{{ $key }}][associate]"
                                                                        class="typeahead form-control" id="associate"
                                                                        value="{{ $value['associate'] }}">
                                                                    <span
                                                                        class="text-danger">{{ $errors->first("row.$key.associate") }}</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="form-group {{ $errors->has("row.$key.percent") ? 'has-error' : '' }}">
                                                                    <input type="text"
                                                                        name="row[{{ $key }}][percent]"
                                                                        class="form-control percent" id="percent"
                                                                        value="{{ $value['percent'] }}">
                                                                    <span
                                                                        class="text-danger">{{ $errors->first("row.$key.percent") }}</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="form-group {{ $errors->has("row.$key.position") ? 'has-error' : '' }}">
                                                                    <input type="text"
                                                                        name="row[{{ $key }}][position]"
                                                                        class="form-control position" id="position"
                                                                        value="{{ $value['position'] }}">
                                                                    <span
                                                                        class="text-danger">{{ $errors->first("row.$key.position") }}</span>
                                                                </div>
                                                            </td>
                                                            <td><a href="#" class="btn btn-danger remove">
                                                                    <i class="fa fa-plus"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            @else
                                                <tbody class="original-tbody-destination" id="original-tbody-destination">
                                                </tbody>
                                            @endif
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td>Total:<b class="total" id="total"> </b></td>
                                                    <td></td>
                                                    <td></b></td>

                                                </tr>
                                            </tfoot>

                                        </table>

                                    <tr>
                                        <td>ไฟล์ proposal<span style="color: red;">*</span></td>
                                        <td> {!! Form::file('file_path', null, ['class' => 'form-control']) !!}</td>
                                    </tr>
                                    {!! Form::hidden('status', 0, ['class' => 'form-control']) !!}
                                    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                                    {!! Form::hidden('cread', null, ['class' => 'form-control']) !!}
                                    {!! Form::hidden('comment', null, ['class' => 'form-control']) !!}
                                </tbody>
                            </table>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <a href="/project" class="btn btn-danger">ย้อนกลับ</a>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')

    <script type=text/javascript>
        $('#strategic').change(function() {
            var strategicID = $(this).val();
            if (strategicID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getissuess') }}?strategic_id=" + strategicID,
                    success: function(res) {
                        if (res) {
                            $("#issuess").empty();
                            $("#issuess").append('<option>โปรดเลือกประเด็นการวิจัย</option>');
                            $.each(res, function(key, value) {
                                $("#issuess").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#issuess").empty();
                        }
                    }
                });
            } else {
                $("#issuess").empty();
                $("#city").empty();
            }
        });
        $('#issuess').on('change', function() {
            var issuessID = $(this).val();
            if (issuessID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('getCity') }}?issuess_id=" + issuessID,
                    success: function(res) {
                        if (res) {
                            $("#city").empty();
                            $("#city").append('<option>Select City</option>');
                            $.each(res, function(key, value) {
                                $("#city").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $("#city").empty();
            }

        });
    </script>

    <script type="text/javascript">
        $('tbody .main_data').delegate('.associate,.percent,.position,.status', 'keyup', function() {
            var tr = $(this).parent().parent();
            var associate = tr.find('.associate').val();
            var percent = tr.find('.percent').val();
            var position = tr.find('.position').val();
        });
        var int = "{{ $rowReplace }}";

        function addRow() {
            var tr = '<tr class="table_field main_data " id="table_field-' + (int) + '">' +
                '<td><input type="text" name="row[' + (int) +
                '][associate]" class="typeahead form-control" id="associate"></td>' +
                '<td><input type="text" name="row[' + (int) +
                '][percent]" class="form-control percent"  maxlength="3" id="percent"></td>' +
                '<td><input type="text" name="row[' + (int) +
                '][position]" class="form-control position"   id="position"></td>' +

                '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-minus"></i></a></td>' +
                '</tr>';
            $('.original-tbody-destination').append(tr);
            int++;
        };

        $(function() {
            $('.addRow').trigger("click");
        });
        $('.addRow').on('click', function() {
            addRow();
        });
        $(document).on("keypress keyup blur", '.percent', function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $('.associate').bind('keyup blur', function() {
            var node = $(this);
            node.val(node.val().replace(/[^a-zA-Z]/g, ''));
        });
        $('.position').bind('keyup blur', function() {
            var node = $(this);
            node.val(node.val().replace(/[^a-zA-Z]/g, ''));
        });

        $(document).ready(function() {
            $(".original-tbody-destination").on('input', '.percent', function() {
                var calculated_total_sum = 0;
                $(".original-tbody-destination .percent").each(function() {
                    var get_textbox_value = $(this).val();

                    if ($.isNumeric(get_textbox_value)) {
                        calculated_total_sum += parseFloat(get_textbox_value);
                    }
                });
                $("#total").html(calculated_total_sum);

            });
        });

        $(document).on('click', '.remove', function() {
            var delete_row = $(this).data(".table_field");
            $(this).parent().parent().remove();
            $(".percent").trigger("input");
            $(".position").trigger("input");
        });
        // $(document).on('input','.percent', function(){
        //     var total = $(this).data(".percent",true);
        //         if($(this).val() > 100 ){
        //             alert('Enter a Marks 100');
        //             $(this).val('');
        //             $('#total').html('');
        //         }
        // });

    </script>
    <!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script type="text/javascript">
		$( '#single-select-clear-field' ).select2( {
			theme: "bootstrap-5",
			width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
			placeholder: $( this ).data( 'placeholder' ),
			allowClear: true
		} );
	</script>
@endsection
