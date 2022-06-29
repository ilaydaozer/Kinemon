@extends('layouts/main')

@section('content')
    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="row gy-3">
                @if(count($events))
                    @foreach($events as $event)
                        <div class="col-12">
                            <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                                 style="background-image: url('{{ $event->img }}')">
                                <h5 class="vendor-title text-white">{{ $event->name }}</h5>
                                <div class="vendor-info">
                                    <p class="mb-1 text-white">
                                        <svg class="bi bi-geo-alt me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"></path>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                        </svg>
                                        {{ $event->address }}
                                    </p>
                                    <div class="ratings lh-1">
                                        <span class="text-white">By {{ $event->createdBy->name }}</span>
                                    </div>
                                </div>
                                <a class="btn btn-warning btn-sm mt-3" href="{{ url('event/detail/' . $event->id) }}">
                                    View
                                    <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="section-heading mt-3 text-center">
                        <h5 class="mb-1">Ops!</h5>
                        <p class="mb-4">You don't have any events. Click (+) to add new events.</p>

                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
