@extends('layouts.main')

@section('title')
    Customer Register
@endsection

@section('content')
    <div class="customer-register-form">
        <div class="row">
            <form action="{{route('customer.create')}}" method="POST">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>First Name *</strong>
                            <input type="text" name="firstname" class="form-control" value="">
                            <span class="text-danger">@error('firstname'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <strong>Last Name *</strong>
                            <input type="text" name="lastname" class="form-control" value="">
                            <span class="text-danger">@error('lastname'){{$message}}@enderror</span>
                        </div>
                    </div>
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
                    <div class="form-group">
                        <div class="row">
                            <strong>Password Confirmation *</strong>
                            <input type="password" name="password_confirmation" class="form-control" value="">
                            <span class="text-danger">@error('password_confirm'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="row">
{{--                        TODO add recaptcha--}}
                        <button type="submit" class="btn-send-message">REGISTER</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Company</strong>
                            <input type="text" name="company" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Phone</strong>
                            <input type="text" name="phone" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Country</strong>
                            <input type="text" name="country" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>City</strong>
                            <input type="text" name="city" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Postcode</strong>
                            <input type="text" name="postcode" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Newsletter Subscribe</strong>
                            <select name="is_subscribed">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <strong>Address</strong>
                            <textarea name="address" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
