@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index.link') }}">Authors</a></li>
            <li class="breadcrumb-item active">{{ $author->name }} {{ $author->surname }}</li>
        </ol>
    </nav>
</div>

<div class="row g-4">


    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="d-flex align-items-center justify-content-center bg-light" style="height: 260px;">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                     style="width: 100px; height: 100px; font-size: 2.8rem;">
                    {{ strtoupper(substr($author->name, 0, 1)) }}
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-9">
        <div class="card shadow-sm h-100">
            <div class="card-body">

                <h2 class="fw-bold mb-1">{{ $author->name }} {{ $author->surname }}</h2>
                <p class="text-muted mb-4">
                    <i class="bi bi-geo-alt me-1"></i>{{ $author->country ?? '—' }}
                </p>

                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-book me-1"></i>Books</div>
                            <span class="fw-semibold">{{ $author->books_count }}</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-tag me-1"></i>Categories</div>
                            <span class="fw-semibold">{{ $author->books->unique('category_id')->count() }}</span>
                        </div>
                    </div>
                    @if($author->birth_date)
                    <div class="col-sm-4">
                        <div class="p-3 bg-light rounded">
                            <div class="text-muted small mb-1"><i class="bi bi-calendar me-1"></i>Born</div>
                            <span class="fw-semibold">{{ \Carbon\Carbon::parse($author->birth_date)->format('d M Y') }}</span>
                        </div>
                    </div>
                    @endif
                </div>


                <h6 class="fw-semibold mb-3">
                    <i class="bi bi-journal-bookmark me-2"></i>Books by {{ $author->name }}
                    <span class="badge bg-primary ms-1">{{ $author->books_count }}</span>
                </h6>

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
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No books found for this author.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>


@if($relatedAuthors->isNotEmpty())
<div class="mt-5">
    <h5 class="fw-semibold mb-3">
        <i class="bi bi-people me-2"></i>Authors in same categories
    </h5>
    <div class="row g-3">
        @foreach($relatedAuthors as $related)
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="d-flex align-items-center justify-content-center bg-light" style="height: 120px;">
                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                         style="width: 56px; height: 56px; font-size: 1.4rem;">
                        {{ strtoupper(substr($related->name, 0, 1)) }}
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-title mb-1">{{ $related->name }}</h6>
                    <p class="text-muted small mb-2">
                        {{ $related->books_count }} {{ Str::plural('book', $related->books_count) }}
                    </p>
                    <a href="{{ route('authors.show.link', $related) }}" class="btn btn-outline-primary btn-sm w-100">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection