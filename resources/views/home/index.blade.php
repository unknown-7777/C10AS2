@extends('layouts.app')

@section('content')
<div class="container py-4">


    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Books</p>
                    <h2 class="fw-bold mb-3">{{ $bookCount }}</h2>
                    <a href="{{ route('books.index.link') }}" class="btn btn-sm btn-outline-primary">View all</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted small mb-1">Authors</p>
                    <h2 class="fw-bold mb-3">{{ $authorCount }}</h2>
                    <a href="{{ route('authors.index.link') }}" class="btn btn-sm btn-outline-primary">View all</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted small mb-1">Categories</p>
                    <h2 class="fw-bold mb-3">{{ $categoryCount }}</h2>
                    <a href="#" class="btn btn-sm btn-outline-primary">View all</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Books --}}
    <div class="row g-3 mb-4">
        @forelse($books as $book)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">

                @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}"
                         class="card-img-top"
                         style="height: 180px; object-fit: cover;"
                         alt="{{ $book->title }}">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height: 180px;">
                        <i class="bi bi-book text-muted" style="font-size: 3rem;"></i>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h6 class="fw-bold mb-1 text-truncate">{{ $book->title }}</h6>

                    <p class="text-muted small mb-2">
                        <i class="bi bi-person me-1"></i>
                        <a href="{{ route('authors.show.link', $book->author) }}" class="text-decoration-none text-muted">
                            {{ $book->author->name }}
                        </a>
                    </p>

                    <div class="d-flex flex-wrap gap-1 mb-3">
                        <span class="badge bg-primary-subtle text-primary">
                            <i class="bi bi-tag me-1"></i>{{ $book->category->name }}
                        </span>
                        <span class="badge bg-secondary-subtle text-secondary">
                            <i class="bi bi-translate me-1"></i>{{ $book->language->name }}
                        </span>
                        <span class="badge bg-success-subtle text-success">
                            <i class="bi bi-calendar me-1"></i>{{ $book->year->value }}
                        </span>
                    </div>

                    <p class="text-muted small mb-3">
                        <i class="bi bi-building me-1"></i>{{ $book->publisher->name }}
                    </p>

                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('books.show.link', $book) }}" class="btn btn-outline-primary btn-sm flex-grow-1">
                            <i class="bi bi-eye me-1"></i>View
                        </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5 text-muted">
                <i class="bi bi-journal-x" style="font-size: 3rem;"></i>
                <p class="mt-2">No books found.</p>
            </div>
        </div>
        @endforelse
    </div>

</div>
@endsection