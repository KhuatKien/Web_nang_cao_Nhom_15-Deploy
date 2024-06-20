    @extends('layouts.app')

    @section('content')
        <div class="tablelist-wrapper">
            <h2>List of available tables</h2>

            @if(session('success'))
                <div class="alert alert-success table-message" >
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger" style="color:red; font-size: 30px; margin-bottom:8px">
                    <div>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="tables-container">
                @foreach($tables as $table)
                    <div class="table-item">
                        <h3>Table ID: {{ $table->TableID }}</h3>
                        <p>Occupancy: {{ $table->Occupancy }}</p>
                        <p>Status Table: {{ $table->TableStatus == '0' ? 'Still Empty' : 'Reserved a table' }}</p>
                        @if($table->TableStatus == '0')
                            @auth
                                <button style="margin-top: 30px;" class="btn btn-primary" onclick="openBookingForm('{{ $table->TableID }}', '{{ auth()->user()->id }}', '{{ auth()->user()->name }}')">Book Table</button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-secondary">Login to book a table</a>
                            @endauth
                        @else
                            <span class="status-text">Someone has reserved the table</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Booking Form Modal -->
        <div id="bookingFormModal" class="modal">
    <div class="modal-content">
        <form id="bookingForm" action="{{ route('table.book') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="guest_name">Guest Name:</label>
                <input type="text" name="guest_name" id="guest_name" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="table_id">Table ID:</label>
                <input type="text" name="table_id" id="table_id" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="guest_id">Guest ID:</label>
                <input type="text" name="guest_id" id="guest_id" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="book_id">Book ID:</label>
                <input type="text" name="book_id" id="book_id" class="form-control" value="{{ $nextBookID }}" readonly>
            </div>
            <div class="form-group">
                <label for="book_date">Table Reservation Date:</label>
                <input type="date" name="book_date" id="book_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="num_of_people">Amount Of people:</label>
                <input type="number" name="num_of_people" id="num_of_people" class="form-control" required>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-secondary" onclick="closeBookingForm()">Cancel</button>
            </div>
        </form>
    </div>
</div>

    @endsection

    <style>
        .tablelist-wrapper {
            margin-top: 100px;
            margin-left: 50px;
            margin-bottom: 1000px;
        }

        .tablelist-wrapper h2 {
            color: #fff;
            font-weight: 500;
            margin-bottom: 20px;
            text-align: center;
            font-size: 30px;
        }

        .tables-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .table-item {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            background-color: #fff;
        }

        .table-item h3 {
            margin: 0;
            font-size: 20px;
        }

        .table-item p {
            margin: 5px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #604631;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #AB844F;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .status-text {
            color: #dc3545;
            font-weight: bold;
        }

        .modal {
            display: none; /* Ẩn modal mặc định */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
        }

        .btn-primary,
        .btn-secondary {
            margin-left: 10px;
        }

        .table-message{
            color: #fff;
            font-size: 18px;
            margin: 10px 0;
        }
    </style>

    <script>
        function openBookingForm(tableID, guestID, guestName) {
            document.getElementById('table_id').value = tableID;
            document.getElementById('guest_id').value = guestID;
            document.getElementById('guest_name').value = guestName;
            document.getElementById('book_id').value = '{{ $nextBookID }}'; // Set the next Book ID
            document.getElementById('bookingFormModal').style.display = 'flex';
        }   

        function closeBookingForm() {
            document.getElementById('bookingFormModal').style.display = 'none';
        }

    </script>
