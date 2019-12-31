@section('footer')

<footer>
    {{-- <div class="footer-content container">
        <div class="footer-content__item mb-6">
            <a class="footer-content__item__title" href="#">
                Wynajmnik.pl
            </a>
        </div>
        <div class="footer-content__item">
            <p class="footer-content__item__subtitle">Twoje konto</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#" >Logowanie</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">Rejestracja</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">Ustawienia</a>
                </li>
            </ul>
        </div>
        <div class="footer-content__item">
            <p class="footer-content__item__subtitle">Informacje</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#">Regulamin</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">Polityka
                        prywatności</a>
                </li>
            </ul>
        </div>
        <div class="footer-content__item">
            <p class="footer-content__item__subtitle">Social Media</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#">Facebook</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">Instagram</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">Twitter</a>
                </li>
            </ul>
        </div>
        <div class="footer-content__item">
            <p class="footer-content__item__subtitle">Wynajmnik.pl</p>
            <ul class="list-reset mb-6">
                <li class="footer-content__item__li">
                    <a href="#">O nas</a>
                </li>
                <li class="footer-content__item__li">
                    <a href="#">Kontakt</a>
                </li>
            </ul>
        </div>
    </div> --}}

    <div class="flex items-center justify-center py-3 bg-gray-900">
        <div>
            <span class="font-semibold tracking-tight">
                {{ __('base.siteName') }} {{ date('Y') }}
            </span>
            <span>
                {{ __('base.rights') }}
            </span>
        </div>
    </div>
</footer>

@endsection