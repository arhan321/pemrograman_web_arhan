@extends('index')

@section('section')

  <!-- ======= Menu Section ======= -->
  <section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>{{ trans('panel.frontend.menu.menu_1') }}</h2>
        <p>{{ trans('panel.frontend.menu.menu_2') }}</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
                <li data-filter="*" class="filter-active">All</li>
                <!-- filter berdasarkan category pada model product -->
                @forelse(\App\Models\Product::CATEGORY_SELECT as $key => $value)
                    <li data-filter=".filter-{{ strtolower(str_replace(' ', '-', $key)) }}">{{ $value }}</li>
                @empty
                    <li>{{ trans('panel.frontend.menu.if_error_category') }}</li>
                @endforelse
            </ul>
        </div>
    </div>
      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
        @forelse ($products as $p)
            <div class="col-lg-6 menu-item filter-{{ strtolower(str_replace(' ', '-', $p->category)) }}">
              <img src="{{ $p->getFirstMediaUrl('image', 'preview') }}" class="menu-img" alt="{{ $p->name }}"/>
              <div class="menu-content">
                <a href="#">{{ $p->name }}</a><span>Rp.{{$p->price}}</span>
              </div>
              <div class="menu-ingredients">
                {{$p->description}}
              </div>
            </div>
        @empty
            <div class="col-lg-12">
                <p>{{ trans('panel.frontend.menu.if_error_menu') }}</p>
            </div>
        @endforelse
      </div>
    </div>
  </section>

@endsection
