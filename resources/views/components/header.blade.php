<div class="app-header">
    <div class="app-header-left">
        <a href="/">
            <div class="app-icon"></div>
            <p class="app-name">TeamBubble</p>
        </a>
    </div>
    <div class="app-header-right">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
        </li>
        @endif
        @else
        <button class="add-btn"  onclick="document.getElementById('modal').classList.add('open');" title="Add New Project">
            <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" /></svg>
        </button>
        <button class="notification-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-bell">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
        </button>
        <button class="logout-btn">
            <a href="{{ route('logout') }}">
                <svg width="24" height="24" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z">
                    </path>
                </svg>
            </a>
        </button>
        <a href="/user/{{Auth::user()->id}}" class="profile-btn">
            <img src="@if(str_contains(Auth::user()->avatar, 'https://')) {{Auth::user()->avatar}} @else public/storage/{{Auth::user()->avatar}} @endif" width="32" height="32" />
            <span>{{ Auth::user()->name }}</span>
        </a>
        @endguest
    </div>
    <div class="modal-section" id="modal">
        <div class="modal-content">
            <button class="modal-close"  onclick="document.getElementById('modal').classList.remove('open');">&times;</button>
            <form name="addProjectForm" action="{{ route('addproject')}}" method="post"
                onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <label for="name">{{__('app.projectname')}}</label>
                    <input type="text" name="name" id="project-name">
                    <div id="name-error" class="alert alert-error">{{__('app.projectnamefill')}}</div>
                </div>
                <div class="form-group">
                    <label for="enddate">{{__('app.enddate')}}</label>
                    <input type="date" name="enddate" id="project-enddate">
                    <div id="date-error" class="alert alert-error">{{__('app.projectdatefill')}}</div>
                    <div id="date-past-error" class="alert alert-error">{{__('app.projectdatepast')}}</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary modal-submit">
                        {{ __('app.addproject') }}
                    </button>
                </div>
            </form>
            <script>
                function validateForm() {
                    var today = new Date();
                    var projectname = document.forms['addProjectForm']['name'].value;
                    var input = document.forms['addProjectForm']['enddate'].value;
                    var projectdate = new Date(input);

                    if (projectname == "") {
                        var x = document.querySelectorAll('.alert');
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        document.querySelector('#name-error').style.display = "block";
                        console.log('error');
                        return false;
                    }
                    if (input == "") {
                        var x = document.querySelectorAll('.alert');
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        document.querySelector('#date-error').style.display = "block";
                        return false;
                    }

                    if (projectname != "" && input != "") {
                        var x = document.querySelectorAll('.alert');
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        if (projectdate.setHours(0,0,0,0) <= today.setHours(0,0,0,0)) {
                            document.querySelector('#date-past-error').style.display = "block";
                            return false; 
                        }
                    }
                }

            </script>
        </div>
    </div>
</div>
