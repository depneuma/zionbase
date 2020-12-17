<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Notifications\EventAtHand;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use Illuminate\Support\Facades\Notification;

class EventController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Event::class);

        $search = $request->get('search', '');

        $events = Event::search($search)
            ->orderBy('date_time')
            ->paginate();

        return view('app.events.index', compact('events', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Event::class);

        $users = User::pluck('name', 'id');

        return view('app.events.create', compact('users'));
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $this->authorize('create', Event::class);

        $validated = $request->validated();
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('public');
        }

        $event = Event::create($validated);

        return redirect()
            ->route('events.edit', $event)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Event $event)
    {
        $this->authorize('view', $event);

        return view('app.events.show', compact('event'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $users = User::pluck('name', 'id');

        return view('app.events.edit', compact('event', 'users'));
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $validated = $request->validated();

        if ($request->hasFile('cover')) {
            if ($event->cover) {
                Storage::delete($event->cover);
            }

            $validated['cover'] = $request->file('cover')->store('public');
        }

        $event->update($validated);

        return redirect()
            ->route('events.edit', $event)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $this->authorize('delete', $event);

        if ($event->cover) {
            Storage::delete($event->cover);
        }

        $event->delete();

        return redirect()
            ->route('events.index')
            ->withSuccess(__('crud.common.removed'));
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function notify(Request $request, Event $event)
    {
        $this->authorize('notify', Event::class);
        $users = User::all();
        $subscribers = Subscription::all();

        Notification::send($users->merge($subscribers), new EventAtHand($event));

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.notified'));
    }
}
