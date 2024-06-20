@extends('layouts.app')

@section('content')
    <div class="room-img-slider">
        {{-- <img src="{{ asset('assets/image/room-img-slider-1.jpg')}}" alt="">
        <img src="{{ asset('assets/image/room-img-slider-2.jpg')}}" alt="">
        <img src="{{ asset('assets/image/room-img-slider-3.jpg')}}" alt=""> --}}
    </div>
    <div class="room-detail-info">
        <div class="info-header">
            <div class="star-rating">
                <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
            </div>
            <div class="name">
                LUXURY HOTEL
            </div>
            <div class="room-name">
                {{ $roomType->RoomType }}
            </div>
        </div>
        <div class="info-content">
            <div class="info-content-left">
                <p>Hotel non lorem ac erat suscipit bibendum nulla facilisi. Sedeuter nunc volutpat miss sapien vel conseyen turpeutionyer masin libero sevenion vusetion viventa augue sit amet hendrerit vestibulum. Duisteyerion venenatis lacus gravida eros ut turpis interdum ornare.</p>
                <p>Interdum et malesu they adamale fames ac anteipsu pimsine faucibus curabitur arcu site feugiat in tortor in, volutpat sollicitudin libero. Hotel non lorem acer suscipit bibendum vulla facilisi nedeuter nunc volutpa mollis sapien velet conseyer turpeutionyer masin libero sempe mollis.</p>
                <div class="check-in-out">
                    <div class="check-in">
                        <h6>Check-in</h6>
                        <ul>
                            <li><i style="color: #aa8453" class="fa-solid fa-check"></i>Check-in from 9:00 AM - anytime</li>
                            <li style="margin-top: 10px;"><i style="color: #aa8453" class="fa-solid fa-check"></i>Early check-in subject to availability</li>
                        </ul>
                    </div>
                    <div class="check-out">
                        <h6>Check-out</h6>
                        <ul>
                            <li><i style="color: #aa8453" class="fa-solid fa-check"></i>Check-out before noon</li>
                            <li style="margin-top: 10px;"><i style="color: #aa8453" class="fa-solid fa-check"></i>Express check-out</li>
                        </ul>
                    </div>
                </div>
                <div class="special-check-in">
                    <h6>Special check-in instructions</h6>
                    <p>Guests will receive an email 5 days before arrival with check-in instructions; front desk staff will greet guests on arrival For more details, please contact the property using the information on the booking confirmation.</p>
                </div>
                <div class="pet">
                    <h6>Pets</h6>
                    <p>Pets not allowed</p>
                </div>
                <div class="children-extra-bed">
                    <h6>Children and extra beds</h6>
                    <p>Children are welcome Kids stay free! Children stay free when using existing bedding; children may not be eligible for complimentary breakfast Rollaway/extra beds are available for $ 10 per day.</p>
                </div>
            </div>
            <div class="info-content-right">
                <h6>Amenities</h6>
                <ul>
                    <li><img src="{{ asset('assets/image/icon/people.svg')}}" alt=""> <span>{{ $roomType->Occupancy }} persons</span></li>
                    <li><img src="{{ asset('assets/image/icon/wifi.svg')}}" alt=""><span>Free WiFi</span></li>
                    <li><img src="{{ asset('assets/image/icon/bed.svg')}}" alt=""><span>Twin Bed</span></li>
                    <li><img src="{{ asset('assets/image/icon/breakfast.svg')}}" alt=""><span>Breakfast</span></li>
                    <li><img src="{{ asset('assets/image/icon/60-minutes.svg')}}" alt=""><span>200 sqft room</span></li>
                    <li><img src="{{ asset('assets/image/icon/swimming-pool.svg')}}" alt=""><span>Swimming Pool</span></li>
                </ul>
            </div>
        </div>
    </div>

    @include('layouts.service') {{-- Kế thừa giao diện service --}}

    <div class="hotel-booking-form">
        @csrf
        <div class="hotel-booking-form-content">
            <div class="reservation">
                <div class="star-rating">
                    <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                    <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                    <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                    <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                    <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
                </div>
                <h5>Each of our guest rooms feature a private bath, wi-fi, cable television and include full breakfast.</h5>
                <div class="phone">
                    <img src="{{ asset('assets/image/icon/phone-call.svg')}}" alt="">
                    <div class="phone-num">
                        <p>Reservation</p>
                        <span>855 100 4444</span>
                    </div>
                </div>
                <p><i style="color: #ffffff" class="fa-solid fa-check"></i>Call us, it's toll-free</p>
            </div>
    
            <div class="form">
                <h6>ROOMS & SUITES</h6>
                <h4>Hotel Booking Form</h4>
                <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="roomNo">Room No</label>
                        <select id="roomNo" name="roomNo">
                            <option value="" disabled selected>Select Room No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check in</label>
                        <input type="text" id="checkin" name="checkin" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check out</label>
                        <input type="text" id="checkout" name="checkout" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="form-group">
                        <label for="adults">Adults</label>
                        <select id="adults" name="adults">
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                            <option value="3">3 Adults</option>
                            <option value="4">4 Adults</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="children">Children</label>
                        <select id="children" name="children">
                            <option value="0">0 Children</option>
                            <option value="1">1 Child</option>
                            <option value="2">2 Children</option>
                            <option value="3">3 Children</option>
                        </select>
                    </div>
                    <button type="submit">Book now</button>
                    @if(session('success'))
                        <div style="color:green;" class="alert alert-success table-message" >
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
                
                <div id="errorMessage" style="display: none; color: red;"></div>
            </div>
        </div>
    </div>
    @endsection
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const roomNoSelect = document.getElementById('roomNo');
        const roomOccupancy = {{ $roomType->Occupancy }};
        const roomType = "{{ $roomType->RoomType }}";
    
        fetch(`/get-rooms/${roomType}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    const option = document.createElement('option');
                    option.value = "";
                    option.textContent = "Đã hết phòng";
                    option.disabled = true;
                    roomNoSelect.appendChild(option);
                } else {
                    data.forEach(room => {
                        const option = document.createElement('option');
                        option.value = room.RoomNo;
                        option.textContent = `Room ${room.RoomNo}`;
                        roomNoSelect.appendChild(option);
                    });
                }
            });
    
        const dateInputs = document.querySelectorAll('input[type="text"]');
        dateInputs.forEach(input => {
            input.addEventListener('focus', (e) => {
                e.target.type = 'date';
            });
    
            input.addEventListener('blur', (e) => {
                if (!e.target.value) {
                    e.target.type = 'text';
                    e.target.placeholder = 'dd/mm/yyyy';
                } else {
                    const date = new Date(e.target.value);
                    const day = String(date.getDate()).padStart(2, '0');
                    const month = String(date.getMonth() + 1).padStart(2, '0'); 
                    const year = date.getFullYear();
                    const formattedDate = `${day}/${month}/${year}`;
                    e.target.type = 'text';
                    e.target.value = formattedDate;
                }
            });
    
            input.placeholder = 'dd/mm/yyyy';
        });
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const checkin = document.getElementById('checkin').value;
            const checkout = document.getElementById('checkout').value;
            const adults = parseInt(document.getElementById('adults').value);
            const children = parseInt(document.getElementById('children').value);
            const roomNo = document.getElementById('roomNo').value;

            // Validate form inputs (front-end validation for date and number of guests)

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    roomNo: roomNo,
                    checkin: checkin,
                    checkout: checkout,
                    adults: adults,
                    children: children
                })
            })
            .then(response => response.json())
            .then(data => {
                // Display alert message
                alert(data.message);

                // Optional: Clear form fields after successful submission
                form.reset();

                // Optional: Hide error message if it's visible
                errorMessage.style.display = 'none';

                // Reload the current page (or redirect as needed)
                window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'An error occurred while processing your request.';
                errorMessage.style.display = 'block';
            });
        });
    });
    </script>