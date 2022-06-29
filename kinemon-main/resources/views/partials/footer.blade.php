<div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li class="{{ request()->path() === '/' ? 'active' : '' }}">
                    <a href="{{ url('/') }}"><i class="lni lni-home"></i>Home</a>
                </li>
                <li class="{{ request()->path() === 'friends' ? 'active' : '' }}">
                    <a href="{{ url('friends') }}"><i class="lni lni-users"></i></i>Friends</a>
                </li>
                <li class="{{ request()->path() === 'event/create' ? 'active' : '' }}">
                    <a href="{{ url('event/create') }}"><i class="lni lni-circle-plus"></i>Event</a>
                </li>
                <li class="{{ request()->path() === 'notifications' ? 'active' : '' }}">
                    <a href="{{ url('notifications') }}"><i class="lni lni-alarm"></i>Notifications</a>
                </li>
                <li class="{{ request()->path() === 'settings' ? 'active' : '' }}">
                    <a href="{{ url('settings') }}"><i class="lni lni-cog"></i>Settings</a>
                </li>
            </ul>
        </div>
    </div>
</div>
