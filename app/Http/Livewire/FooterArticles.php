<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class FooterArticles extends Component
{
    public $blogs;

    public function render()
    {
        $this->blogs = Blog::orderBy('created_at', 'desc')->get()->take(2);
        return view('livewire.footer-articles');
    }
}
