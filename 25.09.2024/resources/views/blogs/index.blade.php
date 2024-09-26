<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
</head>
<body>
    <h2>Categories List</h2>
    <a href="{{ route('blogs.create') }}">
        <button>Add</button>
    </a>
    <div><table border="1">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                    </tr>
                    </thead>
        @isset($blogs)
            @if(count($blogs))
                @foreach ($blogs as $blog)
                    <!-- <div>
                        <h4>Title{{ $blog->title }}</h4>
                        <p>Content{{$blog->content}}</p>
                        <span>Category{{$blog->category->name}}</span>
                </div> -->
                
                    <tbody>
                          <tr>
                        <th>{{ $blog->title }}</th>
                        <th>{{ $blog->content }}</th>
                        <th>{{ $blog->category->name }}</th>
                        <th>           <a href="{{ route('blogs.edit', ['id'=>$blog->id]) }}"><button>Update</button></a>
                    <a href="{{ route('blogs.delete', ['id'=>$blog->id]) }}"><button>Delete</button></a></th>
                    </tr>
                    </tbody>
                  
                
         
                @endforeach
</table>
                <div class="pagination">
                    @if ($blogs->onFirstPage())
                        <span>&laquo; Previous</span>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
                    @endif

                    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                        @if ($i == 1 || $i == $blogs->lastPage() || ($i >= $blogs->currentPage() - 1 && $i <= $blogs->currentPage() + 1))
                            @if ($i == $blogs->currentPage())
                                <span class="active">{{ $i }}</span>
                            @else
                                <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                            @endif
                        @elseif ($i == $blogs->currentPage() - 2 || $i == $blogs->currentPage() + 2)
                            <span>...</span>
                        @endif
                    @endfor

                    @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}" rel="next">Next &raquo;</a>
                    @else
                        <span>Next &raquo;</span>
                    @endif
                </div>

            @else
                <span>Category tapılmadı</span>
            @endif 
        @endisset
    </div>

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
