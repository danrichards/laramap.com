@extends('layouts.default')

@section('page_title')

@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <mapbox
        access-token="pk.eyJ1IjoiZndhcnRuZXIiLCJhIjoiY2lyYWxwaDlmMDA0YWk5bWd2cjd1cHk1OCJ9.kzizG2lpFQU3tsuhfZBrGQ"
        :map-options="{
          style: 'mapbox://styles/fwartner/cjgrusaz600122sp5wqz54wb4',
          center: [-0, 0],
          zoom: 1
        }"
        :fullscreen-control="{
          show: true,
          position: 'top-left'
        }">
    </mapbox>
    <home-map></home-map>
@endsection

@push('footer_scripts')

@endpush
