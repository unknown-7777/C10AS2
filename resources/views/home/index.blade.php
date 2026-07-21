@extends('layouts.app')

@section('content')
<div class="container py-4">


    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('books.index.link') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100 card-hover bg-primary bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-white-50 text-uppercase fw-medium small mb-1">Total Books</p>
                                <h2 class="display-5 fw-bold mb-0">{{ $bookCount }}</h2>
                            </div>
                            <i class="bi bi-book fs-1 text-white-50"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    

        <div class="col-md-4">
            <a href="{{ route('authors.index.link') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100 card-hover bg-dark bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-white-50 text-uppercase fw-medium small mb-1">Authors</p>
                                <h2 class="display-5 fw-bold mb-0">{{ $authorCount }}</h2>
                            </div>
                            <i class="bi bi-people fs-1 text-white-50"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    

        <div class="col-md-4">
            <a href="{{ route('categories.index.link') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100 card-hover bg-secondary bg-gradient text-white">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-white-50 text-uppercase fw-medium small mb-1">Categories</p>
                                <h2 class="display-5 fw-bold mb-0">{{ $categoryCount }}</h2>
                            </div>
                            <i class="bi bi-folder2-open fs-1 text-white-50"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    

    <style>
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
    </style>

    <br>

    <div class="row g-4 mb-4">
        @forelse($books as $book)
        <div class="col-sm-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100 overflow-hidden card-hover">
    
                {{-- Clickable Cover Image Wrapper --}}
                <a href="{{ route('books.show.link', $book) }}" class="position-relative d-block bg-light text-center text-decoration-none book-cover-link" style="height: 220px;">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}"
                             class="w-100 h-100"
                             style="object-fit: cover;"
                             alt="{{ $book->title }}">
                    @else
                        <div class="d-flex flex-column align-items-center justify-content-center h-100 text-muted">
                            <i class="bi bi-book fs-1 mb-1"></i>
                            <span class="small fw-medium">No cover image</span>
                        </div>
                    @endif
    
                    {{-- Hover Overlay Effect --}}
                    <div class="cover-overlay d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100 text-white fw-semibold small">
                        <i class="bi bi-eye-fill me-1 fs-5"></i> View Details
                    </div>
    
                    {{-- Floating Category Badge --}}
                    @if($book->category)
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3 shadow-sm z-2">
                            {{ $book->category->name }}
                        </span>
                    @endif
                </a>
    
                {{-- Card Body --}}
                <div class="card-body d-flex flex-column p-3">
                    
                    {{-- Title (Clickable) --}}
                    <h6 class="fw-bold mb-1 text-truncate" title="{{ $book->title }}">
                        <a href="{{ route('books.show.link', $book) }}" class="text-dark text-decoration-none hover-primary">
                            {{ $book->title }}
                        </a>
                    </h6>
    
                    {{-- Author --}}
                    <p class="text-muted small mb-2">
                        <i class="bi bi-person me-1"></i>
                        @if($book->author)
                            <a href="{{ route('authors.show.link', $book->author) }}" class="text-decoration-none text-secondary fw-medium">
                                {{ $book->author->name }} {{ $book->author->surname }}
                            </a>
                        @else
                            <span class="text-muted">Unknown Author</span>
                        @endif
                    </p>
    
                    {{-- Metadata Pill Row --}}
                    <div class="d-flex flex-wrap gap-2 mb-3 align-items-center small text-muted">
                        @if($book->language)
                            <span><i class="bi bi-translate me-1 text-primary"></i>{{ $book->language->name }}</span>
                        @endif
    
                        @if($book->year)
                            <span>•</span>
                            <span><i class="bi bi-calendar me-1 text-success"></i>{{ $book->year->value }}</span>
                        @endif
                    </div>
    
                    {{-- Publisher --}}
                    @if($book->publisher)
                        <p class="text-muted small mb-3 mt-auto">
                            <i class="bi bi-building me-1"></i>{{ $book->publisher->name }}
                        </p>
                    @endif
    
                    {{-- Actions --}}
                    <div class="pt-2 border-top">
                        <a href="{{ route('books.show.link', $book) }}" class="btn btn-primary btn-sm w-100">
                            <i class="bi bi-eye me-1"></i>View Details
                        </a>
                    </div>
    
                </div>
    
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5 my-4 bg-light rounded-3 border">
                <i class="bi bi-journal-x text-muted" style="font-size: 3.5rem;"></i>
                <h5 class="fw-bold mt-3 text-secondary">No books found</h5>
                <p class="text-muted small mb-0">Try adjusting your filters or search terms.</p>
            </div>
        </div>
        @endforelse
    </div>
    
    {{-- Custom CSS for Hover Effects --}}
    <style>
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.12)!important;
        }
        .hover-primary:hover {
            color: var(--bs-primary) !important;
        }
        
        /* Image Hover Overlay */
        .cover-overlay {
            background-color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.2s ease;
        }
        .book-cover-link:hover .cover-overlay {
            opacity: 1;
        }
    </style>

</div>
@endsection