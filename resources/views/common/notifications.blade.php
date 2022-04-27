@if (session('success'))
    <div class="alert alert-success" role="alert" id="notification-message">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function(){
            $('#notification-message').slideUp();
        },2000);
    </script>
@endif

@if (session('errors'))
    <div class="alert alert-error" role="alert" id="notification-message">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    <script>
        setTimeout(function(){
            $('#notification-message').slideUp();
        },2000);
    </script>
@endif
