@extends('layouts.app')

@section('content')

<div class="d-flex align-items-start">

    @include('layouts.partials.filter-sidebar', [
        'languages' => $languages,
    ])

    <div class="flex-grow-1">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Authors</h4>
                <span class="text-muted small">{{ $authors->total() }} authors found</span>
            </div>
        </div>

        <div class="row g-3 mb-4">
            @forelse($authors as $author)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px; height:48px; font-size:1.2rem;">
                            {{ strtoupper(substr($author->name, 0, 1)) }}
                        </div>
                        <div class="flex-grow-1 min-width-0">
                            <h6 class="mb-0 fw-semibold text-truncate">{{ $author->name }}</h6>
                            <p class="text-muted small mb-1">
                                <i class="bi bi-geo-alt me-1"></i>{{ $author->country ?? '—' }}
                            </p>
                            <span class="badge bg-primary-subtle text-primary">
                                {{ $author->books_count }} {{ Str::plural('book', $author->books_count) }}
                            </span>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <a href="{{ route('authors.show.link', $author) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-person-x" style="font-size: 3rem;"></i>
                    <p class="mt-2">No authors found.</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $authors->withQueryString()->links() }}
        </div>

    </div>

</div>

@endsection