<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Booking Confirmation</h2>
    <p>Hello {{ $booking->guest->name }},</p>
    <p>Your booking with details:</p>
    <ul>
        <li>Booking ID: {{ $booking->BookingID }}</li>
        <li>Room Number: {{ $booking->RoomNo }}</li>
        <li>Arrival Date: {{ $booking->ArrivalDate }}</li>
        <li>Departure Date: {{ $booking->DepartureDate }}</li>
        <li>Number of Adults: {{ $booking->NumAdults }}</li>
        <li>Number of Children: {{ $booking->NumChildren }}</li>
        <li>Status: Confirmed</li>
    </ul>
    <p>has been successfully confirmed.</p>
</body>
</html>
