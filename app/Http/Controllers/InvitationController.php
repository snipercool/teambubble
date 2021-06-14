<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Project;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index()
    {   
        return view('invitation');
    }

    public function sendInvite($id)
    {
        if (Invitation::where('project_id', '=', (int)$id)->where('sendto', '=', request('email'))->exists()) {
            return redirect('/')->with('mailAlreadySend', 'Error');
         }
        else{
        $invitation = Invitation::create([
            'sendby' => Auth::user()->id,
            'project_id' => (int)$id,
            'sendto' => request('email'),
            'token' => Str::random(32),
        ]);
        $to_adress = request('email');
        $data=array("name"=>Auth::user()->name, "body" => url('/').'/invitation/'.$invitation->token);
        Mail::send('mail', $data, function($message) use ($to_adress){
            $message->to($to_adress)
            ->subject('Invitation TeamBubble project from'. Auth::user()->name);
        });
        return redirect('/')->with('mailSuccess', 'Sucess');
    }
    }
    public function invitationresponse ($token)
    {
        $invitation = Invitation::where('token', $token)->first();
        $project = Project::find($invitation->project_id);
        $user = User::where('id', $invitation->sendby)->first()->name;
        return view('response')->with('invitation', $invitation)->with('project', $project)->with('user', $user);
    
    }

    public function acceptInvitation($token)
    {
        $invitation = Invitation::where('token', $token)->first();
        Invitation::where('token', $token)->update([
            'status'    => 'accepted'
        ]);
        $user = Auth::user();
        $team = new Team;
        $team->user_id      = $user->id;
        $team->project_id   = $invitation->project_id;
        $team->save();

        return redirect('/');

    }

    public function declineInvitation($token)
    {
        $invitation = Invitation::where('token', $token)->first();
        Invitation::where('token', $token)->update([
            'status'    => 'declined'
        ]);
    }
}
