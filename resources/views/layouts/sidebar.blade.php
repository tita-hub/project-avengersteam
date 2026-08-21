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