@extends('index')
@section('section')

<!-- ======= Hero Section ======= -->
@forelse ($Home as $H)
<section id="hero" class="d-flex align-items-center">
    <div class="background-image">
        @if($H->getFirstMediaUrl('image', 'priview'))
            <img src="{{ $H->getFirstMediaUrl('image', 'priview') }}" alt="{{ $H->title }}" />
        @else
            <p>{{ trans('panel.frontend.img.error') }}</p>
        @endif
    </div>
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                @if(isset($H->title))
                    <h1>{{ $H->title }}</h1>
                @else
                    <h1>{{ trans('panel.frontend.error.title') }}</h1>
                @endif
                <!-- <h2>Delivering great food for more than 18 years!</h2> -->
                <!-- <div class="btns">
                    <a href="https://wa.me/6282113862854" class="btn-menu animated fadeInUp scrollto">Ask me</a>
                    <a href="reservasi.html" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
@empty
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Error: No hero section available</h1>
            </div>
        </div>
    </div>
</section>
@endforelse
<!-- End Hero -->

@endsection
