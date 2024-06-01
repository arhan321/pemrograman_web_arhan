@extends('index')
@section('section')

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>{{ trans('panel.frontend.testimonials.testimonials_1') }}</h2>
        <p>{{ trans('panel.frontend.testimonials.testimonials_2') }}</p>
      </div>

      <div
        class="testimonials-slider swiper-container"
        data-aos="fade-up"
        data-aos-delay="100"
      >
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Saya sangat terkesan dengan pengalaman makan saya di Han`s
                Resto. Dari suasana yang hangat hingga hidangan yang lezat,
                semuanya luar biasa. Pelayanan yang ramah dan profesional
                membuat saya merasa benar-benar istimewa."
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img
                src="frontend/assets/img/testimonials/anya.png"
                class="testimonial-img"
                alt=""
              />
              <h3>Anya Geraldine</h3>
              <h4>Selebgram</h4>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Han`s restaurant adalah tempat yang sempurna untuk makan
                malam romantis. Makanan yang lezat dan presentasi yang
                menakjubkan membuat kami terpesona. Kami pasti akan kembali
                lag
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img
                src="frontend/assets/img/testimonials/rigen.png"
                class="testimonial-img"
                alt=""
              />
              <h3>Rigen</h3>
              <h4>Komedian</h4>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Han`s restaurant telah menjadi tempat favorit saya untuk
                bersantap. Hidangan mereka selalu segar dan penuh rasa, dan
                suasana restoran sangat mengundang. Ini adalah tempat yang
                sempurna untuk menikmati waktu bersama keluarga dan
                teman-teman
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img
                src="frontend/assets/img/testimonials/anastasya.png"
                class="testimonial-img"
                alt=""
              />
              <h3>Anastasya</h3>
              <h4>Influencer</h4>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Saya telah mencoba banyak restoran di sekitar, tetapi Han`s
                Resto benar-benar menonjol. Hidangan mereka adalah kombinasi
                sempurna antara rasa dan kreativitas. Saya sangat
                merekomendasikan untuk dicoba
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img
                src="frontend/assets/img/testimonials/pesulap1.png"
                class="testimonial-img"
                alt=""
              />
              <h3>Pesulap Merah</h3>
              <h4>Tukang Sulap</h4>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Menu yang disajikan sangat proper sekali dengan harga yang
                juga proper
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img
                src="frontend/assets/img/testimonials/gibran.png"
                class="testimonial-img"
                alt=""
              />
              <h3>Gibran Rakabuming</h3>
              <h4>Wakil Presiden 2024-2029</h4>
            </div>
          </div>
          <!-- End testimonial item -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- End Testimonials Section -->

  <!-- ======= Book A Table Section ======= -->

  <section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
      <div class="form-container">
        <div class="section-title">
          <h2>Suggestion Table</h2>
          <p>Your feedback is valuable to us. Please fill out the form below.</p>
        </div>
        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="text-center" style="margin-top: 1%">
            <button type="submit" class="book-a-table-btn">Send</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  
  <!-- End Book A Table Section -->

  {{-- <script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.abouts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($about) && $about->image)
      var file = {!! json_encode($about->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script> --}}

@endsection