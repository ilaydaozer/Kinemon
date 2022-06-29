<div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
    <!-- Close button-->
    <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <!-- Offcanvas body-->
    <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
            <div class="user-profile"><img src="{{ auth()->user()->img }}" alt=""></div>
            <div class="user-info">
                <h6 class="user-name mb-1">{{ auth()->user()->name }}</h6>
                <p class="available-balance">Username #{{ auth()->user()->username }}</p>
            </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
            <li><a href="{{ url('profile') }}"><i class="lni lni-user"></i>My Profile</a></li>
            <li><a href="{{ url('settings') }}"><i class="lni lni-cog"></i>Settings</a></li>
            <li>
                <a href="{{ url('logout') }}">
                    <i class="lni lni-power-switch"></i>
                    Sign Out
                </a>
            </li>
        </ul>
    </div>
</div>
