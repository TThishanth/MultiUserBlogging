<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <div class="row justify-content-between pr-2">
                <div class="col-8">
                    <!-- Title -->
                    <h1 class="mt-4"><b>{{$blog->title}}</b></h1>

                    <!-- Author -->
                    <p class="lead">
                        <i>by {{$blog->owner_name}}</i>
                    </p>
                </div>
                <div class="col-2">
                    @if ($blog->owner_id == Auth::user()->id)
                    <div class="row mt-4">
                        <a class="btn btn-primary mr-2" href="{{ route('edit', ['id' => $blog->id]) }}" role="button">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                        <button type="button" class="btn btn-danger" wire:click="destroy({{$blog->id}})">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>

                    </div>
                    @endif
                </div>
            </div>

            <hr>

            <!-- Date/Time -->
            <p class="pt-2">Posted on {{$blog->created_at->toDayDateTimeString()}}</p>

            <hr>

            <!-- Preview Image -->
            @if ($blog->filename)
            <img class="card-img-top" src="{{ asset('storage/images/'.$blog->filename) }}" alt="Blog image">
            @endif

            <hr>

            <!-- Post Content -->
            <p class="my-3">{{$blog->body}}</p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" wire:model="comment"></textarea>
                            @error('comment') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" wire:click.prevent="store({{$blog->id}}, '{{Auth::user()->id}}', '{{Auth::user()->name}}')">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Comment with nested comments -->
            @foreach ($comments as $comment)
            @if ($blog->id == $comment->blog_id)
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="https://ui-avatars.com/api/?name={{$comment->owner_name}}&background=ff5733&color=fff&length=1" alt="">
                <div class="media-body">
                    <div class="row justify-content-between">
                        <div class="col-11">
                            <h5 class="mt-0">{{$comment->owner_name}}</h5>
                            <div class="py-1">
                                {{$comment->body}}
                            </div>
                        </div>
                        <div class="col-1">
                            @if ($comment->owner_id == Auth::user()->id)
                                <button type="button" wire:click="deleteComment({{$comment->id}})">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                    @if ($replies)
                    @foreach ($replies as $reply)
                    @if ($blog->id == $reply->blog_id && $comment->id == $reply->comment_id)
                    <div class="media my-4">
                        <img class="d-flex mr-4 rounded-circle" src="https://ui-avatars.com/api/?name={{$reply->owner_name}}&background=ff5733&color=fff&length=1" alt="">
                        <div class="media-body">
                            <div class="row justify-content-between">
                                <div class="8">
                                    <h5 class="mt-0">{{$reply->owner_name}}</h5>
                                    <div class="py-1">
                                        {{$reply->body}}
                                    </div>
                                </div>
                                <div class="1 pr-4">
                                    @if ($reply->owner_id == Auth::user()->id)
                                        <button type="button" wire:click="deleteReply({{$reply->id}})">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    <hr>
                    <div class="mt-2">
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="replyButton" title="Reply">reply</button>
                            </div>
                            <div id="replyForm">
                                <form class="mt-2">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="2" wire:model="reply"></textarea>
                                        @error('reply') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-sm" wire:click.prevent="storeReply({{$blog->id}}, '{{$comment->id}}', '{{Auth::user()->id}}', '{{Auth::user()->name}}')">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

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