@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('books.index.link') }}">Books</a></li>
            <li class="breadcrumb-item active">{{ $book->title }}</li>
        </ol>
    </nav>
    <!--<div class="d-flex gap-2">
        <a href="#" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-pencil me-1"></i>Edit
        </a>
        <form action="#" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this book?')">
                <i class="bi bi-trash me-1"></i>Delete
            </button>
        </form>
    </div>-->
</div>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}">
            @else
                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 320px;">
                    <i class="bi bi-book text-muted" style="font-size: 5rem;"></i>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-9">
        <div class="card shadow-sm h-100">
            <div class="card-body">

                <h2 class="fw-bold mb-1">{{ $book->title }}</h2>
                <p class="text-muted mb-4">code: {{ $book->code ?? '—' }}</p>

                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-person me-1"></i>Author</div>
                            <a href="#" class="fw-semibold text-decoration-none">
                                {{ $book->author->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-tag me-1"></i>Category</div>
                            <a href="#" class="fw-semibold text-decoration-none">
                                {{ $book->category->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-calendar me-1"></i>Year</div>
                            <span class="fw-semibold">{{ $book->year->value }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-translate me-1"></i>Language</div>
                            <span class="fw-semibold">{{ $book->language->name }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-building me-1"></i>Publisher</div>
                            <a href="#" class="fw-semibold text-decoration-none">
                                {{ $book->publisher->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-file-text me-1"></i>Pages</div>
                            <span class="fw-semibold">{{ $book->page_count ?? '—' }}</span>
                        </div>
                    </div>
                </div>

                @if($book->description)
                <div>
                    <h6 class="fw-semibold mb-2">Description</h6>
                    <p class="text-muted lh-lg">{{ $book->description }}</p>
                </div>
                @endif

            </div>
        </div>
    </div>

</div>

@if($relatedByAuthor->isNotEmpty())
<div class="mt-5">
    <h5 class="fw-semibold mb-3">
        <i class="bi bi-person me-2"></i>More by {{ $book->author->name }}
    </h5>
    <div class="row g-3">
        @foreach($relatedByAuthor as $related)
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                @if($related->cover_image)
                    <img src="{{ asset('storage/' . $related->cover_image) }}" class="card-img-top" style="height:160px; object-fit:cover;" alt="{{ $related->title }}">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height:160px;">
                        <i class="bi bi-book text-muted" style="font-size: 2.5rem;"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h6 class="card-title mb-1">{{ $related->title }}</h6>
                    <p class="text-muted small mb-2">{{ $related->category->name }}</p>
                    <a href="{{ route('books.show.link', $related) }}" class="btn btn-outline-primary btn-sm w-100">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@if($relatedByCategory->isNotEmpty())
<div class="mt-5">
    <h5 class="fw-semibold mb-3">
        <i class="bi bi-tag me-2"></i>More in {{ $book->category->name }}
    </h5>
    <div class="row g-3">
        @foreach($relatedByCategory as $related)
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                @if($related->cover_image)
                    <img src="{{ asset('storage/' . $related->cover_image) }}" class="card-img-top" style="height:160px; object-fit:cover;" alt="{{ $related->title }}">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light" style="height:160px;">
                        <i class="bi bi-book text-muted" style="font-size: 2.5rem;"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h6 class="card-title mb-1">{{ $related->title }}</h6>
                    <p class="text-muted small mb-2">{{ $related->author->name }}</p>
                    <a href="{{ route('books.show.link', $related) }}" class="btn btn-outline-primary btn-sm w-100">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection