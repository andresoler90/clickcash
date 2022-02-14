<!-- Footer -->
<footer class="bg-white iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('privacy_policy') }}">Politica de Privacidad</a></li>
                    <li class="list-inline-item"><a href="{{ route('terms_of_service') }}">Terminos de Uso</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright 2021 <a href="https://strongbox250.com/">Strongbox250</a> Todos los Derechos Reservados.
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
<!-- Optional JavaScript -->
@include('partials._body_scripts')
@yield('body_bottom')
