
@extends('layouts.app')

@section('content')
    <div class="section1-contact">
        <div class="section1-contact-content">
            <h5>GET IN TOUCH</h5>
            <h1>Contact Us</h1>
        </div>
    </div>
    <div class="section2-contact">
        <div class="section2-contact-content">
            <div class="section2-contact-content-left">
                <h3>The Cappa Luxury Hotel</h3>
                <p>Hotel ut nisl quam nestibulum ac quam nec odio elementum sceisue the aucan ligula. Orci varius natoque penatibus et magnis dis parturient monte nascete ridiculus mus nellentesque habitant morbine.</p>
                <div class="section2-contact-content-left-icon">
                    <i class="fa-solid fa-phone"></i>
                    <div class="">
                        <p>Reservation</p>
                        <p style="color: #8e6d45; font-size:27px;">855 100 4444</p>
                    </div>
                </div>
                <div class="section2-contact-content-left-icon">
                    <i class="fa-regular fa-envelope"></i>
                    <div class="">
                        <p>Email info</p>
                        <p style="color: #8e6d45; font-size:27px;">info@luxuryhotel.com</p>
                    </div>
                </div>
                <div class="section2-contact-content-left-icon">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="" style="margin-left: 10px;">
                        <p>Address</p>
                        <p>1616 Broadway NY, New York 10001
                        United States of America</p>
                    </div>
                </div>  
            </div>
            <div class="section2-contact-content-right">
                <h3>Get in touch</h3>
                <input type="text" placeholder="Your Name*">
                <input type="text" placeholder="Your Email*">
                <input type="text" placeholder="Your Number*">
                <input type="text" placeholder="Subject*">
                <textarea name="" id="" placeholder="Message*"></textarea>
                <button>SEND MESSAGE</button>
            </div>
        </div>

        <div class="googlemap">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.7241581619446!2d105.72611311533117!3d21.045194292616267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453447a364d0b%3A0x74a1f9e8d8508db4!2zVGjhuqFjIFPGsOG7nW5nIEvhu7Mgbmjhuq10IEjhu41jIFRo4buDIGzhuqFpIEPDtG5nIG5naGnhu4djaCBQSEVOSUtBQQ!5e0!3m2!1sen!2s!4v1623852553155!5m2!1sen!2s" 
            width="600" 
            height="450" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
        </div>
    </div>
    <div class="restaurant-message">
            <div class="restaurant-message-container">
                <h6>TESTIMONIALS</h6>
                <h4>What Client's Say?</h4>
                <p> Hotel dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante otel inilla duiman at finibus viverra neca the sene on satien the miss drana inc fermen norttito sit space, mus nellentesque habitan.</p>
                <div class="restaurant-message-info">
                    <img src="{{asset('assets/image/avatar.jpg')}}" alt="">
                    <div class="restaurant-message-info-content">
                        <span>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </span>
                        <h6>EMILY BROWN</h6>
                        <p>Guest review</p>
                    </div>
                </div>
            </div>
        </div>
@endsection

<style>

    .section1-contact{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section1-contact-content{
        width: 1140px;
        margin-top: 120px;
    }

    .section1-contact-content h5{
        color: #fff;
        font-size: 16px;
        letter-spacing: 6px;
        font-weight: 500;
    }

    .section1-contact-content h1{
        color: #fff;
        font-size: 60px;
        font-family: 'Gilda Display', serif;
        font-weight: 200;
        margin-top: 16px;
    }

    .section2-contact{
        width: 100%;
        height: 1400px;
        background-color: #fff;
        margin-top: 150px;
    }

    .section2-contact-content{
        width: 1140px;
        display: flex;
        margin: 0 auto;
        padding-top: 120px;
    }

    .section2-contact-content-left{

    }

    .section2-contact-content-left h3{
        color: #222;
        font-size: 24px;
        font-family: 'Gilda Display', serif;
        font-weight: 200;
    }

    .section2-contact-content-left p {
        color: #666;
        font-size: 18px;
        line-height: 26.25px;
        width: 546px;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    .section2-contact-content-left-icon{
        display: flex;
    }

    .section2-contact-content-left-icon i {
        color: #8e6d45;
        font-size: 40px;
    }

    .section2-contact-content-left-icon p {
        color: #666;
        font-size: 18px;
        margin-top: -10px;
        margin-left: 16px;
        line-height: 16px;
    }

    .section2-contact-content-right h3 {
        color: #222;
        font-family: 'Gilda Display', serif;
        font-size: 24px;
        font-weight: 200;
    }

    .section2-contact-content-right input {
        width: 214px;
        height: 43px;
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
        color: #666;
        line-height: 22.5px;
        font-size: 14px;
    }

    .section2-contact-content-right input:focus {
        outline: none;
    }
    
    .section2-contact-content-right textarea {
        width: 451px;
        height: 111px;
        color: #666;
        margin: 15px 0;
        padding: 10px 0;
        border-top: none;
        border-left: none;
        border-right: none;
        font-size: 16px;
    }

    .section2-contact-content-right textarea:focus {
        outline: none;
    }

    .section2-contact-content-right button {
        width: 156px;
        height: 44px;
        color: #fff;
        background-color: #ab8a62;
        font-size: 12px;
        border: none;
        transition: 0.2s all ease-in-out;
    }

    .section2-contact-content-right button:hover {
        background-color: #222;
        cursor: pointer;
    }

    .googlemap {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }

    .googlemap iframe {
        width: 1160px;
        height: 600px;
        color: #666;
    }
</style>