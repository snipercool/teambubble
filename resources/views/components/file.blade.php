<div class="project-box-wrapper">
    <div class="project-box" style="background-color: #AED6F1;">
        <div class="project-box-content-header">
                <p class="box-content-header">{{$file->name}}</p>
        </div>
        <div class="project-box-footer">
           <a href="{{asset($file->path)}}" download="{{$file->name}}">Download</a>
        </div>
    </div>
</div>
