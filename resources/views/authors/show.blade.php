@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index.link') }}">Authors</a></li>
            <li class="breadcrumb-item active">{{ $author->name }}</li>
        </ol>
    </nav>
   
</div>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow-sm text-center p-4">
            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:90px; height:90px; font-size:2.5rem;">
                {{ strtoupper(substr($author->name, 0, 1)) }}
            </div>
            <h5 class="fw-bold mb-1">{{ $author->name }}</h5>
            <p class="text-muted small mb-3">
                <i class="bi bi-geo-alt me-1"></i>{{ $author->country ?? '—' }}
            </p>
            <div class="border-top pt-3">
                <div class="row g-2 text-center">
                    <div class="col-6">
                        <div class="fw-bold fs-5">{{ $author->books_count }}</div>
                        <div class="text-muted small">{{ Str::plural('Book', $author->books_count) }}</div>
                    </div>
                    <div class="col-6">
                        <div class="fw-bold fs-5">{{ $author->books->unique('category_id')->count() }}</div>
                        <div class="text-muted small">{{ Str::plural('Category', $author->books->unique('category_id')->count()) }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if($author->birth_date)
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <h6 class="fw-semibold mb-3">Details</h6>
                <div class="d-flex justify-content-between py-2 border-bottom">
                    <span class="text-muted small">Born</span>
                    <span class="small fw-semibold">{{ \Carbon\Carbon::parse($author->birth_date)->format('d M Y') }}</span>
                </div>
                <div class="d-flex justify-content-between py-2">
                    <span class="text-muted small">Country</span>
                    <span class="small fw-semibold">{{ $author->country ?? '—' }}</span>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-9">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-semibold mb-0">
                        <i class="bi bi-journal-bookmark me-2"></i>Books by {{ $author->name }}
                    </h6>
                    <span class="badge bg-primary">{{ $author->books_count }}</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Year</th>
                                <th>Language</th>
                                <th>Publisher</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($author->books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">
                                    <a href="{{ route('books.show.link', $book) }}" class="text-decoration-none">
                                    {{ $book->title }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-secondary">
                                        {{ $book->category->name }}
                                    </span>
                                </td>
                                <td>{{ $book->year->value }}</td>
                                <td>{{ $book->language->name }}</td>
                                <td>{{ $book->publisher->name }}</td>
                                <td>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No books found for this author.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        @if($relatedAuthors->isNotEmpty())
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="fw-semibold mb-3">
                    <i class="bi bi-people me-2"></i>Authors in same categories
                </h6>
                <div class="row g-2">
                    @foreach($relatedAuthors as $related)
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-2 p-2 border rounded">
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width:36px; height:36px;">
                                {{ strtoupper(substr($related->name, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1 min-width-0">
                                <div class="fw-semibold small text-truncate">{{ $related->name }}</div>
                                <div class="text-muted" style="font-size:0.75rem;">
                                    {{ $related->books_count }} {{ Str::plural('book', $related->books_count) }}
                                </div>
                            </div>
                            <a href="{{ route('authors.show.link', $related) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>

</div>

@endsection