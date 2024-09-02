<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Notes</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
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

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
