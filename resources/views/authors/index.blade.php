@extends('layouts.app')

@section('content')

<div class="d-flex align-items-start">

    @include('layouts.partials.filter-sidebar', [
        'countries' => $countries,
    ])

    <div class="flex-grow-1">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">Authors</h4>
                <span class="text-muted small">{{ $authors->total() }} authors found</span>
            </div>
        </div>

        <div class="row g-4 mb-4">
            @forelse($authors as $author)
            <div class="col-sm-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100 card-hover overflow-hidden">
                    <div class="card-body p-3 d-flex align-items-center gap-3">

                        <a href="{{ route('authors.show.link', $author) }}" class="text-decoration-none flex-shrink-0">
                            @if(isset($author->photo_url) && $author->photo_url)
                                <img src="{{ asset('storage/' . $author->photo_url) }}"
                                     alt="{{ $author->name }} {{ $author->surname }}"
                                     class="rounded-circle object-fit-cover shadow-sm"
                                     style="width: 54px; height: 54px;">
                            @else
                                <div class="rounded-circle bg-primary bg-gradient text-white d-flex align-items-center justify-content-center shadow-sm fw-bold"
                                     style="width: 54px; height: 54px; font-size: 1.25rem;">
                                    {{ strtoupper(substr($author->name, 0, 1)) }}{{ strtoupper(substr($author->surname ?? '', 0, 1)) }}
                                </div>
                            @endif
                        </a>

                        <div class="flex-grow-1 min-width-0">
                            <h6 class="mb-1 fw-bold text-truncate">
                                <a href="{{ route('authors.show.link', $author) }}" class="text-dark text-decoration-none hover-primary">
                                    {{ $author->name }} {{ $author->surname }}
                                </a>
                            </h6>
                            <p class="text-muted small mb-2 text-truncate">
                                <i class="bi bi-geo-alt me-1 text-danger"></i>{{ $author->country ?? 'Unknown Location' }}
                            </p>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                <i class="bi bi-book me-1"></i>{{ $author->books_count ?? 0 }} {{ Str::plural('book', $author->books_count ?? 0) }}
                            </span>
                        </div>

                        <div class="flex-shrink-0">
                            <a href="{{ route('authors.show.link', $author) }}"
                               class="btn btn-light btn-sm rounded-circle shadow-sm"
                               title="View Profile"
                               style="width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center;">
                                <i class="bi bi-chevron-right text-muted"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5 my-4 bg-light rounded-3">
                    <i class="bi bi-person-x text-muted" style="font-size: 3.5rem;"></i>
                    <h5 class="fw-bold mt-3 text-secondary">No authors found</h5>
                    <p class="text-muted small mb-0">Try adjusting your search query or filters.</p>
                </div>
            </div>
            @endforelse
        </div>

        @if($authors->hasPages())
        <div class="d-flex flex-column align-items-center gap-1 mt-3">
            <div>
                {{ $authors->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
            <p class="text-muted small mb-0">
                Showing {{ $authors->firstItem() }}–{{ $authors->lastItem() }} of {{ $authors->total() }} results
            </p>
        </div>
        @endif

    </div>
</div>

<style>
    .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .card-hover:hover { transform: translateY(-3px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.1)!important; }
    .hover-primary:hover { color: var(--bs-primary) !important; }
</style>

@endsection