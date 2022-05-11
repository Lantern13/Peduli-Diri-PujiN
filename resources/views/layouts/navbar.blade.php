<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <!-- Search -->
    <div class="row">
      <form role="form" method="get" action="/cari">
        {{csrf_field()}}
        <div class="col">

          <select onchange="yesnoCheck(this);" class="custom-select btn-primary btn-outline-dark" type="search">
            <option value="lokasi">Lokasi</option>
            <option value="tanggal">Tanggal</option>
            <option value="waktu">Waktu</option>
            <option value="suhu">Suhu</option>
            <!-- <option value="nama">Nama</option> -->
          </select>

        </div>

        <div class="mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" id="navbar">
          <div class="input-group">
            <button class="input-group-text text-body" id="ifBtnlokasi" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
            <input name="lokasi" id="iflokasi" class="form-control" type="search" placeholder="Cari Lokasi" aria-label="Search" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
          <div class="input-group">
            <button class="input-group-text text-body" id="ifBtntanggal" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
            <input name="tanggal" id="iftanggal" style="display:none;" class="form-control" type="search" placeholder="Cari Tanggal" aria-label="Search" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
          <div class="input-group">
            <button class="input-group-text text-body" id="ifBtnwaktu" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
            <input name="waktu" id="ifwaktu" style="display:none;" class="form-control" type="search" placeholder="Cari Waktu" aria-label="Search" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
          <div class="input-group">
            <button class="input-group-text text-body" id="ifBtnsuhu" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
            <input name="suhu" id="ifsuhu" style="display:none;" class="form-control" type="search" placeholder="Cari Suhu" aria-label="Search" onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
      </form>
    </div>
    <!-- <div class="mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" id="navbar">
      <div class="input-group">
        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
        <input type="text" class="form-control" placeholder="Type here..." onfocus="focused(this)" onfocusout="defocused(this)">
      </div>
    </div> -->

    <!-- Konten Navbar -->
    <div class="ms-md-auto pe-md-3 d-flex align-items-center" id="navbar">
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ni ni-circle-08 me-sm-1" aria-hidden="true"></i>
            <span class="d-sm-inline d-none">{{auth()->user()->nama}}</span>
          </a>
          <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="/logout">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <i class="ni ni-user-run me-3" aria-hidden="true"></i>
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">LOGOUT</span>
                    </h6>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  function yesnoCheck(that) {
    if (that.value == "lokasi") {
      document.getElementById("iflokasi").style.display = "block";
      document.getElementById("ifBtnlokasi").style.display = "block";

      document.getElementById("iftanggal").style.display = "none";
      document.getElementById("ifBtntanggal").style.display = "none";

      document.getElementById("ifwaktu").style.display = "none";
      document.getElementById("ifBtnwaktu").style.display = "none";

      document.getElementById("ifsuhu").style.display = "none";
      document.getElementById("ifBtnsuhu").style.display = "none";

      document.getElementById("ifnama").style.display = "none";
      document.getElementById("ifBtnNama").style.display = "none";

    } else if (that.value == "tanggal") {
      document.getElementById("iflokasi").style.display = "none";
      document.getElementById("ifBtnlokasi").style.display = "none";

      document.getElementById("iftanggal").style.display = "block";
      document.getElementById("ifBtntanggal").style.display = "block";

      document.getElementById("ifwaktu").style.display = "none";
      document.getElementById("ifBtnwaktu").style.display = "none";

      document.getElementById("ifsuhu").style.display = "none";
      document.getElementById("ifBtnsuhu").style.display = "none";

      document.getElementById("ifnama").style.display = "none";
      document.getElementById("ifBtnNama").style.display = "none";

    } else if (that.value == "waktu") {
      document.getElementById("iflokasi").style.display = "none";
      document.getElementById("ifBtnlokasi").style.display = "none";

      document.getElementById("iftanggal").style.display = "none";
      document.getElementById("ifBtntanggal").style.display = "none";

      document.getElementById("ifwaktu").style.display = "block";
      document.getElementById("ifBtnwaktu").style.display = "block";

      document.getElementById("ifsuhu").style.display = "none";
      document.getElementById("ifBtnsuhu").style.display = "none";

      document.getElementById("ifnama").style.display = "none";
      document.getElementById("ifBtnNama").style.display = "none";

    } else {
      document.getElementById("iflokasi").style.display = "none";
      document.getElementById("ifBtnlokasi").style.display = "none";

      document.getElementById("iftanggal").style.display = "none";
      document.getElementById("ifBtntanggal").style.display = "none";

      document.getElementById("ifwaktu").style.display = "none";
      document.getElementById("ifBtnwaktu").style.display = "none";

      document.getElementById("ifsuhu").style.display = "block";
      document.getElementById("ifBtnsuhu").style.display = "block";

      document.getElementById("ifnama").style.display = "none";
      document.getElementById("ifBtnNama").style.display = "none";

    }

  }
</script>