<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <header>
       <h2> <a href="/" class="logo">Jeet Patel</a></h2>
        <nav>
            <ul class="nav-links">
               
                <li><a href="#shallow">About</a></li>
                <li><a href="#mid-depth">Skills</a></li>
                <li><a href="#deep-sea">Fun</a></li>
                <li><a href="#abyss">Contact</a></li>
            </ul>
            <div class="hamburger">☰</div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        

    
        <p>© {{ date('Y') }} MSC-IT Resources | Made by Jeet Patel</p>
    
        <div class="social-icons">
            <a href="https://www.instagram.com/jeet__1466/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/in/jeetpatel1466/" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    
        </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
