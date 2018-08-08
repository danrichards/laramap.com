@extends('layouts.default')

@section('page_title')
    {{ $thread->title }}
@endsection

@push('header_styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <single-thread :threadid="{{ $thread->id }}"></single-thread>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
