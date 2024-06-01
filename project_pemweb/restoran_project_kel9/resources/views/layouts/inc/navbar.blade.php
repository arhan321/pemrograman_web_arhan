<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-center justify-content-md-between">
    @foreach ($footer as $f)
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-phone d-flex align-items-center"><span class="speak">{!! $f->phone !!}</span></i>
      <i class="bi bi-clock d-flex align-items-center ms-4"><span class="speak">{!! $f->opening_day !!} {{ $f->opening_hours }} AM - {{ $f->closing_hours }} PM</span></i>
    </div>
    @endforeach
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
  @foreach ($footer as $fo)
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
    <h1 class="logo me-auto me-lg-0 speak">
      <img src="assets/img/logo.png" alt="" />
      <a href="{{ route('frontend.home') }}">{!! $fo->logo_restoran !!}</a>
    </h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.home') }}">{{ trans('panel.frontend.usefullinks.Home') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.about') }}">{{ trans('panel.frontend.usefullinks.Abouts') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.menu') }}">{{ trans('panel.frontend.usefullinks.Menu') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.signature') }}">{{ trans('panel.frontend.usefullinks.Signature') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.testimonial') }}">{{ trans('panel.frontend.usefullinks.Testimonials') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.galery') }}">{{ trans('panel.frontend.usefullinks.Galery') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('frontend.chefs') }}">{{ trans('panel.frontend.usefullinks.Chefs') }}</a></li>
        <li><a class="nav-link scrollto speak" href="https://wa.me/6282113862854">{{ trans('panel.frontend.usefullinks.Contact') }}</a></li>
        <li><a class="nav-link scrollto speak" href="{{ route('layouts.reservasi') }}">{{ trans('panel.frontend.usefullinks.reservation') }}</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <a id="tombol" href="{{ route('layouts.reservasi') }}" class="book-a-table-btn scrollto d-none d-lg-flex speak">{{ trans('panel.frontend.usefullinks.reservation') }}</a>
  </div>
  @endforeach
</header>
<!-- End Header -->

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const elements = document.querySelectorAll('.speak');

    // function get voice wanita Indonesia
    function getIndonesianFemaleVoice() {
      const voices = speechSynthesis.getVoices();
      // Spesifik suara wanita dari Google bahasa Indonesia
      return voices.find(voice => voice.lang === 'id-ID' && voice.name.includes('Google'));
    }

    // Ngeluarin suara wanita 
    speechSynthesis.onvoiceschanged = () => {
      const indonesianVoice = getIndonesianFemaleVoice();

      elements.forEach(element => {
        element.addEventListener('mouseover', function () {
          // Cek jika speechSynthesis tidak sedang berbicara
          if (!speechSynthesis.speaking) {
            const textToSpeak = element.textContent;
            const utterance = new SpeechSynthesisUtterance(textToSpeak);
            if (indonesianVoice) {
              utterance.voice = indonesianVoice;
            }
            speechSynthesis.speak(utterance);
          }
        });
      });
    };
  });

    //membuat tulisan reservasi ketika di tampilan mobile baru muncul
    document.addEventListener('DOMContentLoaded', function () {
    const reservationLink = document.querySelector('#navbar .nav-link.scrollto.speak[href*="reservasi"]');
    const reservationButton = document.getElementById('tombol');

    function updateVisibility() {
      if (window.innerWidth <= 768) {
        reservationLink.style.display = 'block';
        reservationButton.style.display = 'none';
      } else {
        reservationLink.style.display = 'none';
        reservationButton.style.display = 'flex';
      }
    }

    // Initial check
    updateVisibility();

    // Update visibility on window resize
    window.addEventListener('resize', updateVisibility);
  });
</script>
  