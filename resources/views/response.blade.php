@extends('layouts.app')

@section('content')
@include('components.headerapp')
<div class="app-content">
    <div class="projects-section">
        <div class="projects-section-header">
            <p>{{__('app.invitationreceived')}} {{$user}} {{__('app.forproject')}} {{$project->name}}</p>
        </div>
        <div>
            <form action="/invitation/{{last(request()->segments())}}/accept" method="post">
            @csrf
            <button class="btn-response" type="submit">{{__('app.accept')}}</button>
            </form>
            <form action="/project/{{last(request()->segments())}}/decline" method="post">
            @csrf
            <button class="btn-response bg-red" type="submit">{{__('app.decline')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection