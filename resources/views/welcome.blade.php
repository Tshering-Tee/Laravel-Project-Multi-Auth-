<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Multi Authentication</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Basic Reset */
        *,::after,::before{box-sizing:border-box;margin:0;padding:0}
        
        /* Body and HTML */
        html, body {
            height: 100%;
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
            color: #fff; /* White text color for better contrast */
        }

        /* Background Image */
        body {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container */
        .container {
            background: rgba(0, 0, 0, 0.6); /* Dark semi-transparent background for contrast */
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Slightly darker shadow */
            text-align: center;
        }

        .title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #fff; /* White text color for better readability */
        }

        .button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: none;
            border-radius: 5px;
            background-color: #0044cc; /* Dark blue button color */
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove underline */
        }

        .button:hover {
            background-color: #0033aa; /* Slightly darker blue on hover */
        }

        .text-sm {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Multi Authentication</div>
        <a href="{{ route('login') }}" class="button">Login</a>
        <a href="{{ route('register') }}" class="button">Register</a>
    </div>
</body>
</html>
