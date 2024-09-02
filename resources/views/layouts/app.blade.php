<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>



    <style>
        /* Custom CSS for sidebar */
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            color: #007bff;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') || Request::is('/') ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('students') ? 'active' : '' }}" href="{{ url('/students') }}">Étudiants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('subjects') ? 'active' : '' }}" href="{{ url('/subjects') }}">Matières</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('notes') ? 'active' : '' }}" href="{{ url('/notes') }}">Notes</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</body>
</html>
