<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\projectCreateRequest;
use App\Http\Requests\projectUpdateRequest;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'IsMaster']);
    }

    public function index(Request $request)
    {
        $projects = Project::all();
        return view('master.projects.index', compact('projects'));
    }

    public function submit(projectCreateRequest $request)
    {
        try {
            $image = uploadImageWithResize($request->file('image'), 'storage/projects/', 1500, 800);
            Project::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'description' => $request->description,               
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Project added successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $project = Project::find($id);
            return view('master.projects.edit', compact('project'));
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function update(projectUpdateRequest $request, $id)
    {
        try {
            $project = Project::find($id);
            $image = $project->image;
            if ($request->hasFile('image')) {
                if (File::exists(public_path('storage/projects/'.$project->image))) {
                    File::delete(public_path('storage/projects/'.$project->image));
                }
                $image = uploadImageWithResize($request->file('image'), 'storage/projects/', 1500, 800);
            }

            $project->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'description' => $request->description,                
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('master.projects.index')->with(['message_heading'=> 'Success', 'message'=> 'Project updated successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $project = Project::find($id);
            if (File::exists(public_path('storage/projects/'.$project->image))) {
                File::delete(public_path('storage/projects/'.$project->image));
            }
            $project->delete();
            return redirect()->back()->with(['message_heading'=> 'Success', 'message'=> 'Project deleted successfully', 'error_icon'=>'success']);
        } catch (Exception $error) {
            return redirect()->back()->with(['message_heading'=> 'Error', 'message'=> $error->getMessage(), 'error_icon'=>'error']);
        }
    }
}
