<br>
<div>
    <br>
    <p>{{ $response }}</p>
    <p>
    
       <span><a href="{{ url('/') . '/event?id=' . $event->id }}">{{ $event->name }}</a></span> @ <span>{{ renderDate($event->start_dt, 'l, F d, Y h:i A') . ' - ' . renderDate($event->end_dt, 'l, F d, Y h:i A') }}</span>
    </p>
</div>
 
