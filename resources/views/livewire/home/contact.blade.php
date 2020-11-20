<div class="container my-5">
    <div class="card">
        <div class="card-header">
            Contact Us
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" wire:model="title">
                    @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" wire:model="email">
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Subject</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" wire:model="subject">
                    @error('subject') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="message"></textarea>
                    @error('message') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="store({{Auth::user()->id}}, '{{Auth::user()->name}}')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>