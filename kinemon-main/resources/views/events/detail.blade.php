@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper pb-3">
        <div class="vendor-details-wrap bg-img bg-overlay py-4" style="background-image: url('{{ $event->img }}')">
            <div class="container">
                <div class="d-flex align-items-start">
                    <div class="vendor-info">
                        <h5 class="vendor-title text-white">{{ $event->name }}</h5>
                        <p class="mb-1 text-white">
                            <svg class="bi bi-geo-alt me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"></path>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            </svg>
                            {{ $event->address }}
                        </p>
                    </div>
                </div>

                <div class="vendor-basic-info d-flex align-items-center justify-content-between mt-4">
                    <div class="single-basic-info">
                        <div class="icon">
                            <i class="lni lni-calendar bi bi-shield-check"></i>
                        </div>
                        <span>{{ $event->date }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vendor Tabs -->
        <div class="vendor-tabs">
            <div class="container">
                <ul class="nav nav-tabs mb-3" id="vendorTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">About</button>
                    </li>
                    @if($event->created_by_id === auth()->id())
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products"
                                    type="button" role="tab" aria-controls="products" aria-selected="false">
                                Attendees
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="tab-content" id="vendorTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <div class="card">
                        <div class="card-body about-content-wrap">
                            <p>{{ $event->detail }}</p>

                            @if($event->created_by_id !== auth()->id() && $event->invites->where('invitee_id', auth()->id())->first()->will_attend === null)
                                <div class="contact-btn-wrap text-center row row-cols-2">
                                    <div class="col">
                                        <a class="btn btn-success w-100" href="{{ url('event/accept/' . $event->id) }}">
                                            <i class="lni lni-checkmark-circle me-2"></i>
                                            Accept
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-danger w-100" href="{{ url('event/reject/' . $event->id) }}">
                                            <i class="lni lni-cross-circle me-2"></i>
                                            Reject
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($event->created_by_id === auth()->id())
                <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                    <div class="container">
                        <div class="row g-3">
                            @foreach($event->invites as $invite)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card product-card">
                                        <div class="card-body">
                                            <span class="product-thumbnail d-block">
                                                <img class="mb-3" src="{{ $invite->invitee->img }}">
                                            </span>
                                            <span class="product-title d-block">{{ $invite->invitee->name }} #{{ $invite->invitee->username }}</span>
                                            @if($invite->will_attend === null)
                                                <button class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Haven't decided yet :|">
                                                    <i class="lni lni-minus"></i>
                                                </button>
                                            @elseif($invite->will_attend === 0)
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Will not attend :(">
                                                    <i class="lni lni-close"></i>
                                                </button>
                                            @elseif($invite->will_attend === 1 )
                                                <button class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="I'm in :)">
                                                    <i class="lni lni-checkmark"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
