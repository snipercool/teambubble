@if(session('{{$sessionMessage}}'))
    <div class="alert {{$alert-type}}">
        <div onclick="this.parentElement.style.display = 'none';" class="alert-closebtn">X</div>
        {{$message}}
    </div>
@endif

<!-- @if(session('mailSuccess'))
    <div class="alert alert-success">
        <div onclick="this.parentElement.style.display = 'none';" class="alert-closebtn">X</div>
        {{__('app.mailSuccess')}}
    </div>
@endif

@if(session('updateSuccess'))
    <div class="alert alert-success">
        <div onclick="this.parentElement.style.display = 'none';" class="alert-closebtn">X</div>
        {{__('app.updateSuccess')}}
    </div>
@endif

@if(session('DeleteSuccess'))
    <div class="alert alert-success">
        <div onclick="this.parentElement.style.display = 'none';" class="alert-closebtn">X</div>
        {{__('app.DeleteSuccess')}}
    </div>
@endif

@if(session('Error'))
    <div class="alert alert-danger">
        <div onclick="this.parentElement.style.display = 'none';" class="alert-closebtn">X</div>
        {{__('app.error')}}
    </div>
@endif -->