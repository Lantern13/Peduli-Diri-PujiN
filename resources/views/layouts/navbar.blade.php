<nav class="navbar navbar-expand-lg main-navbar">

  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
  </ul>

  <form class="form-inline mr-auto" method="get" action="/cari">
    {{csrf_field()}}
    <div class="col-auto">

      <select onchange="yesnoCheck(this);" class="custom-select btn-success" type="search">
        <option value="lokasi">Lokasi</option>
        <option value="tanggal">Tanggal</option>
        <option value="waktu">Waktu</option>
        <option value="suhu">Suhu</option>
        <!-- <option value="nama">Nama</option> -->
      </select>

    </div>

    <div class="col">
      <div class="form-group">
        <input name="lokasi" id="iflokasi" class="form-control" type="search" placeholder="Cari Lokasi" aria-label="Search">
        <button class="btn btn-outline-dark" id="ifBtnlokasi" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </div>
      <div class="form-group">
        <input name="tanggal" id="iftanggal" style="display:none;" class="form-control" type="search" placeholder="Cari Tanggal" aria-label="Search">
        <button class="btn btn-outline-dark" id="ifBtntanggal" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </div>
      <div class="form-group">
        <input name="waktu" id="ifwaktu" style="display:none;" class="form-control" type="search" placeholder="Cari Waktu" aria-label="Search">
        <button class="btn btn-outline-dark" id="ifBtnwaktu" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </div>
      <div class="form-group">
        <input name="suhu" id="ifsuhu" style="display:none;" class="form-control" type="search" placeholder="Cari Suhu" aria-label="Search">
        <button class="btn btn-outline-dark" id="ifBtnsuhu" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </div>
      <!-- <div class="form-group">
        <input name="nama" id="ifnama" style="display:none;" class="form-control" type="search" placeholder="Cari Nama" aria-label="Search">
        <button class="btn btn-outline-dark" id="ifBtnNama" style="display:none;" class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </div> -->
    </div>
  </form>

  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">{{auth()->user()->nama}}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="#" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
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

    }
    // else if (that.value == "nama") {
    //   document.getElementById("iflokasi").style.display = "none";
    //   document.getElementById("ifBtnlokasi").style.display = "none";

    //   document.getElementById("iftanggal").style.display = "none";
    //   document.getElementById("ifBtntanggal").style.display = "none";

    //   document.getElementById("ifwaktu").style.display = "none";
    //   document.getElementById("ifBtnwaktu").style.display = "none";

    //   document.getElementById("ifsuhu").style.display = "none";
    //   document.getElementById("ifBtnsuhu").style.display = "none";

    //   document.getElementById("ifnama").style.display = "block";
    //   document.getElementById("ifBtnNama").style.display = "block";

    // } 
    else {
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