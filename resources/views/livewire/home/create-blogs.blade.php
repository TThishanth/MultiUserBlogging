<div class="container my-5">
    <div class="card">
        <div class="card-header">
            Create Blog
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" wire:model="title">
                    @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="introduction">Brief Introduction</label>
                    <textarea class="form-control" id="introduction" rows="3" wire:model="introduction"></textarea>
                    @error('introduction') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" rows="3" wire:model="body"></textarea>
                    @error('body') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="image">Upload Image</label>
                    @if ($file)
                    <img src="{{ $file->temporaryUrl() }}" width="150">
                    @endif
                    <input type="file" class="form-control-file" id="image" wire:model="file">
                </div>
                <div class="form-group">
                    <label for="category">Select category</label>
                    <select class="form-control" id="category" wire:model="categoryName">
                        <option value="">Choose category</option>
                        @foreach ($categories as $category)
                            <option>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categoryName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="store('{{Auth::user()->id}}', '{{Auth::user()->name}}')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>