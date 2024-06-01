<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko tutup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9a9a9a;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: ease-in-out 0.3s;
        }

        h1 {
            color: #dc3545;
            font-size: 36px;
            margin-bottom: 10px;
        }

        p {
            color: #6c757d;
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>MAAF layanan reservasi di tutup</h1>
        <p> 😋 layanan reservasi di Toko kami akan buka lagi jam 8 pagi cuyyy 😋</p>
    </div>

    <script>
        setInterval(function() {
            var container = document.querySelector('.container');
            container.style.transform = 'scale(1.1)';
            setTimeout(function() {
                container.style.transform = 'scale(1)';
            }, 500);
        }, 1000);
    </script>

</body>
</html>
