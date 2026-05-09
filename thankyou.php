<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | QuickPOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(145deg, #f1f3ff, #ffffff);
            color: #1f2440;
            padding: 1rem;
        }
        .thankyou-card {
            width: min(560px, 100%);
            text-align: center;
            background: #fff;
            border: 1px solid #e6e8f5;
            border-radius: 18px;
            padding: 2rem 1.5rem;
            box-shadow: 0 20px 40px rgba(53, 65, 107, 0.12);
        }
        h1 { font-size: clamp(1.7rem, 3vw, 2.3rem); margin-bottom: 0.7rem; }
        p { color: #5d6480; margin-bottom: 1.4rem; }
        a {
            display: inline-block;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #6d4dff, #3b82f6);
            padding: 0.7rem 1.2rem;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <section class="thankyou-card">
        <h1>Thank You!</h1>
        <p>Your message has been received successfully. Our team will get back to you shortly.</p>
        <a href="index.php">Back to Home</a>
    </section>
</body>
</html>
