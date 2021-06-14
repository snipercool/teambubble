<div class="project-box-wrapper" style="@if($project->done == 1)opacity:0.5;@endif">
    <div class="project-box" style="background-color: #AED6F1;">
        <div class="project-box-header">
            <span>{{$project->endday}}</span>
            <div class="more-wrapper">
                <button class="project-btn-more">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-more-vertical">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="12" cy="5" r="1" />
                        <circle cx="12" cy="19" r="1" /></svg>
                </button>
                <div class="more-wrapper-content">
                    <button><a href="/project/{{$project->id}}">{{__('app.goproject')}}</a></button>
                    @if($project->done == 0)
                    <button><a href="/project/markdone/{{$project->id}}">{{__('app.markdone')}}</a></button>
                    @else
                    <button><a href="/project/marknotdone/{{$project->id}}">{{__('app.marknotdone')}}</a></button>
                    @endif
                    @if(Auth::user()->id == $project->createdby)
                    <button><a href="/project/delete/{{$project->id}}">{{__('app.deleteproject')}}</a></button>
                    @endif
                </div>
            </div>
        </div>
        <div class="project-box-content-header">
            <a href="/project/{{$project->id}}">
                <p class="box-content-header">{{$project->name}}</p>
            </a>
        </div>
        @php
        $percent = 0
        @endphp
        @if (count($progress) != 0)
        @php
        $percent = count($progress) / count($events) * 100;
        @endphp
        @endif
        <div class="box-progress-wrapper">
            <p class="box-progress-header">Progress</p>
            <div class="box-progress-bar">
                <span class="box-progress" style="width: {{$percent}}%; background-color: #007adf"></span>
            </div>
            <p class="box-progress-percentage">{{$percent}}%</p>
        </div>
        <div class="project-box-footer">
            <div class="participants">
                <img src="{{$createduser[0]->avatar}}"
                    alt="participant">
                @foreach ($team as $person)
                <img src="{{$person->avatar}}"
                    alt="participant">
                @endforeach
                <a href="{{$project->id}}/invitation" class="add-participant" style="color: #007adf;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                </a>
            </div>
            <div class="days-left" style="color: #007adf;">
                @php
                    $d1 = strtotime($project->endday);
                    $d2=ceil(($d1-time())/60/60/24);
                @endphp
                @if ($d2 <= 0)
                    {{__('app.overdate')}}
                @else
                    {{$d2}} {{__('app.daysleft')}}
                @endif
            </div>
        </div>
    </div>
</div>
