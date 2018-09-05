@extends('layouts.default')

@section('page_title')
    Tools & Resources
@endsection

@push('header_styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="page-header">
                    <h1 class="page-title">
                        Tools & Resources
                    </h1>
                </div>

                <div class="container">
                    <div class="row">
                        @foreach(\App\Models\Resource::where('is_published', true)->get() as $resource)
                            <div class="card col-3">
                                <a href="{{ $resource->url}}">
                                    <img class="card-img-top" src="{{ $resource->header_image }}" alt="{{ $resource->slug }}">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h4><a href="{{ $resource->url}}">{{ $resource->title }}</a></h4>
                                    <div class="text-muted">{{ $resource->body }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
