@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex align-items-center justify-content-between mb-4">    
        <div>
            <h4 class="mb-0">Categories</h4>
            <p class="text-muted small mb-0">{{ $categories->count() }} categories found</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        @forelse($categories as $category)
        <div class="col-sm-6 col-md-4">
            <a href="{{ route('categories.show.link', $category) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 card-hover overflow-hidden">
                    <div class="card-body p-3 d-flex align-items-center gap-3">
    

                        <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width: 48px; height: 48px;">
                            <i class="bi bi-tag-fill fs-5"></i>
                        </div>
    

                        <div class="flex-grow-1 min-width-0">
                            <h6 class="mb-1 fw-bold text-dark text-truncate">
                                {{ $category->name }}
                            </h6>
                            <span class="badge bg-light text-secondary border">
                                <i class="bi bi-book me-1"></i>{{ $category->books_count ?? 0 }} {{ Str::plural('book', $category->books_count ?? 0) }}
                            </span>
                        </div>
    

                        <div class="flex-shrink-0 text-muted me-1">
                            <i class="bi bi-chevron-right fs-6"></i>
                        </div>
    
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5 my-4 bg-light rounded-3 border">
                <i class="bi bi-tags text-muted" style="font-size: 3.5rem;"></i>
                <h5 class="fw-bold mt-3 text-secondary">No categories found</h5>
                <p class="text-muted small mb-0">There are currently no categories available to display.</p>
            </div>
        </div>
        @endforelse
    </div>
    

    @if(method_exists($categories, 'hasPages') && $categories->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $categories->withQueryString()->links() }}
        </div>
    @endif
    

    <style>
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.1)!important;
        }
    </style>

</div>
@endsection