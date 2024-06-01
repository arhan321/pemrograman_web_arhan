<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        @if(!empty($footer))
          @foreach ($footer as $f)
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              @if(isset($f->logo_restoran))
              <h3>{!! $f->logo_restoran !!}</h3>
              @endif
              @if(isset($f->alamat))
              <p>{!! $f->alamat !!}</p>
              @endif
            </div>
          </div>
          @endforeach
         @else
          <div class="col-lg-12">
            <p>No footer data available.</p>
          </div>
          @endif
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>{{ trans('panel.frontend.Footer.usefullinks') }}</h4>
              <ul>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="{{ route('frontend.home') }}">{{ trans('panel.frontend.usefullinks.Home') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="{{ route('frontend.about') }}">{{ trans('panel.frontend.usefullinks.Abouts') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="{{ route('frontend.menu') }}">{{ trans('panel.frontend.usefullinks.Menu') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="{{ route('frontend.signature') }}">{{ trans('panel.frontend.usefullinks.Signature') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="{{ route('frontend.testimonial') }}">{{ trans('panel.frontend.usefullinks.Testimonials') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="{{ route('frontend.galery') }}">{{ trans('panel.frontend.usefullinks.Galery') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="{{ route('frontend.chefs') }}">{{ trans('panel.frontend.usefullinks.Chefs') }}</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="https://wa.me/6282113862854">{{ trans('panel.frontend.usefullinks.Contact') }}</a>
                </li>
              </ul>
            </div>
            @if(!empty($footer))
            @foreach ($footer as $fo)
            <div class="col-lg-3 col-md-6 footer-links">
                @if(isset($fo->opening_day) || isset($fo->opening_hours) || isset($fo->closing_hours))
                <h4>{{ trans('panel.frontend.Footer.openinghours') }}</h4>
                <ul>
                    @if(isset($fo->opening_day))
                    <li>{!! $fo->opening_day !!}</li>
                    @endif
                    @if(isset($fo->opening_hours) && isset($fo->closing_hours))
                    <li>{!! $fo->opening_hours !!} - {!! $fo->closing_hours !!}</li>
                    @endif
                </ul>
                @endif
            </div>
         
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>{{ trans('panel.frontend.Footer.contact') }}</h4>
              <p>
                <strong>{{ trans('panel.frontend.Footer.phone') }}</strong> {!! $fo->phone !!}<br />
                  <strong>{{ trans('panel.frontend.Footer.email') }}</strong> {!! $fo->email !!}<br />
              </p>
              <!-- <form action="" method="post">
                <input type="email" name="email" /><input
                  type="submit"
                  value="Subscribe"
                />
              </form> -->
            </div>
            @endforeach
            @else
              <div class="col-lg-12">
                <p>No data available.</p>
              </div>
            @endif
          </div>
        </div>
      </div>
      @foreach ($footer as $fot)
      <div class="container">
        <div class="copyright">
          &copy; {{ trans('panel.frontend.Footer.copyright') }} <strong><span>{!! $fot->copyright !!}</span></strong
          >. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
          {{ trans('panel.frontend.Footer.desain_by') }} <a href="https://bootstrapmade.com/">{!! $fot->desain_by !!}</a>
        </div>
      </div>
      @endforeach
      @if ($footer->isEmpty())
      <div class="container">
        <div class="col-lg-12">
          <p>No footer data available.</p>
        </div>
      </div>
      @endif
    </footer>
    <!-- End Footer -->
    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>
