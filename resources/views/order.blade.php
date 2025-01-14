<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link rel="stylesheet" href="{{asset('assets/css/order.css')}}">
</head>
<body>
    {{-- <div class="container">
        <h1>Booking Form</h1>
        <form id="bookingForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="region">Choose Region:</label>
            <select id="region" name="region" required>
                <option value="" disabled selected>Select your region</option>
                <option value="north">North</option>
                <option value="south">South</option>
                <option value="east">East</option>
                <option value="west">West</option>
            </select>

            <label for="handphone">Handphone Number:</label>
            <input type="tel" id="handphone" name="handphone" pattern="[0-9]{10,15}" required placeholder="1234567890">

            <label for="duration">Choose Duration (min 3 hours):</label>
            <select id="duration" name="duration" required>
                <option value="" disabled selected>Select duration</option>
                <option value="3">3 hours</option>
                <option value="4">4 hours</option>
                <option value="5">5 hours</option>
                <option value="6">6 hours</option>
                <option value="7">7 hours</option>
                <option value="8">8 hours</option>
            </select>

            <label for="date">Choose Date:</label>
            <input type="date" id="date" name="date" required>

            <button type="submit">Submit</button>
        </form>
    </div> --}}

    <div class="container">
        <h1>Booking Form</h1>
        @if(session('status'))
            <div>{{ session('status') }}</div>
        @endif
        <form action="{{ url('order') }}" method="POST" id="bookingForm">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="region">Choose Region:</label>
            <select id="region" name="region" required>
                <option value="" disabled selected>Select your region</option>
                <option value="north">North</option>
                <option value="south">South</option>
                <option value="east">East</option>
                <option value="west">West</option>
            </select>

            <label for="handphone">Handphone Number:</label>
            <input type="tel" id="handphone" name="handphone" required placeholder="1234567890">

            <label for="duration">Choose Duration (min 3 hours):</label>
            <select id="duration" name="duration" required onchange="calculateTotal()">
                <option value="" disabled selected>Select duration</option>
                <option value="3">3 hours</option>
                <option value="4">4 hours</option>
                <option value="5">5 hours</option>
                <option value="6">6 hours</option>
                <option value="7">7 hours</option>
                <option value="8">8 hours</option>
            </select>

            <label for="date">Choose Date:</label>
            <input type="date" id="date" name="date" required>

            <button type="submit">Submit</button>
            <div class="total-price" id="totalPrice">Total Price: $0</div>
        </form>
    </div>
</body>
</html>