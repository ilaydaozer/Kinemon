@extends('layouts/sub')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            <div class="section-heading d-flex align-items-center pt-3 justify-content-between">
                <h6>Notification(s)</h6>
            </div>
            <div class="notification-area pb-2">
                <div class="list-group">
                    @foreach($events as $event)
                        @php($read = $event->invites->where('invitee_id', auth()->id())->first()->will_attend !== null)
                        <a class="list-group-item d-flex align-items-center{{ $read ? ' readed' : '' }}"
                           href="{{ url('event/detail/' . $event->id) }}">
                            <span class="noti-icon">
                                <i class="lni lni-alarm"></i>
                            </span>
                            <div class="noti-info">
                                <h6 class="mb-0">
                                    {{ $event->createdBy->name }} invited you to attend {{ $event->name }}!
                                </h6>

                                <span>{{ $event->created_at->diffForHumans() }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
