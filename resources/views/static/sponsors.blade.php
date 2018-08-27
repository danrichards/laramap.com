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
                <div class="page-header">
                    <h1 class="page-title">
                        Sponsors
                    </h1>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-wrap p-lg-6">
                            <section id="sponsors">
                                <h3 class="text-center">
                                    Our lovely sponsors
                                </h3>

                                <p class="text-center">Laramap could not be without our sponsors! That´s why we want to say thank you to all of our sponsors!</p>

                                <br>

                                <div class="row">
                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/DO_Logo_Horizontal_Blue.png') }}" alt="DigitalOcean" style="max-height: 40px;">
                                    </div>

                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/logo-algolia-nebula-blue-whitespaces-1b393e11.png') }}" alt="Algolia" style="max-height: 40px;">
                                    </div>

                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/pusher.png') }}" alt="Pusher" style="max-height: 40px;">
                                    </div>

                                    <div class="col-3 text-center">
                                        <img src="{{ asset('static/vultr.png') }}" alt="Vultr" style="max-height: 40px;">
                                    </div>
                                </div>
                            </section>

                            <hr width="50%">

                            <h4 class="text-center">
                                Want to sponsor Laramap?
                            </h4>

                            <p class="text-center">
                                Drop us a line on <a href="https://twitter.com/laramapcom">Twitter</a> and we´ll get in contact with you asap.
                            </p>

                            <div class="row justify-content-center">
                                <div class="col-md-2 ml-md-auto">
                                    <a href="https://www.buymeacoffee.com/fwartner" target="_blank">
                                        <img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" >
                                    </a>
                                </div>

                                <div class="col-md-2 mr-md-auto">
                                    <a href="https://www.patreon.com/bePatron?u=3200756" data-patreon-widget-type="become-patron-button">Become a Patron!</a><script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>
                                </div>
                            </div>

                            <br>

                            <div class="text-center" >

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush
