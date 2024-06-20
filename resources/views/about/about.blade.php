@extends('layouts.app')

@section('content')
<div class="tittle">
    <div class="tittle-content">
        <h5 class="name">LUXURY HOTEL</h5>
        <h1 class="pagename">About us</h1>
    </div>
</div>

{{-- Kế thừa giao diện Introduce --}}
@include('layouts.introduce')

{{-- Kế thừ giao diện Service --}}
@include('layouts.service')

{{-- Kế thừa giao diện Facility --}}
@include('layouts.facility')

@endsection