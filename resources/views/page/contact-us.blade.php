@extends('layouts.main')

@isset($page['title'])
    @section('title')
        {{ $page['title'] }}
    @endsection
@endisset

@section('content')
    <section class="contact-us">
        <div class="container">
            <div class="heading-sub">
                <h3 class="pull-left">contact</h3>
                <ul class="other-link-sub pull-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#pages">Pages</a></li>
                    <li><a class="active" href="#aboutus">About Us</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
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
                            <button type="submit" class="btn-send-message">SEND MESSAGE</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div id="googlemap1" style="height: 370px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


