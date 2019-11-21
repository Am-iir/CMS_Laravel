@extends('layouts.frontend')
@section('content')
    <header class="masthead" style="background-image: url({{asset('img/contact-bg.jpg')}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1> {!! $page->content['title'] !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! $page->content['description'] !!}
                <div class="contact_form">

                <form name="sentMessage" id="contactForm" method="POST" action="/contact/sendMessage">
                    {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control @errorClass('name')" placeholder="Name" name="name"  id="name">
                           <span class="error"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control @errorClass('email')" placeholder="Email Address" id="email" name="email" >
                            <span class="error"> </span>

                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control @errorClass('content')" placeholder="Message" name="content"  id="content"></textarea>
                            <span class="error"> </span>

                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
