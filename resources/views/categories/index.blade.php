@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="mb-0">Categories</h4>
            <p class="text-muted small mb-0">{{ $categories->count() }} categories found</p>
        </div>
    </div>

    <div class="row g-3">
        @forelse($categories as $category)
        <div class="col-md-4 col-sm-6">
            <a href="{{ route('categories.show.link', $category) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100" style="transition: box-shadow 0.15s;">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 flex-shrink-0"
                             style="width: 46px; height: 46px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                 viewBox="0 0 24 24" stroke="#0d6efd" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-semibold text-dark">{{ $category->name }}</h6>
                            <p class="mb-0 text-muted small">{{ $category->books_count }} {{ Str::plural('book', $category->books_count) }}</p>
                        </div>
                        <div class="ms-auto text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow-sm text-center py-5 text-muted">
                <p class="mb-0">No categories found.</p>
            </div>
        </div>
        @endforelse
    </div>

</div>
@endsection