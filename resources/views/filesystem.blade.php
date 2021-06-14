@extends('layouts.app')

@section('content')
@include('components.headerapp')
<div class="app-content">
    @include('components.sidebar')
    <script>
        document.querySelector('#drive').classList.add('active');
    </script>
    <div class="projects-section">
    <div class="model">
            <div class="model__content">
                <div class="close_btn" onclick="$('.model').toggleClass('model--show')">X</div>
                <h3 class="model__title">{{__('app.createmap')}}</h3>
                <form action="{{Request::url()}}/create" method="post">
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
            </div>
        </div>
        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <button class="btn btn-primary" onclick="$('.model').toggleClass('model--show')">{{__('app.createmap')}}</button>
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
            @if(count($maps) > 0)
                @foreach($maps as $map)
                    @include('components.map')
                @endforeach
            @else
                <div class="noprojects">
                    <img src="{{asset('images/nothing.svg')}}" alt="No projects">
                    <p>{{__('app.noevents')}}</p>
                </div>
                
            @endif
        </div>
    </div>
    <script src="../../js/projectview.js"></script>
</div>
@endsection
