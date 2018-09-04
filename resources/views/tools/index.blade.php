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

                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <h2 class="mt-0 mb-4">Laravel Tools & Resources</h2>

                            <p>Here is a small list of useful tools and resources that can make every laravel developer´s life easier 🤩</p>

                            <ul>
                                @foreach(\App\Models\Resource::where('is_published', true)->get() as $resource)
                                    <li><a href="{{ $resource->url }}">{{ $resource->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
