<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogUpdateRequest;
use App\Notifications\BlogPostCreated;
use Illuminate\Support\Facades\Notification;

class BlogController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Blog::class);

        $search = $request->get('search', '');

        $blogs = Blog::search($search)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('app.blogs.index', compact('blogs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Blog::class);

        $users = User::pluck('name', 'id');

        return view('app.blogs.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\BlogStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $this->authorize('create', Blog::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $blog = Blog::create($validated);

        $users = User::all();
        $subscribers = Subscription::all();
        Notification::send($users->merge($subscribers), new BlogPostCreated($blog));

        return redirect()
            ->route('blogs.edit', $blog)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Blog $blog)
    {
        $this->authorize('view', $blog);

        return view('app.blogs.show', compact('blog'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $users = User::pluck('name', 'id');

        return view('app.blogs.edit', compact('blog', 'users'));
    }

    /**
     * @param \App\Http\Requests\BlogUpdateRequest $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete($blog->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $blog->update($validated);

        return redirect()
            ->route('blogs.edit', $blog)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blog $blog)
    {
        $this->authorize('delete', $blog);

        if ($blog->image) {
            Storage::delete($blog->image);
        }

        $blog->delete();

        return redirect()
            ->route('blogs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
