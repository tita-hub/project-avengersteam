<button id="tentangKamiBtn">
    Tentang Kami
</button>

<ul id="submenuTentang" style="display:none;">
    <li><a href="{{ route('profile.perusahaan') }}">Profile Perusahaan</a></li>
    <li><a href="{{ route('team.profile') }}">Team Profile</a></li>
    <li><a href="{{ route('wakil.pialang') }}">Wakil Pialang Avengers</a></li>
</ul>

<script>
document.getElementById('tentangKamiBtn')
.addEventListener('click', function() {

    let menu = document.getElementById('submenuTentang');

    if(menu.style.display === 'none'){
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
});
</script>

<!-- ========================= -->
<!-- PROSEDUR -->
<!-- ========================= -->

<button id="prosedurBtn" type="button">
    Prosedur
    <span id="prosedurArrow">›</span>
</button>

<ul id="submenuProsedur" style="display: none;">

    <!-- Pembukaan Rekening -->
    <li>
        <a href="{{ route('prosedur.pembukaan') }}">
            Pembukaan Rekening
        </a>
    </li>

    <!-- Penarikan -->
    <li>
        <a href="{{ route('prosedur.penarikan') }}">
            Penarikan
        </a>
    </li>

    <!-- Petunjuk Transaksi -->
    <li>
        <a href="{{ route('prosedur.petunjuk') }}">
            Petunjuk Transaksi
        </a>
    </li>

</ul>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const prosedurBtn = document.getElementById('prosedurBtn');
    const submenuProsedur = document.getElementById('submenuProsedur');
    const prosedurArrow = document.getElementById('prosedurArrow');

    if (prosedurBtn && submenuProsedur) {

        prosedurBtn.addEventListener('click', function () {

            if (submenuProsedur.style.display === 'none') {

                submenuProsedur.style.display = 'block';

                if (prosedurArrow) {
                    prosedurArrow.textContent = '⌄';
                }

            } else {

                submenuProsedur.style.display = 'none';

                if (prosedurArrow) {
                    prosedurArrow.textContent = '›';
                }

            }

        });

    }

});
</script>
<!-- ========================= -->
<!-- EDUKASI -->
<!-- ========================= -->

<button id="edukasiBtn" type="button">
    Edukasi
    <span id="edukasiArrow">›</span>
</button>

<ul id="submenuEdukasi" style="display: none;">

    <!-- Edukasi Nasabah -->
    <li>
        <a href="{{ route('edukasi.nasabah') }}">
            Edukasi Nasabah
        </a>
    </li>

    <!-- Edukasi Konsultan -->
    <li>
        <a href="{{ route('edukasi.konsultan') }}">
            Edukasi Konsultan
        </a>
    </li>

    <!-- Edukasi Umum -->
    <li>
        <a href="{{ route('edukasi.umum') }}">
            Edukasi Umum
        </a>
    </li>

</ul>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const edukasiBtn = document.getElementById('edukasiBtn');
    const submenuEdukasi = document.getElementById('submenuEdukasi');
    const edukasiArrow = document.getElementById('edukasiArrow');

    if (edukasiBtn && submenuEdukasi) {

        edukasiBtn.addEventListener('click', function () {

            if (submenuEdukasi.style.display === 'none') {

                submenuEdukasi.style.display = 'block';

                if (edukasiArrow) {
                    edukasiArrow.textContent = '⌄';
                }

            } else {

                submenuEdukasi.style.display = 'none';

                if (edukasiArrow) {
                    edukasiArrow.textContent = '›';
                }

            }

        });

    }

});
</script>