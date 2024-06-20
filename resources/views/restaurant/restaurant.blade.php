@extends('layouts.app')
@section('content')
        <div class="restaurant-about">
            <div class="res-content-top">
                <span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </span>
                <p class="res-content-top-p1">AN EXPERIENCE FOR THE SENSES</p>
                <p class="res-content-top-p2">The Restaurant</p>
            </div>
            <div class="res-content-bottom">
                <p >
                Led by Chef de Micheal Martin, The Restaurant is celebrated for its excellent cuisine and unique ambience. The gorgeous dining room features three open studio kitchens, allowing you to enjoy the sights and sounds of the culinary artistry on display. The menu showcases both Asian and European influences, with a tempting selection of classic favorites and creative dishes for you to sample. Cheese connoisseurs will be drawn to the The Wine and Cheese Cellar, housed in five-meter-high glass walls, where our knowledgeable staff can introduce you to some of New York's greatest culinary treasures.
                </p>
                <h6>Hours</h6>
                <div class="clock">
                <i class="fa-regular fa-clock"></i><p>Breakfast: 7.00 am – 11.00 am (daily)</p>
                </div>
                <div class="clock">
                <i class="fa-regular fa-clock"></i><p>Lunch: 12.00 noon – 2.00 pm (daily)</p>
                </div>
                <div class="clock">
                <i class="fa-regular fa-clock"></i><p>Dinner: open from 6.30 pm, last order at 10.00 pm (daily)</p>
                </div>
                <h6>Dress Code</h6>
                <p>Smart casual (no shorts, hats, or sandals permitted)</p>
                <h6>Terrace</h6>
                <p>Open for drinks only</p>
            </div>
        </div>
        <div class="restaurant-menu">
            <div class="menu-title">
                <p class="menu-title-p1">LUXURY HOTEL</p>
                <p class="menu-title-p2">Restaurant Menu</p>
            </div>
            <div class="menu-type">
                <div class="menu-type-item">
                    <ul>
                        <li>Starters</li>
                        <li>Mains</li>
                        <li>Salads</li>
                        <li>Wine</li>
                    </ul>
                </div>
            </div>
            <div class="menu-list">
                <div class="menu-list-left">
                    <h5>Mozzarella Dippers           27$</h5>
                    <p>Fried mozzarella sticks, marinara sauce</p>
                    <h5>Onion Rings                  32$</h5>
                    <p>Fried onion rings, smoked aioli</p>
                    <h5>Fried Jalapeno               52$</h5>
                    <p>Fried jalapeno pickles, cheddar sauce</p>
                </div>
                <div class="menu-list-right">
                <h5>Mozzarella Dippers           27$</h5>
                    <p>Fried mozzarella sticks, marinara sauce</p>
                    <h5>Onion Rings                  32$</h5>
                    <p>Fried onion rings, smoked aioli</p>
                    <h5>Fried Jalapeno               52$</h5>
                    <p>Fried jalapeno pickles, cheddar sauce</p>
                </div>
            </div>
            <button>
                <a href="{{route('tablelist')}}">BOOK NOW</a>
            </button>
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