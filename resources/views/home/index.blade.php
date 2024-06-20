@extends('layouts.app')

@section('content')

    <div id="content"></div>

    {{-- Kế thừa giao diện Introduce --}}
    @include('layouts.introduce')

    {{-- Kế thừa giao diện RoomType --}}
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

    {{-- Kế thừa giao diện Service --}}
    @include('layouts.service')

    {{-- Kế thừa giao diện Facility --}}
    @include('layouts.facility')
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