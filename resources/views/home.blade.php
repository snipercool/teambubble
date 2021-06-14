@extends('layouts.app')

@section('content')
@include('components.header')
<div class="app-content">
    @include('components.alerts',[
        'sessionMessage' => 'mailAlreadySend',
        'alert-type'=>'error',
        'massage'=> __('app.mailalreadysend'),
        ])
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Projects</p>
            <p class="time">{{ date('F d') }}</p>
            <p class="time-mobile">{{ date('M d') }}</p>
        </div>
        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">{{count($progress)}}</span>
                    <span class="status-type">In Progress</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{count($projects)}}</span>
                    <span class="status-type">Total Projects</span>
                </div>
            </div>
            <div class="view-actions">
                <button class="view-btn list-view" title="List View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
                </button>
                <button class="view-btn grid-view active" title="Grid View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" /></svg>
                </button>
            </div>
        </div>
        <div class="project-boxes jsGridView">
            @if(count($projects) > 0)
                @foreach($projects as $project)
                     @php
                     $events = App\models\Events::where('project_id', '=', $project->id)->get();
                     $progress = App\models\Events::where('project_id', '=', $project->id)->where('done', '=', 1)->get();
                     $createduser = App\models\User::select('users.avatar')->join('projects', function($join) use ($project){$join->on('users.id', '=', 'projects.createdby')->where('users.id', '=', $project->createdby);})->get();
                     $team = App\models\User::select('users.avatar')->join('teams', function($join) use ($project){$join->on('users.id', '=', 'teams.user_id')->where('teams.project_id', '=', $project->id);})->take(2)->get();
                     @endphp
                    @include('components.project', [$events])
                @endforeach
            @else
                <div class="noprojects">
                    <img src="{{asset('images/nothing.svg')}}" alt="No projects">
                    <p>{{__('app.noprojects')}}</p>
                </div>
                
            @endif
        </div>
    </div>
</div>
<script src="../js/projectview.js"></script>

@endsection
