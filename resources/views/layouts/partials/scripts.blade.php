{{-- JQuery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

{{-- GSAP3 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.4/gsap.js"></script>

{{-- ScrollMagic --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/ScrollMagic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/plugins/animation.gsap.min.js"></script>

{{-- Custom --}}
<script src="{{ asset('/assets/js/app.js') }}" type="module"></script>

@yield('js')