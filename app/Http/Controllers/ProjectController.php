<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index()
    {
        // $data = Project::latest()->paginate(5);
        $data = DB::table('projects')->where('user_id', Auth::user()->id)
          ->join('fundings', 'projects.funding_id', '=', 'fundings.id')
          ->select('projects.*', 'funding_name')
          ->get();
        $year = DB::table('years')
          ->latest('year_name')
          ->first();

        return view('project.index',compact('data', 'year'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    //show หน้า dashboard สวพ.
    public function index1()
    {
        $data = Project::all();
        return view('svp.dashboard', compact(['data']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funding = DB::table('fundings')->orderBy('id', 'asc')->get();
        $agency = DB::table('agencies')->get();
        $researchtype = DB::table('researchtypes')->get();
        $researchfield = DB::table('researchfields')->get();
        $strategic = DB::table('strategics')->pluck("strategic_name","id");
        $user = DB::table('users')->get();
        $rowReplace = 0;
        return view('project.create',compact('user','funding','agency','researchtype','researchfield','strategic','rowReplace'));
    }

    public function getissuess(Request $request)
    {
        $issuess = DB::table("issuesses")
        ->where("strategic_id",$request->strategic_id)
        ->pluck("issuess_name","id");
        return response()->json($issuess);
    }

    public function create1()
    {

        return view('svp.project.create');
    }

    public function autocompleteSearch(Request $request)
    {

          $query = $request->get('query');
          $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' =>'',
            'user_id'=> 'required',
            'project_name'=> 'required',
            'name_eng'=>'required',
            'funding_id'=> 'required',
            'agency_id'=> 'required',
            'researchtype_id'=> 'required',
            'researchfield_id'=> 'required',
            'issuess_id'=> 'required',
            'strategic_id'=> 'required',
            'budget'=> 'required',
            'leader'=> '',
            'ratio'=> 'required',
             // ->insert table projectsubs
             'row.*.associate' => 'required',
             'row.*.percent' => 'required',
             'row.*.position' => 'required',
             //->
            'name'=> '',
            'file_path'=> '',
            'status'=> '',
            'cread'=> '',
            'comment'=> '',
            'id_project'=> '',
        ],[

            'project_name.required'=> 'กรุณากรอกชื่อโครงการ',
            'name_eng.required'=> 'กรุณากรอกชื่อโครงการภาษาอังกฤษ',
            'funding_id.required'=> 'กรุณาเลือกแหล่งทุน',
            'agency_id.required'=> 'กรุณาเลือกกหน่วยงาน',
            'researchtype_id.required'=> 'กรุณาเลือกกประเภทการวิจัย',
            'researchfield_id.required'=> 'กรุณาเลือกสาขาการวิจัย',
            'issuess_id.required'=> 'กรุณาเลือกประเด็นการวิจัย',
            'strategic_id.required'=> 'กรุณาเลือกยุทธศาสตร์',
            'budget.required'=> 'กรุณากรอกงบประมาณ',
            'leader.required'=> 'กรุณากรอกหัวหนาโครงการ',
            'ratio.required'=> 'กรุณากรอกอัตราส่วน',
             // ->insert table projectsubs
             'row.*.associate.required' => 'required',
             'row.*.percent.required' => 'กรุณากรอกอัตราส่วน',
             'row.*.position.required' => 'กรุณาระบุตำแหน่ง',
             //->
            'name'=> '',
            'file_path'=> '',
            'status'=> '',
            'cread'=> '',
            'comment'=> '',
            'id_project'=> '',
        ]);

                $data = new Project;
                $data= $data->storeData($request);


                return view('welcome');
    }

    //เพิ่มข้อมูลในส่วนของการอนุมัติลงใน comments
    public function store1(Request $request)
    {

        $request->validate([
                    'project_id' => '',
                    'comment' => '',
                    'status' => '',
                    'cread' => '',
                    'id_project' => '',

                ]);

                $data = new Comment;
                $data->project_id = $request->input('project_id');
                $data->comment = $request->input('comment');
                $data->status = $request->input('status');
                $data->cread = $request->input('cread');
                $data->id_project = $request->input('id_project');
                $data->save();

                $data = new Project;


                return redirect('svp/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show1($id)
    {

        $rowReplace = 0;
        // แสดงผลในตาราง projectsubs ตามไอดี project ที่เลือก
        $projectsub = DB::table('projectsubs')->where('project_id','=',$id)->get();
        // แสดงผลในตาราง project ตามไอดี project ที่เลือก
        $data = project::find($id);
        // ให้แสดงผลที่หน้า svp.project.show
        return view('svp.project.show',compact('data','projectsub','rowReplace'));
    }

    public function show($id)

    {
        $projectsub = DB::table('projectsubs')->where('project_id','=',$id)->get();
        $comment = DB::table('comments')
        ->join('projects', 'comments.project_id', '=', 'projects.id')
        ->join('fundings', 'projects.funding_id', '=', 'fundings.id')
        ->select('comments.*', 'projects.project_name', 'fundings.funding_name')

        ->get();
        $data = Project::find($id);
        return view('project.show',compact('data','comment', 'projectsub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $funding = DB::table('fundings')->orderBy('id', 'asc')->get();
        $agency = DB::table('agencies')->get();
        $researchtype = DB::table('researchtypes')->get();
        $researchfield = DB::table('researchfields')->get();
        $strategic = DB::table('strategics')->pluck("strategic_name","id");
        $rowReplace = 0;
        $projectsub = DB::table('projectsubs')->get();

        return view('project.edit',compact('project', 'projectsub', 'funding','agency','researchtype','researchfield','strategic','rowReplace'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
                    'name_eng' => 'required',
                    'funding_id' => 'required',
                    'agency_id' => 'required',
                    'researchtype_id' => 'required',
                    'researchfield_id' => 'required',
                    'issuess_id' => 'required',
                    'strategic_id' => 'required',
                    'budget' => 'required',
                    // ->insert table projectsubs
                    'row.*.associate' => 'required',
                    'row.*.percent' => 'required',
                    'row.*.position' => 'required',
                    //->
                    'file_path' => 'required',
                    'user_id' => 'required',
                    'status' => '' ,
                    'cread' => '',
                    'comment' => '',

        ]);

        // MAIN STUDENT INFO UPDATED
        $form_data = array(
            'id' => $request->id,
            'project_name'  => $request->project_name,
                    'name_eng'  => $request->name_eng,
                    'funding_id'  => $request->funding_id,
                    'agency_id'  => $request->agency_id,
                    'researchtype_id'  => $request->researchtype_id,
                    'researchfield_id'  => $request->researchfield_id,
                    'issuess_id'  => $request->issuess_id,
                    'strategic_id'  => $request->strategic_id,
                    'budget'  => $request->budget,
                    'file_path' => $request->file_path,
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                    'cread' => $request->cread,
                    'comment' => $request->comment,
        );
        project::whereId($id)->update($form_data);

        // STUDENT MARK UPDATED
        $projectsub = $request->row;
        $update_array = [];
            foreach ($projectsub as $key => $value) {
                $update_array = $value;
                DB::table('projectsubs')->where('id', '=',$key)->update($update_array);
            }
            if (!empty($projectsub)) {
                foreach ($projectsub as $key => $value) {
                    $update_array = $value;
                    $update_array['project_id'] = $request->id;
                }
                DB::table('projectsubs')->where('id', '=',$key)->insert($update_array);
            }

            return redirect('/project');

    }

    public function update1(Request $request, $id)
    {

        $this->validate($request, [
            'cread' =>'required',
            'status' => 'required',
            'comment'=>'',
            'id_project'=>'',

        ]);

        $data = Project::find($id);
        $data->cread = $request->cread;
        $data->status = $request->status;
        $data->comment = $request->comment;
        $data->id_project = $request->id_project;
        $data->save();

        $request->validate([
            'project_id' => 'required',
            'status' => '',
            'comment' => '',
            'cread' => '',
            'id-project' => '',
        ]);

        $data = new Comment;
        $data->project_id = $request->input('project_id');
        $data->status = $request->input('status');
        $data->comment = $request->input('comment');
        $data->cread = $request->input('cread');
        $data->id_project = $request->input('id_project');
        $data->save();

      return redirect('svp/dashboard');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
