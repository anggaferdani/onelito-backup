<style>
    @media screen and (max-width: 600px) {
        .font-footer {
            font-size:
        }

        a {
            font-size: 10px !important;
        }

        h4 {
            font-size: 12px !important;
        }

        h5 {
            font-size: 11px !important;
        }

        h6 {
            font-size: 10px !important;
        }

        p {
            font-size: 10px !important;
        }
    }
</style>
<div class="container-fluid" style="background-color: black;
 height = 31hv">
    <div class="row">
        <div class="col-3 col-lg-3 py-4 text-center">
            <img src="{{ url('img/onelito_wa.jpeg') }}" alt="ONELITO" class="p-lg-5 py-5 w-75">
        </div>
        <div class="col-4 col-lg-6">
            <nav class="justify-content-center navbar navbar-dark navbar-expand-lg py-5">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'home' ? 'active text-danger' : '' }}"href="/home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ $title === 'auction' ? 'active text-danger' : '' }}"href="/auction">AUCTION</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ $title === 'onelito_store' ? 'active text-danger' : '' }}"href="/onelito_store">ONELITO
                            STORE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'koi_stok' ? 'active text-danger' : '' }}"href="/koi_stok">KOI
                            STOCK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'login' ? 'active text-danger' : '' }}"href="/profil"><i
                                class="fa-solid fa-circle-user" style="font-size: x-large"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-5 col-lg-3 justify-content-center mx-auto py-5 row">
            <nav class="navbar-dark p-0">
                <ul class="list-unstyled mr-auto">
                    <li class="nav-item">
                        <p class="active  nav-link text-danger m-0" aria-current="page">SUBSCRIBE US</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page"
                            href="https://www.instagram.com/onelitokoi.id/?hl=id">
                            <i class="fa-brands fa-instagram"></i>
                            @Onelitokoi.id</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#"><i
                                class="fa-brands fa-facebook"></i> @Onelito koi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page"
                            href="https://www.youtube.com/channel/UCbhkQaiMUPUVQWw5KBLT0Bw"><i
                                class="fa-brands fa-youtube"></i> Onelito koi</a>
                    </li>
                </ul>
        </div>
    </div>
</div>
