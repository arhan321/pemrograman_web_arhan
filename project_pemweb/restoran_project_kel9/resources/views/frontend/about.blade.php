@extends('index')

@section('section')

@forelse ($About as $a)
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              @if($a->getFirstMediaUrl('image', 'priview'))
                <img src="{{ $a->getFirstMediaUrl('image', 'priview') }}" alt="{{ $a->title }}" />
              @else
                <p>{{ trans('panel.frontend.error.img') }}</p>
              @endif
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            @isset($a->title)
              <h3>{!! $a->title !!}</h3>
            @else
              <h3>{{ trans('panel.frontend.error.title') }}</h3>
            @endisset

            @isset($a->description)
              <p class="fst-italic">{!! $a->description !!}</p>
            @else
              <p class="fst-italic">Error: Description not available</p>
            @endisset
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->  
@empty
  <main id="main">
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h3>Error: No about section available</h3>
          </div>
        </div>
      </div>
    </section>
@endforelse

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">
    @foreach ($whyus as $ab)
    <div class="section-title" style="margin-bottom: -30px;">
      <h2>{!! $ab->title_1 !!}</h2>
      <p>{!! $ab->title_2 !!}</p>
    </div>
    @endforeach
    
    <div class="row">
      @forelse ($whyus as $abo)
        <div class="col-lg-4 col-md-4">
          <div class="box" data-aos="zoom-in" data-aos-delay="100">
            @isset($abo->nomor_box)
              <span>{!! $abo->nomor_box !!}</span>
            @else
              <span>Error: Box number not available</span>
            @endisset

            @isset($abo->description_box_1)
              <h4>{!! $abo->description_box_1 !!}</h4>
            @else
              <h4>Error: Box description 1 not available</h4>
            @endisset

            @isset($abo->description_box_2)
              <p>{!! $abo->description_box_2 !!}</p>
            @else
              <p>Error: Box description 2 not available</p>
            @endisset
          </div>
        </div>
      @empty
        <div class="col-12">
          <p>Error: No box items available</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
<!-- End Why Us Section -->

@endsection
