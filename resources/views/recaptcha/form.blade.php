@extends('layouts.main')

@section('content')
<div class="container" style="padding: 20px;">
    <form action="{{ route('recaptcha.sended') }}" method="POST" class="form" id="google-form">
        @csrf
        <div class="form-group">
            <label for="param">Param:</label>
            <input type="text" name="param" id="param" class="form-control"/>
        </div>
        <div id="g-recaptcha" class="g-recaptcha" data-sitekey="6Ld1WDsfAAAAAB7DFDKnVoex6tE3O-k_qjjbb5fq"></div>
        <div id="html_element"></div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        var GoogleRe = function (){
            //var captcha = document.getElementById('html_element');
            //console.log(111);//eugenesm
            // grecaptcha.render('html_element', {
            //     'sitekey' : '6Ld1WDsfAAAAAB7DFDKnVoex6tE3O-k_qjjbb5fq'
            // });
        }
    </script>
@endsection
