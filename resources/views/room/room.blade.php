@extends('layouts.app')

@section('content')
<div class="tittle">
    <div class="tittle-content">
        <span>
            {{-- <i style="color:#e4a853" class="fa-sharp fa-solid fa-star"></i>
            <i style="color:#e4a853" class="fa-sharp fa-solid fa-star"></i>
            <i style="color:#e4a853" class="fa-sharp fa-solid fa-star"></i>
            <i style="color:#e4a853" class="fa-sharp fa-solid fa-star"></i>
            <i style="color:#e4a853" class="fa-sharp fa-solid fa-star"></i> --}}
            <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
            <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
            <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
            <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
            <img src="{{ asset('assets/image/icon/favorite.svg')}}" alt="">
        </span>
        <h5 class="name">THE CAPPA LUXURY HOTEL</h5>
        <h1 class="pagename">Room & Suites</h1>
    </div>
</div>
<div class="roompage-body-content">
    <div class="roompage-body-content-section-1">
        <div class=roomlist>
            <div class="roomdetail">
                <div class="room-info">
                    @foreach ($roomTypes as $roomType)
                        @include('layouts.roomtype', ['roomType' => $roomType, 'loop' => $loop])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layouts.service')
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.room-card');
    
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        });
    
        cards.forEach(card => {
            observer.observe(card);
        });
    });
</script>