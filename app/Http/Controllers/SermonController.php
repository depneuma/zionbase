<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Sermon;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SermonStoreRequest;
use App\Http\Requests\SermonUpdateRequest;
use App\Notifications\SermonUploaded;
use Illuminate\Support\Facades\Notification;

class SermonController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Sermon::class);

        $search = $request->get('search', '');

        $sermons = Sermon::search($search)
            ->latest()
            ->paginate();

        return view('app.sermons.index', compact('sermons', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Sermon::class);

        $users = User::pluck('name', 'id');
        $events = Event::pluck('title', 'id');

        return view('app.sermons.create', compact('users', 'events'));
    }

    /**
     * @param \App\Http\Requests\SermonStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SermonStoreRequest $request)
    {
        $this->authorize('create', Sermon::class);

        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public');
        }

        if ($request->hasFile('audio')) {
            $validated['audio'] = $request->file('audio')->store('public');
        }

        if ($request->hasFile('pdf')) {
            $validated['pdf'] = $request->file('pdf')->store('public');
        }

        $sermon = Sermon::create($validated);

        $users = User::all();
        $subscribers = Subscription::all();
        Notification::send($users->merge($subscribers), new SermonUploaded($sermon));

        return redirect()
            ->route('sermons.edit', $sermon)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sermon $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sermon $sermon)
    {
        $this->authorize('view', $sermon);

        return view('app.sermons.show', compact('sermon'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sermon $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sermon $sermon)
    {
        $this->authorize('update', $sermon);

        $users = User::pluck('name', 'id');
        $events = Event::pluck('title', 'id');

        return view('app.sermons.edit', compact('sermon', 'users', 'events'));
    }

    /**
     * @param \App\Http\Requests\SermonUpdateRequest $request
     * @param \App\Models\Sermon $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(SermonUpdateRequest $request, Sermon $sermon)
    {
        $this->authorize('update', $sermon);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($sermon->photo) {
                Storage::delete($sermon->photo);
            }

            $validated['photo'] = $request->file('photo')->store('public');
        }

        if ($request->hasFile('audio')) {
            if ($sermon->audio) {
                Storage::delete($sermon->audio);
            }

            $validated['audio'] = $request->file('audio')->store('public');
        }

        if ($request->hasFile('pdf')) {
            if ($sermon->pdf) {
                Storage::delete($sermon->pdf);
            }

            $validated['pdf'] = $request->file('pdf')->store('public');
        }

        $sermon->update($validated);

        return redirect()
            ->route('sermons.edit', $sermon)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sermon $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sermon $sermon)
    {
        $this->authorize('delete', $sermon);

        if ($sermon->photo) {
            Storage::delete($sermon->photo);
        }

        if ($sermon->audio) {
            Storage::delete($sermon->audio);
        }

        if ($sermon->pdf) {
            Storage::delete($sermon->pdf);
        }

        $sermon->delete();

        return redirect()
            ->route('sermons.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
