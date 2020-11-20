<div class="container">

    <div class="row">

        <!--home body -->
        <div class="container col-md-6 mt-5" style="margin-bottom: 300px;">
            <div class="card">
                <div class="card-header">
                    Create Blog
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Category Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" wire:model="name">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary" wire:click.prevent="store()">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
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