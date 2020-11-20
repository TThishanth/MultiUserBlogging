<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <div class="input-group col-4 ml-2">
                <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm">
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Owner_id</th>
                            <th scope="col">Owner_name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Introduction</th>
                            <th scope="col">Body</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">{{$blog->id}}</th>
                            <td>
                                @if ($blog->filename)
                                <img width="70" src="{{ asset('storage/images/'.$blog->filename) }}" alt="Blog image">
                                @else
                                <p> No Image !! </p>
                                @endif
                            </td>
                            <td>{{$blog->owner_id}}</td>
                            <td>{{$blog->owner_name}}</td>
                            <td>{{$blog->category}}</td>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->introduction}}</td>
                            <td>{{$blog->body}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" wire:click="destroy({{$blog->id}})">Delete Blog</button>
                            </td>
                        </tr>
                        @endforeach
                        {{ $blogs->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>