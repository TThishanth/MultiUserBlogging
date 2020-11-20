<div class="container my-5">
    <div class="card">
        <div class="card-header">
            Edit Blog
        </div>
        <div class="card-body">
            <form>
                <input type="hidden" name="id" wire:model='ids'/>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" wire:model="title">
                    @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Brief Introduction</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="introduction"></textarea>
                    @error('introduction') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Body</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="body"></textarea>
                    @error('body') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Image</label>
                    @if ($file)
                        <img src="{{ $file->temporaryUrl() }}" width="150">
                    @endif

                    <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model="file">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select category</label>
                    <select class="form-control" wire:model="categoryName">
                        <option value="">Choose category</option>
                        @foreach ($categories as $category)
                            <option>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('categoryName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="update()">Update Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>