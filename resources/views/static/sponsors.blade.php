@extends('layouts.default')

@section('page_title')
    Sponsors
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <sponsor-list></sponsor-list>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
