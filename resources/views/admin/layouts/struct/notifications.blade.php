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
