@extends('web_layouts.main')
@section('content')
    <div
        class="page-heading contact-heading header-text"
       
    >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>Ruling The Fashion Frontier</h4>
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="find-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Our Contact Information</h2>
                    </div>
                </div>
               
                <div class="col-md-4">
                    <div class="left-content">
                        <h4>About our office</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed
                            voluptate nihil eumester consectetur similiqu consectetur.<br/><br/>Lorem
                            ipsum dolor sit amet, consectetur adipisic elit. Et,
                            consequuntur, modi mollitia corporis ipsa voluptate corrupti.
                        </p>
                        <ul class="social-icons">
                            <li>
                                <a href="https://instagram.com/rebel_eg?igshid=NGVhN2U2NjQ0Yg=="><i class="fa fa-instagram"></i></a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('message'))
        <script>
            alert("Message received we will get back to you!");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            alert("Error sending message, please try again.");
        </script>
    @endif

    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Send us a Message</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <form id="contact" action=" {{ route('store-contact') }} " method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input
                                            name="name"
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="Full Name"
                                            required=""
                                        />
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input
                                            name="email"
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            placeholder="E-Mail Address"
                                            required=""
                                        />
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input
                                            name="subject"
                                            type="text"
                                            class="form-control"
                                            id="subject"
                                            placeholder="Subject"
                                            required=""
                                        />
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                      <textarea
                          name="message"
                          rows="6"
                          class="form-control"
                          id="message"
                          placeholder="Your Message"
                          required=""
                      ></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button
                                            type="submit"
                                            id="form-submit"
                                            class="filled-button"
                                        >
                                            Send Message
                                        </button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
