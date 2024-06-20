<div class="room-card">
    <div class="room-details">
        <h3>{{ $roomType->RoomPrice }}$ <span>/ Night</span></h3>
        <h4>{{ $roomType->RoomType }}</h4>
        <p>{{ $roomType->RoomDesc }}</p>
        <div class="room-service">
            <ul>
                <li><img src="{{ asset('assets/image/icon/people.svg')}}" alt=""> <span>{{ $roomType->Occupancy }} persons</span></li>
                <li><img src="{{ asset('assets/image/icon/wifi.svg')}}" alt=""><span>Free WiFi</span></li>
            </ul>
            <ul>
                <li><img src="{{ asset('assets/image/icon/bed.svg')}}" alt=""><span>Twin Bed</span></li>
                <li><img src="{{ asset('assets/image/icon/breakfast.svg')}}" alt=""><span>Breakfast</span></li>
            </ul>
            <ul>
                <li><img src="{{ asset('assets/image/icon/60-minutes.svg')}}" alt=""><span>200 sqft room</span></li>
                <li><img src="{{ asset('assets/image/icon/swimming-pool.svg')}}" alt=""><span>Swimming Pool</span></li>
            </ul>
        </div>
        <div class="boder"></div>
        <a href="{{ route('detail', $roomType->RoomType) }}" class="details-button">DETAILS <i style="font-size:15px; color:#666666, letter-spacing:3px; line-height:10px font-weight:normal;" class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="room-img {{ $loop->odd ? 'right-zero' : 'left-zero' }}">
        <img src="{{ $roomType->image_path }}" alt="">
    </div>
</div>