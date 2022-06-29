@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="user-profile me-3"><img src="{{ $user->img }}"></div>
                        <div class="user-info">
                            <p class="mb-0 text-white">#{{ $user->username }}</p>
                            <h5 class="mb-0">{{ $user->name }}</h5>
                        </div>
                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Username</span></div>
                            <div class="data-content">#{{ $user->username }}</div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Full Name</span></div>
                            <div class="data-content">{{ $user->name }}</div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i>
                                <span>Email Address</span>
                            </div>
                            <div class="data-content">{{ $user->email }}</div>
                        </div>
                        @if(auth()->user()->friends()->where('friend_id', $user->id)->first())
                            <div class="edit-profile-btn mt-3">
                                <a class="btn btn-danger w-100" href="{{ url('friends/' . $user->id . '/remove') }}">
                                    <i class="lni lni-minus me-2"></i>
                                    Remove Friend
                                </a>
                            </div>
                        @else
                            <div class="edit-profile-btn mt-3">
                                <a class="btn btn-success w-100" href="{{ url('friends/' . $user->id . '/add') }}">
                                    <i class="lni lni-plus me-2"></i>
                                    Add Friend
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
