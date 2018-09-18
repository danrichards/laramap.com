@extends('layouts.default')

@section('page_title')
    Users in {{ $city }}, {{ $country }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page">
        <div class="page-single">
            <div class="container">
                <user-list-by-city country="{{ $country }}" city="{{ $city }}"></user-list-by-city>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
