@extends('index')
@section('section')


<!-- ======= Chefs Section ======= -->
{{-- @foreach ($chefs as $c) --}}
<section id="chefs" class="chefs">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>{{ trans('panel.frontend.chefs.chefs_1') }}</h2>
        <p>{{ trans('panel.frontend.chefs.chefs_2') }}</p>
      </div>
   {{-- @endforeach --}}
   <div class="row">
    @forelse ($chefs as $ch)
    <div class="col-lg-4 col-md-6">
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
            @if($ch->getFirstMediaUrl('image', 'priview'))
                <img src="{{ $ch->getFirstMediaUrl('image', 'priview') }}" class="img-fluid" alt="{{ $ch->title }}" />
            @else
                <p>{{ trans('panel.frontend.error.img') }}</p>
            @endif
            <div class="member-info">
                <div class="member-info-content">
                    @isset($ch->nama)
                        <h4>{!! $ch->nama !!}</h4>
                    @else
                        <h4>Error: Name not available</h4>
                    @endisset

                    @isset($ch->position)
                        <span>{!! $ch->position !!}</span>
                    @else
                        <span>Error: Position not available</span>
                    @endisset
                </div>
                {{-- <div class="social">
                    @forelse ($icon as $i)
                        <a href=""><i class="{!! $i->icon !!}"></i></a>
                    @empty
                        <p>Error: Icons not available</p>
                    @endforelse
                </div> --}}
            </div>
        </div>
    </div>
    @empty
        <div class="col-12">
            <p>Error: No chefs available</p>
        </div>
    @endforelse
</div>

    </div>
  </section>
  <!-- End Chefs Section -->

@endsection