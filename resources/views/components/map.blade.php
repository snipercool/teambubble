<div class="project-box-wrapper">
    <div class="project-box" style="background-color: #AED6F1;">
        <div class="map-box-content-header">
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
                    @if(Auth::user()->id == $project->createdby)
                    <button><a href="/project/{{$project->id}}/map/{{$map->id}}">{{__('app.deleteproject')}}</a></button>
                    @endif
                </div>
            </div>
            <a href="/project/{{$project->id}}/map/{{$map->token}}">
                <p class="box-content-header">{{$map->name}}</p>
            </a>
        </div>
        <div class="project-box-footer">
            @php
                $files = App\models\File::where('map_id', '=', $map->id)->get();
            @endphp
            {{count($files)}} files
        </div>
    </div>
</div>
