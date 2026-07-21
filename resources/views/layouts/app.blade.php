<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Library') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand i { font-size: 1.3rem; }
        .nav-link.active { font-weight: 600; color: #0d6efd !important; }
        .filter-sidebar { width: 240px; min-width: 240px; }
        .search-wrapper { max-width: 360px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 sticky-top">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
        <i class="bi bi-book-half"></i>
        <span>Library</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav me-auto gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="bi bi-house me-1"></i>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index.link') }}">
                    <i class="bi bi-journal-bookmark me-1"></i>Books
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('authors.*') ? 'active' : '' }}" href="{{ route('authors.index.link') }}">
                    <i class="bi bi-person me-1"></i>Authors
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index.link') }}">
                    <i class="bi bi-tag me-1"></i>Categories
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link {{ request()->routeIs('publishers.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-building me-1"></i>Publishers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('languages.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-translate me-1"></i>Languages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('years.*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-calendar me-1"></i>Years
                </a>
            </li>-->
        </ul>

        <!--<form action="#" method="GET" class="d-flex search-wrapper ms-auto">
            <div class="input-group">
                <input
                    type="search"
                    name="q"
                    class="form-control"
                    placeholder="Search books, authors..."
                    value="{{ request('q') }}"
                    autocomplete="off"
                >
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>-->
</nav>

<main class="container-fluid py-4 px-4">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>