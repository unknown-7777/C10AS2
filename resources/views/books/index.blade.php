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
                            <td>
                                <a href="{{ route('books.show.link', $book) }}" class="text-decoration-none">
                                    {{ $book->title }}
                                </a>
                            </td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->year->value }}</td>
                            <td>{{ $book->language->name }}</td>
                            <td>{{ $book->publisher->name }}</td>
                            <td class="text-end">
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