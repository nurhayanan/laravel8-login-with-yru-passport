@php
    $data= DB::table('projects')
            ->join('researchtypes', 'projects.researchtype_id', '=', 'researchtypes.id')
            ->join('researchfields', 'projects.researchfield_id', '=', 'researchfields.id')
            ->join('strategics', 'projects.strategic_id', '=', 'strategics.id')
            ->join('issuesses', 'projects.issuess_id', '=', 'issuesses.id')
            ->select('projects.*', 'researchtypes.research_type', 'researchfields.research_field', 'strategics.strategic_name', 'issuesses.issuess_name')
            ->get();
@endphp
@foreach ($data as $row)
@endforeach

<tr>
    <td>ประเภทการวิจัย</td>
    <td>{{$row->research_type}}</td>
  </tr>

  <tr>
    <td>สาขาการวิจัย</td>
    <td>{{$row->research_field}}</td>
  </tr>

  <tr>
    <td>ยุทธศาสตร์</td>
    <td>{{$row->strategic_name}}</td>
  </tr>

  <tr>
    <td>ประเด็นการวิจัย</td>
    <td>{{$row->issuess_name}}</td>
  </tr>
