@extends('layouts.app')

@section('content')
@include('components.headerapp')
<div class="app-content">
    <div class="projects-section">
        <div class="projects-section-header">
            <p>{{__('app.invitation')}}</p>
        </div>
        <form class="user-form" action="" method="post">
            @csrf
            @include('components.input',[
            'label' => 'email',
            'type' => 'email',
            'labelname' => __('app.sendinvite'),
            'placeholder' => 'John.Doe@gmail.com',
            ])
            <button type="submit">{{__('auth.submit')}}</button>
        </form>
    </div>
</div>
@endsection