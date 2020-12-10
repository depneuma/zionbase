@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.sermons.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Sermon::class)
                        <a
                            href="{{ route('sermons.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>@lang('crud.sermons.inputs.user_id')</th>
                            <th>@lang('crud.sermons.inputs.event_id')</th>
                            <th>@lang('crud.sermons.inputs.cover')</th>
                            <th>@lang('crud.sermons.inputs.audio')</th>
                            <th>@lang('crud.sermons.inputs.video')</th>
                            <th>@lang('crud.sermons.inputs.pdf')</th>
                            <th>@lang('crud.sermons.inputs.title')</th>
                            <th>@lang('crud.sermons.inputs.description')</th>
                            <th>@lang('crud.sermons.inputs.price')</th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sermons as $sermon)
                        <tr>
                            <td>
                                {{ optional($sermon->minister)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($sermon->event)->title ?? '-' }}
                            </td>
                            <td>
                                <img
                                    src="{{ $sermon->cover ? \Storage::url($sermon->cover) : '' }}"
                                    style="object-fit: cover; width: 50px; height: 50px; border: 1px solid #ccc;"
                                />
                            </td>
                            <td>
                                @if($sermon->audio)
                                <a
                                    href="{{ \Storage::url($sermon->audio) }}"
                                    target="blank"
                                    ><i class="icon ion-md-download"></i
                                    >&nbsp;Download</a
                                >
                                @else - @endif
                            </td>
                            <td>
                                @if($sermon->video)
                                <a
                                    href="{{ \Storage::url($sermon->video) }}"
                                    target="blank"
                                    ><i class="icon ion-md-download"></i
                                    >&nbsp;Download</a
                                >
                                @else - @endif
                            </td>
                            <td>
                                @if($sermon->pdf)
                                <a
                                    href="{{ \Storage::url($sermon->pdf) }}"
                                    target="blank"
                                    ><i class="icon ion-md-download"></i
                                    >&nbsp;Download</a
                                >
                                @else - @endif
                            </td>
                            <td>{{ $sermon->title ?? '-' }}</td>
                            <td>{{ $sermon->description ?? '-' }}</td>
                            <td>{{ $sermon->price ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $sermon)
                                    <a
                                        href="{{ route('sermons.edit', $sermon) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $sermon)
                                    <a
                                        href="{{ route('sermons.show', $sermon) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $sermon)
                                    <form
                                        action="{{ route('sermons.destroy', $sermon) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $sermons->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
