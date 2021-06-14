<?php

namespace App\Http\Controllers;

use App\Models\Chat_groups;
use App\Models\Eventassigns;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Events;
use App\Models\File;
use App\Models\Projectmap;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    public function index($id)
    {   
        $events = Events::where('project_id', '=' , $id)
        ->get();
        $inprogress = Events::where('project_id', '=' , $id)->where('done', '=', 0)
        ->get();
        $project = Project::find($id);
        return view('project')->with('project', $project)->with('events', $events)->with('progress', $inprogress);
        
    }

    //project

    public function addProject(Request $request)
    {
        $user = Auth::user();
        $project = new Project;
        $project->name      = $request->input('name');
        $project->endday    = $request->input('enddate');
        $project->createdby = $user->id;
        $project->save();

        $groupChat = new Chat_groups;
        $groupChat-> name = "Algemeen";
        $groupChat->project_id = $project->id;
        $groupChat-> token = Str::random(5);
        $groupChat->save();

        return redirect()->back()->with('projectSuccess', 'Sucess');
        
    }

    public function deleteProject($id)
    {
        $user = Auth::user();
        $project = Project::find($id);
        if ($user->id == $project->createdby) {
            $project->delete();
            return redirect()->back()->with('DeleteSuccess', 'success');
        }
        else{
            return redirect()->back()->with('DeleteError', 'error');
        }
    }

    public function markDone($id)
    {
        Project::where('id', '=', $id)->update(['done'=>1]);
        
        return redirect()->back()->with('DeleteSuccess', 'success');
    }

    public function markNotDone($id)
    {
        Project::where('id', '=', $id)->update(['done'=>0]);
        
        return redirect()->back()->with('DeleteSuccess', 'success');
    }

    //calendar

    public function calendar(Request $request, $id)
    {   
    	$events = Events::where('project_id', '=' , $id)
            ->get();
        $project = Project::find($id);
        $projusers = User::select('users.id','users.name','users.avatar')
                    ->join('projects', function($join) use ($id){
                        $join->on('projects.createdby', '=', 'users.id')
                        ->where('projects.id', '=', $id);
                    })
                    ->get();
                
        $teamusers = User::select('users.id','users.name','users.avatar')
                    ->join('teams', function($join) use ($id){
                        $join->on('users.id', '=', 'teams.user_id')
                        ->where('teams.project_id', '=', $id);
                    })
                    ->get();
        $users = $projusers->merge($teamusers);


        return view('calendar')->with('project', $project)->with('users', $users)->with('events', $events);
        
    }

    public function AddEvent(Request $request, $id)
    {
        $event = new Events;
        $event->title     = $request->input('name');
        $event->start     = $request->input('startdate');
        $event->end       = $request->input('enddate');
        $event->project_id= $id;
        $event->save();

        foreach (array($request->input('assignees')) as $assign) {
            $assignee = new Eventassigns;
            $assignee->user_id = $assign;
            $assignee->event_id = $event->id;
            $assignee->save();

        }

        return redirect()->back()->with('eventSuccess', 'Sucess');
    }

    public function deleteevent(Request $request, $id)
    {
        Eventassigns::where('event_id', "=", $request->id)->delete();
        Events::destroy($request->id);
        

    }

    public function updateevent(Request $request, $id)
    {
        if ($request->name != null or $request->name != "") {
            Events::where('id', '=',$request->id)->update(['title' => $request->name]);
        }
        elseif ($request->startdate != null ) {
            Events::where('id', '=',$request->id)->update(['start' => $request->startdate]);
        }
        elseif ($request->enddate != null ) {
            Events::where('id', '=',$request->id)->update(['end' => $request->enddate]);
        }
        elseif ($request->done != null ) {
            if ($request->done == 'on') {
                Events::where('id', '=',$request->id)->update(['done' => 1]);
            }
        }
        
        return redirect()->back()->with('eventSuccess', 'Sucess');

    }

    //chat

    public function chat(Request $request, $id)
    {   
        $project = Project::find($id);
        $projusers = User::select('users.id','users.name','users.avatar')
                    ->join('projects', function($join) use ($id){
                        $join->on('projects.createdby', '=', 'users.id')
                        ->where('projects.id', '=', $id);
                    })
                    ->get();
                
        $teamusers = User::select('users.id','users.name','users.avatar')
                    ->join('teams', function($join) use ($id){
                        $join->on('users.id', '=', 'teams.user_id')
                        ->where('teams.project_id', '=', $id);
                    })
                    ->get();
        $users = $projusers->merge($teamusers);

        $groups = Chat_groups::where('project_id', '=', $id)->get();

        $general = Chat_groups::where('project_id', '=', $id)->first();



        return view('chat')->with('project', $project)->with('users', $users)->with('groups', $groups);
        
    }

    public function createGroupChat(Request $request, $id)
    {
        $group = new Chat_groups;
        $group->name      = $request->input('name');
        $group->token     = Str::random(5);;
        $group->project_id= $id;
        $group->save();

        Schema::connection('mysql')->create('chat_'.$group->token, function($table)
        {
            $table->increments('id');
            $table->string('body');
            $table->unsignedBigInteger('sendby');
            $table->unsignedBigInteger('group_id');
            $table->timestamps();

            $table->foreign('sendby')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('chat_groups');
        });
    }

    public function groupchat($token, $id)
    {
        $project = Project::find($id);
        $projusers = User::select('users.id','users.name','users.avatar')
                    ->join('projects', function($join) use ($id){
                        $join->on('projects.createdby', '=', 'users.id')
                        ->where('projects.id', '=', $id);
                    })
                    ->get();
                
        $teamusers = User::select('users.id','users.name','users.avatar')
                    ->join('teams', function($join) use ($id){
                        $join->on('users.id', '=', 'teams.user_id')
                        ->where('teams.project_id', '=', $id);
                    })
                    ->get();
        $users = $projusers->merge($teamusers);

        $groups = Chat_groups::where('project_id', '=', $id)->get();

        $active_group = Chat_groups::where('project_id', '=', $id)->where('token', "=", $token)->get();



        return view('chat')->with('project', $project)->with('users', $users)->with('groups', $groups);
        
    }

    //drive

    public function drive(Request $request, $id)
    {   
        $project = Project::find($id);

        $maps = Projectmap::where('project_id', '=', $id)->get();

        return view('filesystem')->with('project', $project)->with('maps', $maps);
        
    }

    public function createmap(Request $request, $id)
    {   
        $map = new Projectmap;
        $map->name      = $request->input('name');
        $map->token     = Str::random(32);
        $map->project_id= $id;
        $map->save();
        

        return redirect()->back()->with('eventSuccess', 'Sucess');
        
    }

    public function deletemap(Request $request,$id, $map_id)
    {   
        Projectmap::destroy($map_id);      

        return redirect()->back()->with('eventSuccess', 'Sucess');
        
    }

    public function gotomap($id, $token)
    {   
        $map = Projectmap::where('token', '=', $token)->get();
        $files = File::where('map_id', '=', $map[0]->id)->get(); 
        $project = Project::find($id);       

        return view('filemap')->with('files', $files)->with('project', $project);
        
    }

    function Fileupload(Request $request, $id, $token)
    {
        $image = $request->file('file');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('files/'.$image->getClientOriginalExtension().'/'), $imageName);

        $map = Projectmap::where('token', '=', $token)->get();
        try{
        $file = new File;
        $file->name      = $imageName;
        $file->path      = 'files/'.$image->getClientOriginalExtension().'/'.$imageName;
        $file->map_id    = $map[0]->id;
        $file->save();
        }
        catch(\Exception $e){
            dd($e);
        }

     return response()->json(['success' => $imageName]);
    }

    function Filesfetch($id, $token)
    {
     $map = Projectmap::where('token', '=', $token)->get();
     $files = File::where('map_id','=', $map[0]->id)->get();
     return response()->json($files);
    }

    function Filedelete(Request $request)
    {
     if($request->get('name'))
     {
      File::delete(public_path('images/' . $request->get('name')));

      File::destroy($request->get('name'));
     }
    }
}
