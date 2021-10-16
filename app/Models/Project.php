<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_name',
        'name_eng',
        'funding_id',
        'agency_id',
        'researchtype_id',
        'researchfield_id',
        'issuess_id',
        'strategic_id',
        'budget',
        'leader',
        'ratio',
        'associate',
        'percent',
        'position',
        'name',
        'file_path',
        'status',
        'cread',
        'comment',
    ];
    protected $guarded = [];
    protected $table = 'projects';

    public function storeData($request)
    {
        $project = project::create([
            'user_id' => request('user_id'),
            'project_name' => request('project_name'),
            'name_eng' => request('name_eng'),
            'funding_id' => request('funding_id'),
            'agency_id' => request('agency_id'),
            'researchtype_id' => request('researchtype_id'),
            'researchfield_id' => request('researchfield_id'),
            'issuess_id' => request('issuess_id'),
            'strategic_id' => request('strategic_id'),
            'budget' => request('budget'),
            'learder' => request('learder'),
            'ratio' => request('ratio'),
            'name' => request('name'),
            'file_path' => request('file_path'),
            'status' => request('status'),
            'cread' => request('cread'),
            'comment' => request('comment'),

        ]);

        if ($request->hasfile('file_path')) {
            $imagePath = $request->file('file_path');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('file_path')->storeAs('uploads', $imageName, 'public');
        }

        $project->name = $imageName;
        $project->file_path = '/storage/' . $path;
        $project->save();

        $project_sub = $request->row;
        $insert_ary = [];
        foreach ($project_sub as $key => $value) {
            $insert_ary[$key] = $value;
            $insert_ary[$key]['project_id'] = $project->id;
        }
        DB::table('projectsubs')->insert($insert_ary);

}
}
