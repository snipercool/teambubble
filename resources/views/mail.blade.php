<body style="margin: 0; padding:0; font-family: sans-serif;">
<div style="width: 100%; height:100%; padding:31px; margin:0; background-color:#007adf; color: white;">
    <img src="{{asset('images/logo.svg')}}" alt="Teambubble" height="75px">
    <h1>You have received an invitation from {{$name}}.</h1>

    <p>Follow this link to access the project:</p>
    <a style="font-weight: bold; color:white; text-decoration:none;" href="{{$body}}" target="_blank" rel="noopener noreferrer">{{$body}}</a>
</div>

</body>
