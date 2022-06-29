@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper">
        <div class="container pt-3">
            <div class="section-heading mt-3">
                <h5 class="mb-1">Create Event</h5>
                <p class="mb-4">Create event description.</p>
            </div>
            <!-- Contact Form-->
            <div class="contact-form mt-3 pb-3">
                <form action="{{ url('event/create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control mb-3" id="name" required name="name" type="text" placeholder="Event Name">
                    <input class="form-control mb-3" id="address" required name="address" type="text" placeholder="Address">
                    <input class="form-control mb-3" id="date" required name="date" type="text" placeholder="Event Date">
                    <input class="form-control mb-3" id="img" required name="img" type="file">
                    <textarea class="form-control mb-3" id="detail" required name="detail" cols="30" rows="10" placeholder="Write something..."></textarea>

                    <ul class="page-nav ps-0 mb-3">
                        <li class="nav-title">Invitees<span>{{ count($friends) }}</span></li>
                        @foreach($friends as $friend)
                            <li>
                                <div class="card settings-card mb-2">
                                    <div class="card-body">
                                        <div class="single-settings d-flex align-items-center justify-content-between">
                                            <div class="title">
                                                <img src="{{ $friend->img }}">
                                                <span>{{ $friend->name }}</span>
                                            </div>
                                            <div class="data-content">
                                                <div class="toggle-button-cover">
                                                    <div class="button r">
                                                        <input class="checkbox" type="checkbox" name="invitees[]"
                                                               value="{{ $friend->id }}">
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <button class="btn btn-success btn-lg w-100">Create</button>
                </form>
            </div>
        </div>
    </div>
@stop
