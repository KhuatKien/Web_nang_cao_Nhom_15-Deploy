@extends('layouts.appprofile')

@section('content')
<style>

    .form-container {
        background: #fff;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        width: 100%; /* Điều chỉnh chiều rộng cho phù hợp */
        max-width: 600px; /* Giới hạn chiều rộng tối đa */
        height: 100%; /* Chiều cao cho phù hợp */
        overflow-y: auto; /* Hiển thị thanh cuộn khi nội dung quá dài */
        margin: 0 auto;
    }

    .form-container h2 {
        margin-bottom: 15px;
        font-size: 22px;
        color: #333;
        text-align: center;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form-container input[readonly] {
        background-color: #f5f5f5;
        color: #999;
    }

    .form-container button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-image: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-image 0.3s ease;
    }

    .form-container button:hover {
        background-image: linear-gradient(to right, #2575fc, #6a11cb);
    }

    .back-to-profile {
        display: block;
        margin-top: 10px;
        color: #2575fc;
        text-decoration: none;
        text-align: center;
        font-size: 14px;
    }

    .back-to-profile:hover {
        text-decoration: underline;
    }

    .full-width {
        grid-column: span 2;
    }
</style>

<div class="form-wrapper">
    <div class="form-container">
        <h2>Update Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="full-width">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="full-width">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" readonly>
                </div>
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="{{ old('dob', $guest->DOB ?? '') }}" required>
                </div>
                <div>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male" {{ old('gender', $guest->Gender ?? '') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $guest->Gender ?? '') === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $guest->Gender ?? '') === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div>
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $guest->PhoneNo ?? '') }}" required>
                </div>
                <div>
                    <label for="passport">Passport Number:</label>
                    <input type="text" id="passport" name="passport" value="{{ old('passport', $guest->PassportNo ?? '') }}" required>
                </div>
                <div class="full-width">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $guest->Address ?? '') }}" required>
                </div>
                <div>
                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $guest->Postcode ?? '') }}" required>
                </div>
                <div>
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" value="{{ old('city', $guest->City ?? '') }}" required>
                </div>
                <div class="full-width">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" value="{{ old('country', $guest->Country ?? '') }}" required>
                </div>
            </div>
            <button type="submit">Update Profile</button>
        </form>
        <a href="{{ route('profile') }}" class="back-to-profile"><i class="fas fa-arrow-left"></i> Back to Profile</a>
    </div>
</div>
@endsection
