<div class="project-box-wrapper" style="@if($event->done == 1)opacity:0.5;@endif">
    <div class="project-box" style="background-color: #AED6F1;">
        <div class="project-box-header">
            <span>Start: {{$event->start}}</span>
        </div>
        <div class="project-box-content-header event-header">
            <span>End: {{$event->end}}</span>
        </div>
        <div class="box-progress-wrapper">
            <p class="box-content-header event-title">{{$event->title}}</p>
        </div>
        <div class="project-box-footer">
            <div class="days-left" style="color: #007adf;">
            @php
                    $d1 = strtotime($event->end);
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
