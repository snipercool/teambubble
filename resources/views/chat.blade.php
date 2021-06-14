@extends('layouts.app')

@section('content')
@include('components.headerapp')
<div class="app-content">
    @include('components.sidebar')
    <script>
        document.querySelector('#chat').classList.add('active');
    </script>
    <div class="projects-section">
    <div id="group-model" class="model">
            <div class="model__content">
                <div class="close_btn" onclick="$('#group-model').removeClass('model--show')">X</div>
                <h3 class="model__title">Create Group</h3>
                <form action="{{Request::url()}}/creategroup" method="post">
                    @csrf
                    <div class="form-group form-name">
                    <label for="name">{{ __('auth.name') }}</label>
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" autocomplete="name" autofocus
                        placeholder="{{ __('auth.name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group form-submit">
                <button type="submit" class="btn btn-primary">
                    {{ __('auth.submit') }}
                </button>
                </div>
                </form>
                <button class="btn btn--close">Delete event</button>
            </div>
        </div>
        <div class="chat-box">
            <div class="message btn-primary">
                <p><img src="{{Auth::user()->avatar}}" alt="avatar">Nicolas</p>
                <p>Hey</p>
            </div>

            <div class="message">
            <p><img src="{{asset('images/uploads/default.svg')}}" alt="avatar">Lars</p>
                <p>Hey!!!</p>
            </div>
        </div>
        <form action="#" autocomplete="off" class="chat-input">
            <input type="text" name="chatfield" id="chatfield">
            <button type="submit">Verzenden</button>
        </form>
        <script>
            const form = document.querySelector('.chat-input');
            inputField = form.querySelector("#chatfield");
            sendBtn = form.querySelector('button');
          
            sendBtn.onclick = () => {
                let _token   = $('meta[name="csrf-token"]').attr('content');
                var SITEURL = "{{Request::url()}}";
                $.ajax({
                    url: SITEURL+"/deleteevent",
                    type:"POST",
                    data:{
                    id:$id,
                    _token: _token
                    },
                    success:function(response){
                        location.reload();
                    },
                });
            }
        </script>
    </div>
    <div class="messages-section">
        <div>
        <button class="add-btn" onclick="$('#group-model').addClass('model--show')" title="Add New Group">
            <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" /></svg>
        </button>
        <p>Create Group</p></div>

        @foreach ($groups as $group)
            <div class="group group-{{$group->id}}">
                <b>{{$group->name}}</b>
            </div>
        @endforeach
    </div>
</div>
@endsection
