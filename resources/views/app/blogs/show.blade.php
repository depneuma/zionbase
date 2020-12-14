@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('blogs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.blogs.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.blogs.inputs.user_id')</h5>
                    <span>{{ optional($blog->author)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.blogs.inputs.title')</h5>
                    <span>{{ $blog->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.blogs.inputs.body')</h5>
                    <span>{{ $blog->body ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.blogs.inputs.image')</h5>
                    <img
                        src="{{ $blog->image ? \Storage::url($blog->image) : '' }}"
                        style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Blog::class)
                <a href="{{ route('blogs.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
