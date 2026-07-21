@extends('layouts.app')

@section('content')
<div class="d-flex align-items-start">

    @include('layouts.partials.filter-sidebar', [
        'categories' => $categories,
        'authors'    => $authors,
        'languages'  => $languages,
        'publishers' => $publishers,
        'years'      => $years,
    ])

    <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Books</h4>
            <a href="#" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Add book
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Year</th>
                            <th>Language</th>
                            <th>Publisher</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->year->value }}</td>
                            <td>{{ $book->language->name }}</td>
                            <td>{{ $book->publisher->name }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this book?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No books found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $books->withQueryString()->links() }}
        </div>
    </div>

</div>
@endsection