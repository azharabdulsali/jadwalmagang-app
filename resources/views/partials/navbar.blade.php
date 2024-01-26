<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
      <a class="navbar-brand" href="/jadwalMagang">Jadwal Magang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link {{ ($title === "Mahasiswa") ? 'active' : '' }}" href="/mahasiswa">Mahasiswa</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ ($title === "Dosen Pembimbing") ? 'active' : '' }}" href="/dospem">Dosen Pembimbing</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ ($title === "Tempat Magang") ? 'active' : '' }}" href="/tempatMagang">Tempat Magang</a>
              </li>
          </ul>
          <ul class="navbar-nav ms-auto">
              @if(Auth::check())
                  <li class="nav-item">
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-link">Logout</button>
                      </form>
                  </li>
              @else
                  <li class="nav-item">
                      <a href="/login" class="nav-link">Login</a>
                  </li>
              @endif
          </ul>
      </div>
  </div>
</nav>
