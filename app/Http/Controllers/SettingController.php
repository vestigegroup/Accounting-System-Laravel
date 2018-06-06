<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use AccountSystem\Model\Project;
use AccountSystem\Model\Rasxod;

class SettingController extends Controller
{
    //
    public function __construct() {
        $this->middleware('admin.auth');
        $this->projects = Project::paginate(15);
    }

    public function index(Request $request) {
        return view('setting.home', [
            'fa'        => 'fa-cog',
            'title'     => 'Setting',
            'projects'  => $this->projects
        ]);
    }

    // Add project
    public function addProject(Request $request) {
        if ($request->isMethod('post')) {
            $all_info = $request->all();

            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('setting');
            }

            try {
                $project        = new Project();
 
                $project->projects_name  = $request->name;
                
                $project->save();

                return redirect('setting')
                    ->with('message', 'Добавлено успешно!!');

            } catch (Exception $e) {
                // Back to form with errors
                return redirect('setting')
                    ->withErrors( $e->getErrors() );
            }
        }
    }

    // Delete zarplata
    public function deleteProject(Request $request) {
        if ($request->ajax()) {
            // get request ID
            $id_project = $request->id;
            if ($id_project) {
                // Search categories from database
                try {
                    $project = Project::find($id_project);
                    if ($project) {

                        $rasxods =  $project->rasxod;
                        if ($rasxods) {
                            foreach ($rasxods as $rasxod) {
                               foreach ($rasxod->photos as  $photo) {
                                    $path = public_path('images/rasxodi/'.$photo->photo_path);
                                    unlink($path);
                                }
                            }
                        }

                        $result  = $project->delete();
                        
                        if ($result) {
                            return response()->json(['success', $id_project]);
                        } else {
                            return response()->json('error');
                        }
                    } else {
                        return response()->json('error');
                    }
                } catch (Exception $e) {
                    return response()->json('error', $e);
                }
            }
        } else {
            return redirect('setting');
        }
    }

    // Edit project
    public function editProject(Request $request) {
        if ($request->isMethod('post')) {
            $all_info = $request->all();

            $validator = Validator::make($request->all(), [
                'project_id'   => 'required',
                'edit_name'     => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back();
            }

            try {
                $rasxod = Project::findorFail($request->project_id);

                $rasxod->projects_name           = $request->edit_name;

                $rasxod->update();

                return redirect()->back()->with('message', 'Отредактировано успешно!!');

            } catch (Exception $e) {
                // Back to form with errors
                return redirect()->back()->withErrors( $e->getErrors() );
            }
        } else {
            return redirect()->back();
        }
    }
}
