@extends('index')
@section( 'section')

<!-- ======= Gallery Section ======= -->
{{-- @foreach ($galery as $g) --}}
<section id="gallery" class="gallery">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>{{ trans('panel.frontend.galery.galery_1') }}</h2>
        <p>{{ trans('panel.frontend.galery.galery_2') }}</p>
      </div>
    </div>
    {{-- @endforeach --}}
   
    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-0">
          @forelse ($galery as $g)
          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                  @if($g->getFirstMediaUrl('image', 'priview'))
                      <a href="{{ $g->getFirstMediaUrl('image', 'priview') }}" class="gallery-lightbox" data-gall="gallery-item">
                          <img src="{{ $g->getFirstMediaUrl('image', 'priview') }}" alt="{{ $g->title }}" class="img-fluid"/>
                      </a>
                  @else
                      <p>Error: Image not found</p>
                  @endif
              </div>
          </div>
          @empty
              <div class="col-12">
                  <p>Error: No gallery items available</p>
              </div>
          @endforelse
      </div>
  </div>
  </section>
  <!-- End Gallery Section -->


@endsection
