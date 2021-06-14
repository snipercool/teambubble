@extends('layouts.app')

@section('content')
@include('components.headerapp')
<div class="app-content">
    @include('components.sidebar')
    <script>
        document.querySelector('#home').classList.add('active');
    </script>
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Events</p>
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
                    <span class="status-number">{{count($events)}}</span>
                    <span class="status-type">{{__('app.total')}}</span>
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
            @if(count($events) > 0)
                @foreach($events as $event)
                    @include('components.event')
                @endforeach
            @else
                <div class="noprojects">
                    <img src="{{asset('images/nothing.svg')}}" alt="No projects">
                    <p>{{__('app.noevents')}}</p>
                </div>
                
            @endif
        </div>

    </div>
    <div class="messages-section">
        <button class="messages-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x-circle">
                <circle cx="12" cy="12" r="10" />
                <line x1="15" y1="9" x2="9" y2="15" />
                <line x1="9" y1="9" x2="15" y2="15" /></svg>
        </button>
        <div class="projects-section-header">
            <p>Client Messages</p>
        </div>
        <div class="messages">
            @include('components.message')
        </div>
    </div>
</div>
<script src="../js/messages.js"></script>
<script src="../js/projectview.js"></script>
@endsection
