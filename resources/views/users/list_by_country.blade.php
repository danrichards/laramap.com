@extends('layouts.default')

@section('page_title')
    Users in {{ $country }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <user-list-by-country country="{{ $country }}"></user-list-by-country>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
