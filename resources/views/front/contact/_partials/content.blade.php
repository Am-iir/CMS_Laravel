<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-5">
                <div class="contact_form">

                    <form name="sentMessage" id="contactForm" method="POST" action="/contact/sendMessage">
                        {{--                    <div class="success">--}}
                        {{--                    </div>--}}
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
            <div class="col-md-5">

                <div class="p-4 mb-3 bg-white">
                    {!! $page->content['description'] !!}
                </div>

            </div>
        </div>
    </div>
</div>
