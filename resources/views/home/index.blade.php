@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Books</h5>
                    <p class="display-4 fw-bold">{{ $bookCount }}</p>
                    <a href="{{ route('books.index.link') }}" class="btn btn-primary btn-sm">View all</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Authors</h5>
                    <p class="display-4 fw-bold">{{ $authorCount }}</p>
                    <a href="#" class="btn btn-primary btn-sm">View all</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="display-4 fw-bold">{{ $categoryCount }}</p>
                    <a href="#" class="btn btn-primary btn-sm">View all</a>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5">
        <h4>Recent books</h4>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Year</th>
                    <th>Language</th>
                    <th>Publisher</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->year->value }}</td>
                    <td>{{ $book->language->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No books found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection