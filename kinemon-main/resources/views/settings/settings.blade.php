@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Settings Wrapper-->
            <div class="settings-wrapper py-3">
                <!-- Single Setting Card-->
                <div class="card settings-card">
                    <div class="card-body">
                        <!-- Single Settings-->
                        <div class="single-settings d-flex align-items-center justify-content-between">
                            <div class="title"><i class="lni lni-night"></i><span>Night Mode</span></div>
                            <div class="data-content">
                                <div class="toggle-button-cover">
                                    <div class="button r">
                                        <input class="checkbox" id="darkSwitch" type="checkbox">
                                        <div class="knobs"></div>
                                        <div class="layer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Setting Card-->
                <div class="card settings-card">
                    <div class="card-body">
                        <!-- Single Settings-->
                        <div class="single-settings d-flex align-items-center justify-content-between">
                            <div class="title">
                                <i class="lni lni-lock"></i>
                                <span>Password</span>
                            </div>
                            <div class="data-content">
                                <a href="{{ url('profile/password') }}">
                                    Change
                                    <i class="lni lni-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
