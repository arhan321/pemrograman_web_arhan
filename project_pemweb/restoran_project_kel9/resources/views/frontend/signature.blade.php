@extends('index')

@section('section')
<!-- ======= Specials Section ======= -->
<section id="signature" class="signature">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>{{ trans('panel.frontend.signature.signature_1') }}</h2>
            <p>{{ trans('panel.frontend.signature.signature_2') }}</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    @foreach ($categories as $index => $category)
                    <li class="nav-item">
                        <a class="nav-link @if ($loop->first) active show @endif" data-bs-toggle="tab" href="#tab-{{ $index }}">{{ $category }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    @foreach ($categories as $index => $category)
                    <div class="tab-pane @if ($loop->first) active show @endif" id="tab-{{ $index }}">
                        <div class="row">
                            @foreach ($signatures->where('category', $category) as $signature)
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>{{ $signature->product->name }}</h3>
                                <p class="fst-italic">{!! $signature->description !!}</p>
                                <p>{{ $signature->additional_description }}</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="{{ $signature->getFirstMediaUrl('image', 'preview') }}" class="img-fluid" alt="{{ $signature->name }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Specials Section -->
@endsection
