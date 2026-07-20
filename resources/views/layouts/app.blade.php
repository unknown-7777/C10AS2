<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Library') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">

    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #212529; }
        .sidebar .nav-link { color: #adb5bd; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: #343a40; border-radius: 6px; }
        .sidebar .nav-link i { width: 20px; }
        .main-content { min-height: 100vh; }
    </style>
</head>
<body>

<div class="d-flex">

    <div class="sidebar p-3" style="width: 240px; min-width: 240px;">
        <a href="{{ route('home') }}" class="d-flex align-items-center mb-4 text-white text-decoration-none">
            <i class="bi bi-book-half fs-4 me-2"></i>
            <span class="fs-5 fw-semibold">Library</span>
        </a>

        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house me-2"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-bookmark me-2"></i> Books
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('authors.*') ? 'active' : '' }}">
                    <i class="bi bi-person me-2"></i> Authors
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tag me-2"></i> Categories
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('publishers.*') ? 'active' : '' }}">
                    <i class="bi bi-building me-2"></i> Publishers
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('languages.*') ? 'active' : '' }}">
                    <i class="bi bi-translate me-2"></i> Languages
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('years.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar me-2"></i> Years
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content flex-grow-1">

        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
            <span class="navbar-text fw-semibold text-dark">
                @yield('page-title', 'Dashboard')
            </span>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-muted small">{{ now()->format('d M Y') }}</span>
                <div class="vr"></div>
                <span class="text-muted small"><i class="bi bi-person-circle me-1"></i>Admin</span>
            </div>
        </nav>

        <main class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>