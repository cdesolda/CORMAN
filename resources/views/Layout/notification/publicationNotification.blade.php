<!-- Notification Modal Content -->

<div>
    <div class="row align-items-center">
        <div class="col-lg-8">{{ $notification->data['authUser']['first_name'] . ' ' . $notification->data['authUser']['last_name']}} mentioned you to  <strong>{{ $notification->data['publication']['title']}}</strong></div>
        <div class="col-lg-4">
            <a href="{{ url('notifications/'.$notification->id . '11') }}" id="btn-newgroup" class="btn btn-primary btn-sm" role="button">Show</a>
        </div>
    </div>
</div>