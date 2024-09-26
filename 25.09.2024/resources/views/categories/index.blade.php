<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
</head>
<body>
    <h2>Categories List</h2>
    <a href="{{ route('categories.create') }}">
        <button>Add</button>
    </a>
    <ul>
        @isset($categories)
            @if(count($categories))
                @foreach ($categories as $category)
                    <li>{{ $category->name }}</li>
                    <a href="{{ route('categories.edit', $category->id) }}"><button>Update</button></a>
                    <a href="{{ route('categories.delete', $category->id) }}"><button>Delete</button></a>
                @endforeach

                <!-- Custom Pagination -->
                <div class="pagination">
                    @if ($categories->onFirstPage())
                        <span>&laquo; Previous</span>
                    @else
                        <a href="{{ $categories->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
                    @endif

                    <!-- Show first 3 pages -->
                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                        @if ($i == 1 || $i == $categories->lastPage() || ($i >= $categories->currentPage() - 1 && $i <= $categories->currentPage() + 1))
                            @if ($i == $categories->currentPage())
                                <span class="active">{{ $i }}</span>
                            @else
                                <a href="{{ $categories->url($i) }}">{{ $i }}</a>
                            @endif
                        @elseif ($i == $categories->currentPage() - 2 || $i == $categories->currentPage() + 2)
                            <span>...</span>
                        @endif
                    @endfor

                    @if ($categories->hasMorePages())
                        <a href="{{ $categories->nextPageUrl() }}" rel="next">Next &raquo;</a>
                    @else
                        <span>Next &raquo;</span>
                    @endif
                </div>

            @else
                <span>Category tapılmadı</span>
            @endif 
        @endisset
    </ul>

    <!-- CSS for pagination (optional) -->
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination span {
            text-decoration: none;
            padding: 8px 16px;
            margin: 0 4px;
            color: #007bff;
            border: 1px solid #ddd;
        }
        .pagination span.active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
    </style>
</body>
</html>
