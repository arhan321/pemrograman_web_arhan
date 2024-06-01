<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation</title>
    <meta name="description" content="Reserve your table at our restaurant easily and quickly. Choose your preferred day and time, and provide your contact details.">
    <link rel="stylesheet" href="frontend/reservasi/stylee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section class="banner">
        <img src="frontend/assets/img/about.jpg" alt="Background Image" class="bg-img">
        <div class="overlay">
            <h2>BOOK YOUR TABLE NOW</h2>
            <div class="card-container">
                <div class="card-content">
                    <h1>Reservation</h1>
                    <form id="reservationForm" action="{{ route('midtrans.checkout') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <select name="days" id="days" required>
                                <option value="">Select day</option>
                                <option value="2024-05-28">Tuesday</option>
                                <option value="2024-05-29">Wednesday</option>
                                <option value="2024-05-30">friday</option>
                                <!-- Add more options as needed -->
                            </select>
                            <select name="hours" id="hours" required>
                                <option value="">Select Hour</option>
                                <option value="10:00">10:00</option>
                                <option value="12:00">12:00</option>
                                <option value="14:00">14:00</option>
                                <option value="16:00">16:00</option>
                                <option value="18:00">18:00</option>
                                <option value="20:00">20:00</option>
                                <option value="22:00">22:00</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <input type="text" name="name" placeholder="Full Name" required>
                            <input type="tel" name="phone" placeholder="Phone Number" required>
                            <input type="number" name="qty" placeholder="Quantity" min="1" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Reserve Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var currentTime = new Date();
        var currentHour = currentTime.getHours();

        if (currentHour >= 22 || currentHour < 08) {
            window.location.href = '/error';
        }
        document.getElementById('reservationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            form.submit();
        });
        if (currentHour >= 22 || currentHour < 08) {
                window.location.href = '/error';
            } else {
                form.submit();
            }
    </script>
    {{-- <script>
        // Mendapatkan waktu saat ini
        var currentTime = new Date();
        var currentHour = currentTime.getHours();

        // Mengecek apakah sudah lewat pukul 22:00 (10 malam) atau belum
        if (currentHour >= 22 || currentHour < 10) {
            // Redirect pengguna ke halaman lain (misalnya halaman utama)
            window.location.href = '/error';
        }

        document.getElementById('reservationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;

            // Mengecek ulang sebelum submit form
            if (currentHour >= 22 || currentHour < 10) {
                window.location.href = '/error';
            } else {
                form.submit();
            }
        });
    </script> --}}
</body>
</html>
