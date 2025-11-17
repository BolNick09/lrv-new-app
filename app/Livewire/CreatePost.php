<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CreatePost extends Component
{
    public string $title = "";
    public string $content = "";
    

    public function save()
    {
        Post::create ([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => Auth::id()
        ]);
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
