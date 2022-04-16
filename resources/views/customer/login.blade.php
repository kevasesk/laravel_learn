@extends('layouts.main')

@section('title')
    Customer Login
@endsection

@section('content')
    <div class="customer-register-form">
        <div class="row">
            <form action="{{route('customer.auth')}}" method="POST">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Email *</strong>
                            <input type="text" name="email" class="form-control" value="">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <strong>Password *</strong>
                            <input type="password" name="password" class="form-control" value="">
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                    </div>
                    @recaptcha
                    <div class="row">
                        <button type="submit" class="btn-send-message">LOG IN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
