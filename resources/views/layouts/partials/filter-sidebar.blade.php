<aside class="filter-sidebar me-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h6 class="fw-semibold mb-3"><i class="bi bi-funnel me-2"></i>Filters</h6>

            <form method="GET" action="{{ url()->current() }}">
                @if(request('q'))
                    <input type="hidden" name="q" value="{{ request('q') }}">
                @endif

                <div class="mb-3">
                    <label class="form-label text-muted small">Search</label>
                    <input
                        type="text"
                        name="search"
                        class="form-control form-control-sm"
                        placeholder="Search..."
                        value="{{ request('search') }}"
                    >
                </div>

                @isset($categories)
                <div class="mb-3">
                    <label class="form-label text-muted small">Category</label>
                    <select name="category_id" class="form-select form-select-sm">
                        <option value="">All categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endisset

                @isset($authors)
                <div class="mb-3">
                    <label class="form-label text-muted small">Author</label>
                    <select name="author_id" class="form-select form-select-sm">
                        <option value="">All authors</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endisset

                @isset($languages)
                <div class="mb-3">
                    <label class="form-label text-muted small">Language</label>
                    <select name="language_id" class="form-select form-select-sm">
                        <option value="">All languages</option>
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}" {{ request('language_id') == $language->id ? 'selected' : '' }}>
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endisset

                @isset($publishers)
                <div class="mb-3">
                    <label class="form-label text-muted small">Publisher</label>
                    <select name="publisher_id" class="form-select form-select-sm">
                        <option value="">All publishers</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ request('publisher_id') == $publisher->id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endisset

                @isset($years)
                <div class="mb-3">
                    <label class="form-label text-muted small">Year</label>
                    <select name="year_id" class="form-select form-select-sm">
                        <option value="">All years</option>
                        @foreach($years as $year)
                            <option value="{{ $year->id }}" {{ request('year_id') == $year->id ? 'selected' : '' }}>
                                {{ $year->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endisset

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-funnel me-1"></i>Apply
                    </button>
                    <a href="{{ url()->current() }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-x-circle me-1"></i>Clear
                    </a>
                </div>
            </form>
        </div>
    </div>
</aside>