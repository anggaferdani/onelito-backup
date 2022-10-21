<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ url('img/oneli.svg') }}" alt="ONELITO">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse flex-grow-0 navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'home') ? 'active text-danger' : '' }}"href="/">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'auction') ? 'active text-danger' : '' }}"href="/auction">AUCTION</a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ ($title === 'onelito_store') ? 'active text-danger' : '' }}"href="/onelito_storelog">ONELITO STORE</a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ ($title === 'koi_stok') ? 'active text-danger' : '' }}"href="/koi_stoklog">KOI STOCK</a>
          </li>
           <li class="nav-item">
            <a class="nav-link {{ ($title === 'login') ? 'active text-danger' : '' }}"href="/profil"><i class="fa-solid fa-circle-user" style="font-size: x-large"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
