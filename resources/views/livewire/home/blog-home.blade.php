<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @if(Route::has('login'))
            @auth
            <div class="card text-center my-3">
                <div class="card-body">
                    <h5 class="card-title">Click here to create new Blog</h5>
                    <a href="{{ route('create') }}" class="btn btn-primary"><b>Create New Blog</b></a>
                </div>
            </div>
            @endif
            @endif
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div class="my-4">
                @foreach ($blogs as $blog)
                <!-- Blog Post -->
                <div class="card my-4">
                    @if ($blog->filename)
                    <img class="card-img-top" src="{{ asset('storage/images/'.$blog->filename) }}" alt="Blog image">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title"><b>{{$blog->title}}</b></h2>
                        <p class="card-text">{{$blog->introduction}}</p>
                        <a href="{{ route('blog', ['id' => $blog->id]) }}" class="btn btn-primary mt-3">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        <p>{{$blog->created_at->toDayDateTimeString()}} -<i>{{$blog->owner_name}}</i></p>
                    </div>
                </div>
                @endforeach
                {{ $blogs->links() }}
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." wire:model="searchTerm">
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            Categories
                        </div>
                        <div class="col-1 mr-2">
                            <a type="button" href="{{route('create.category')}}" data-toggle="tooltip" data-placement="left" title="Add new category">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-6">
                            {{$category->name}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Admin Messages</h5>
                <div class="card-body">
                    @foreach ($messages as $message)
                    <p class="card-text">{{$message->body}}</p>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>