@extends('layouts.app')

@section('content')
@include('components.headerapp')
<div class="app-content">
    <div class="user-section">
        <div class="user-section-header">
            <p>Account</p>
        </div>
        <div class="user-section-line">
            <span class="status-number"><img src="{{$user->avatar}}" alt="avatar"></span>
            <span class="status-type">{{$user->name}}</span>
        </div>
        <form class="user-form" action="/update" method="post" enctype="multipart/form-data">
            @csrf
            @include('components.input',[
            'label' => 'name',
            'type' => 'text',
            'labelname' => __('auth.name'),
            'placeholder' => $user->name,
            ])
            @include('components.input',[
            'label' => 'email',
            'type' => 'email',
            'labelname' => __('auth.email'),
            'placeholder' => $user->email,
            ])
            @include('components.input',[
            'label' => 'avatar',
            'type' => 'file',
            'labelname' => 'avatar',
            'placeholder' => '',
            ])
            @include('components.input',[
            'label' => 'password',
            'type' => 'password',
            'labelname' => __('auth.password'),
            'placeholder' => '*******',
            ])
            @include('components.input',[
            'label' => 'password-confirm',
            'type' => 'password',
            'labelname' => __('auth.password-confirm'),
            'placeholder' => '*******',
            ])
            <button type="submit">{{__('auth.submit')}}</button>
        </form>
    </div>
</div>
@endsection
