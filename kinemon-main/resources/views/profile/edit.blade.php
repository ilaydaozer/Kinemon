@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="user-profile me-3">
                            <img src="{{ auth()->user()->img }}">
                        </div>
                        <div class="user-info">
                            <p class="mb-0 text-dark">#{{ auth()->user()->username }}</p>
                            <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                        </div>
                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="title mb-2">
                                    <i class="lni lni-user"></i>
                                    <span>Username</span>
                                </div>
                                <input class="form-control" type="text" value="{{ auth()->user()->username }}" disabled>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2">
                                    <i class="lni lni-user"></i>
                                    <span>Full Name</span>
                                </div>
                                <input name="name" class="form-control" type="text" value="{{ auth()->user()->name }}"
                                       required>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2">
                                    <i class="lni lni-envelope"></i>
                                    <span>Email Address</span>
                                </div>
                                <input name="email" class="form-control" type="email"
                                       value="{{ auth()->user()->email }}" required>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2">
                                    <i class="lni lni-image"></i>
                                    <span>Profile Picture</span>
                                </div>
                                <input class="form-control" id="img" name="img" type="file">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Save All Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
