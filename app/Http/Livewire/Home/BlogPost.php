<?php

namespace App\Http\Livewire\Home;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Comment;
use App\Models\DisplayMessage;
use App\Models\Reply;
use Livewire\Component;

class BlogPost extends Component
{
    public $getblog;
    public $comment;
    public $reply;

    protected $rules= [
        'comment' => 'required|max:200',
    ];

    public function resetInputFields() {
        $this->comment = '';
        $this->reply = '';
    }

    public function resetReplyInputFields() {
        $this->reply = '';
    }

    public function store($blog_id, $owner_id, $owner_name){
        $this->validate();
   
        Comment::create([
            'blog_id' => $blog_id,
            'owner_id' => $owner_id,
            'owner_name' => $owner_name,
            'body' => $this->comment
        ]);

        $this->resetInputFields();
    }

    public function storeReply($blog_id, $comment_id, $owner_id, $owner_name){
        $this->validate([
            'reply' => 'required|max:200',
        ]);
   
        Reply::create([
            'blog_id' => $blog_id,
            'comment_id' => $comment_id,
            'owner_id' => $owner_id,
            'owner_name' => $owner_name,
            'body' => $this->reply
        ]);

        $this->resetReplyInputFields();
    }

    public function deleteComment($comment_id) {
        if ($comment_id) {
            $comment = Comment::where('id', $comment_id);
            $reply = Reply::where('comment_id', $comment_id);

            $reply->delete();
            $comment->delete();

            session()->flash('message', 'Comment successfully deleted.');
        }
    }

    public function deleteReply($reply_id) {
        if ($reply_id){
            $reply = Reply::where('id', $reply_id);
            $reply->delete();

            session()->flash('message', 'Reply successfully deleted.');
        }
    }

    public function mount($id) {
        $this->getblog = Blogs::find($id);
    }

    public function destroy($id) {
        if ($id) {
            $blog = Blogs::where('id', $id);
            $blog->delete();

            session()->flash('message', 'Blog successfully deleted.');

            return redirect()->to('/');
        }
    }

    public function render()
    {
        $blog = $this->getblog;
        $categories = Category::all();
        $comments = Comment::all();
        $replies = Reply::all();
        $messages = DisplayMessage::all();
        return view('livewire.home.blog-post', compact('categories', 'messages', 'blog', 'comments', 'replies'))->layout('layouts.base');
    }
}
