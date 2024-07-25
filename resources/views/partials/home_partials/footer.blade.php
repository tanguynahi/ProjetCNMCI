@php
    use App\Models\Parametre;
    $parametre = Parametre::whereId(1)->first();
@endphp
<div class="section footer mt-3" style="background-color: #5c5c5a; color:white;">
    <div class="container">
        <div class="row g-3 mb-4">
            <div class="col-lg-4 col-md-6 col-12">
                <h3 class="mb-1 fw-bold color-900">
                    <a href="#">
                        <img src="{{ $parametre->lien_logo }}" style="height: 100px; width:100px;" alt="Image Logo">
                    </a>
                </h3>
                <p>Vous pouvez nous joindre :</p>
                <a href="">
                    <span><i class="bi bi-geo-alt"></i> : {{ $parametre->adresse }} </span>
                </a><br>
                <a href="mailto:{{ $parametre->email_1 }}">
                    <span><i class="bi bi-envelope"></i> : {{ $parametre->email_1 }} </span>
                </a><br>
                @if ($parametre->email_2 != null)
                    <a href="mailto:{{ $parametre->email_2 }}">
                        <span><i class="bi bi-envelope"></i> : {{ $parametre->email_2 }} </span>
                    </a><br>
                @endif
                <a href="tel:{{ $parametre->contact_1 }}">
                    <span><i class="bi bi-telephone"></i> : {{ $parametre->contact_1 }} </span>
                </a> <br>
                @if ($parametre->contact_2 != null)
                    <a href="tel:{{ $parametre->contact_2 }}">
                        <span><i class="bi bi-telephone"></i> : {{ $parametre->contact_2 }} </span>
                    </a>
                @endif
            </div>
            <div class="col-lg-8 col-12">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <h5><a class="color-600" target="_blank" href="#" style="color: white;">A propos</a></h5>
                        <h5>
                            <a class="color-600" target="_blank" href="{{ route('accueil') }}#faq"
                                style="color: white;">FAQ
                            </a>
                        </h5>
                        <h5>
                            <a class="color-600" target="_blank" href="#" style="color: white;">Contact</a>
                        </h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <h5><a class="color-600" href="#" style="color: white;">Communauté</a></h5>
                        <h5><a class="color-600" href="#" style="color: white;">Centre d'aide</a></h5>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <h5 class="mb-4 color-900" style="color: white;">Réjoignez notre newsletter</h5>
                        <p class="text-while">Abonnez-vous pour recevoir les dernières offres de Service...
                        </p>
                        <form>
                            <div class="form-floating mb-1">
                                <input type="email" class="form-control rounded"
                                    placeholder="inscrivez vous à la Newsletter">
                                <label style="color: rgb(16, 16, 17);">Inscrivez vous à la Newsletter</label>
                            </div>
                            <center>
                                <button type="button" class="btn btn-block btn-primary"><i class="bi bi-envelope"></i>
                                    S'Inscrire!</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- .row end -->
        <div class="row g-3 border-top pt-3">
            <div class="col-lg-6 col-md-6 col-12 text-center text-lg-start">
                <span>© {{ date('Y') }} <a href="#" rel="nofollow"
                        target="_blank">{{ $parametre->nom_site_web }}</a>. Tous droits réservé.</span>
            </div>
            <div class="col-lg-6 col-md-6 col-12 text-center text-lg-end">
                <ul class="list-unstyled d-flex justify-content-center justify-content-lg-end mb-0">
                    <li><a class="p-1 ms-2" style="color:#0d6dfc" href="{{ $parametre->lien_facebook }}"><i
                                class="bi bi-facebook"></i>
                            Facebook</a></li>
                    <li><a class="p-1 ms-2" href="{{ $parametre->lien_whatsapp }}" style="color:#1a8754"><i
                                class="bi bi-whatsapp"></i>
                            WhatsApp</a></li>
                    <li><a class="p-1 ms-2" href="{{ $parametre->lien_twitter }}" style="color: #1c9ae8"><i
                                class="bi bi-twitter"></i>
                            Twitter</a></li>
                    <li><a class="p-1 ms-2" href="{{ $parametre->lien_linkedin }}" style="color:#0963bd"><i
                                class="bi bi-linkedin"></i>
                            Linkedin</a></li>
                    <li><a class="p-1 ms-2" href="{{ $parametre->lien_instagram }}" style="color:#f7113f85"><i
                                class="bi bi-instagram"></i>
                            Instagram</a></li>
                    <li><a class="p-1 ms-2" href="{{ $parametre->lien_youtube }}" style="color:#f70000"><i
                                class="bi bi-youtube"></i>
                            Youtube</a></li>
                </ul>
            </div>
        </div> <!-- .row end -->
    </div>
</div>
