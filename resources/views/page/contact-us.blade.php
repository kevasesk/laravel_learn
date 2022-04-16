@extends('layouts.main')

@isset($page['title'])
    @section('title')
        {{ $page['title'] }}
    @endsection
@endisset

@section('content')
    <div class="contact-info-heading">
        <div class="row">
            <div class="col-md-4 contact-column-inner">
                <div class="contact-box">
                    <div class="contact-box-icon"><i class="ion-ios-location icon-contact"></i></div>
                    <div class="contact-box-information">
                        One World Trade Center Suite 8500 New York, NY 1006, United State of America
                    </div>
                </div>
            </div>
            <div class="col-md-4 contact-column-inner">
                <div class="contact-box">
                    <div class="contact-box-icon"><i class="ion-ios-telephone icon-contact"></i></div>
                    <div class="contact-box-information">
                        (800) 8001-8588 | (800) 8001-9669
                    </div>
                </div>
            </div>
            <div class="col-md-4 contact-column-inner">
                <div class="contact-box">
                    <div class="contact-box-icon"><i class="ion-email icon-contact"></i></div>
                    <div class="contact-box-information">
                        shoppee@support.com
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-info-content">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('contact-us/send')}}" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <strong>Name *</strong>
                                <input type="text" name="fullname" class="form-control" value="">
                                <span class="text-danger">@error('fullname'){{$message}}@enderror</span>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Email *</strong>
                                <input type="text" name="email" class="form-control" value="">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <strong>Phone Number *</strong>
                                <input type="text" name="phone" class="form-control" value="">
                                <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Subject</strong>
                                <input type="text" name="subject" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Your Message *</strong>
                                <textarea name="message" id="message" tabindex="2" class="form-control"></textarea>
                                <span class="text-danger">@error('message'){{$message}}@enderror</span>
                            </div>
                        </div>
                    </div>
                    @recaptcha
                    <button type="submit" class="btn-send-message">SEND MESSAGE</button>
                </form>
            </div>
{{--            TODO google maps--}}
            <div class="col-md-6">
                <div id="googlemap1" style="height: 370px;"></div>
            </div>
        </div>
    </div>
@endsection


