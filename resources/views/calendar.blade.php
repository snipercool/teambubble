@extends('layouts.app')

@section('content')
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
@include('components.headerapp')
<div class="app-content">
    @include('components.sidebar')
    <script>
        document.querySelector('#cal').classList.add('active');
    </script>
    <div class="projects-section">
        @foreach ($events as $event)
        <div id="{{$event->id}}" class="model">
            <div class="model__content">
                <div class="close_btn" onclick="$('#{{$event->id}}').toggleClass('model--show')">X</div>
                <h3 class="model__title">{{$event->title}}</h3>
                <form action="{{Request::url()}}/updateevent" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$event->id}}">
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
                    <div class="form-group form-startdate">
                    <label for="startdate">{{ __('auth.startdate') }}</label>
                    <input id="startdate" type="datetime-local" class="@error('startdate') is-invalid @enderror" name="startdate"
                        value="{{ old('startdate') }}" autocomplete="startdate" autofocus
                        placeholder="{{ __('auth.startdate') }}">
                    @error('startdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group form-enddate">
                    <label for="enddate">{{ __('auth.enddate') }}</label>
                    <input id="enddate" type="datetime-local" class="@error('enddate') is-invalid @enderror" name="enddate"
                        value="{{ old('enddate') }}" autocomplete="enddate" autofocus
                        placeholder="{{ __('auth.enddate') }}">
                    @error('enddate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    
                    @enderror
                </div>
                <div class="form-group form-assignees">
                    <label for="assignees">{{ __('auth.assignees') }}</label>
                    <select name="assignees" id="assignees"  multiple>
                        @foreach ($users as $usr)
                        <option value="{{$usr->id}}" style="background-image:'{{$usr->avatar}}'; background-size: 'contain';">{{$usr->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-enddate">
                    <label for="done">{{ __('auth.done') }}</label>
                    <input type="checkbox" name="done" id="done">
                </div>

                <div class="form-group form-submit">
                <button type="submit" class="btn btn-primary">
                    {{ __('auth.submit') }}
                </button>
                </div>
                </form>
                <button onclick="deleteevent({{$event->id}})" class="btn btn--close">Delete event</button>
            </div>
        </div>
        @endforeach
       
        <div id="calendar"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var SITEURL = "{{Request::url()}}";
                var eventsarray = {!! $events !!};

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'en',
                    themeSystem: 'bootstrap',
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        start: 'prev,next today',
                        center: 'title',
                        end: 'dayGridMonth,timeGridSevenDay,listWeek'
                    },
                    height: 800,
                    events: eventsarray,
                    editable: true,
                    eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                    event.allDay = true;
                    } else {
                    event.allDay = false;
                    }
                    },
                    views: {
                        timeGridSevenDay: {
                            type: 'timeGrid',
                            duration: {
                                days: 7
                            },
                            buttonText: 'week'
                        }
                    },
                    eventClick: async function(event) {
                        event.jsEvent.preventDefault(); // don't let the browser navigate
                        console.log(event.event.id);
                        $('#'+event.event.id).toggleClass('model--show');
                    }
                });
                calendar.setOption('locale', 'nl');
                calendar.render();
                
            });

            function deleteevent($id){
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
        <div class="projects-section-header">
            <p>{{__('app.tasks')}}</p>
        </div>
        <div class="messages">
            <form action="{{Request::url()}}/addevent" method="post">
                @csrf
                <div class="form-group form-name">
                    <label for="name">{{ __('auth.name') }}</label>
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="{{ __('auth.name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group form-startdate">
                    <label for="startdate">{{ __('auth.startdate') }}</label>
                    <input id="startdate" type="datetime-local" class="@error('startdate') is-invalid @enderror" name="startdate"
                        value="{{ old('startdate') }}" required autocomplete="startdate" autofocus
                        placeholder="{{ __('auth.startdate') }}">
                    @error('startdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="hidden" name="type" id="type" value="add">
                </div>
                <div class="form-group form-enddate">
                    <label for="enddate">{{ __('auth.enddate') }}</label>
                    <input id="enddate" type="datetime-local" class="@error('enddate') is-invalid @enderror" name="enddate"
                        value="{{ old('enddate') }}" required autocomplete="enddate" autofocus
                        placeholder="{{ __('auth.enddate') }}">
                    @error('enddate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    
                    @enderror
                </div>
                <div class="form-group form-assignees">
                    <label for="assignees">{{ __('auth.assignees') }}</label>
                    <select name="assignees" id="assignees"  multiple>
                        @foreach ($users as $usr)
                        <option value="{{$usr->id}}" style="background-image:'{{$usr->avatar}}'; background-size: 'contain';">{{$usr->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-submit">
                <button type="submit" class="btn btn-primary">
                    {{ __('auth.submit') }}
                </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
