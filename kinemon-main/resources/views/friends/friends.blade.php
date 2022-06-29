@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Support Wrapper-->
            <div class="support-wrapper py-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="faq-heading text-center">Search by your friends ID...</h4>
                        <!-- Search Form-->
                        <form class="faq-search-form" method="get">
                            <input class="form-control" type="search" name="search" placeholder="Search" value="{{ request('search') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

                @if(request('search'))
                    <div class="accordian-area-wrapper mt-3">
                        <!-- Accordian Card-->
                        <div class="card accordian-card">
                            <div class="card-body">
                                @if($suggestedFriend)
                                    <h5 class="accordian-title">Search result</h5>
                                    <div class="accordion" id="accordion1">
                                        <div class="accordian-header" id="headingOne">
                                            <a href="{{ url('friends/' . $suggestedFriend->id) }}">
                                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                <span>
                                                    <i class="lni lni-user"></i>
                                                    {{ $suggestedFriend->name }}
                                                    <span class="text-muted">#{{ $suggestedFriend->username }}</span>
                                                </span>
                                                    <i class="lni lni-chevron-right"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <h5 class="accordian-title">No results!</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <div class="accordian-area-wrapper mt-3">
                    <!-- Accordian Card-->
                    <div class="card accordian-card others-card">
                        <div class="card-body">
                            @if(count($friends))
                                <h5 class="accordian-title">Friends</h5>
                                <div class="accordion" id="accordion3">
                                    @foreach($friends as $friend)
                                        <div class="accordian-header" id="headingFive">
                                            <a href="{{ url('friends/' . $friend->id) }}">
                                                <button class="d-flex align-items-center justify-content-between w-100 collapsed btn"
                                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                    <span>
                                                        <i class="lni lni-user"></i>
                                                        {{ $friend->name }}
                                                        <span class="text-muted">#{{ $friend->username }}</span>
                                                    </span>
                                                    <i class="lni lni-chevron-right"></i>
                                                </button>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h5 class="accordian-title">You don't have any friends!</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
