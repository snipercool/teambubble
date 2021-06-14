<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $teams = Project::select('projects.*')
                    ->join('teams', function($join) use ($user){
                        $join->on('projects.id', '=', 'teams.project_id')
                        ->where('teams.user_id', '=', $user->id);
                    })
                    ->get();
        $proj = Project::where('createdby', '=', $user->id)->get();
        $projects = $teams->merge($proj);
        $sorted = $projects->sortByDesc('endday')->sortBy('done');

        $progress = $projects->where('done', "=", 0);
        
        return view('home')->with('projects', $sorted)->with('progress', $progress);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function landing()
    {
        return view('welcome');
    }

    public function remainingdays($project){
        if ($project->endday) {
            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($project->endday));
        } else {
            $remaining_days = 0;
        }
        return $remaining_days;
    }

}
