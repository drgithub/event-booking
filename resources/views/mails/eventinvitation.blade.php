Hello!
<br>
<div>
	<p>This is an invitation for the Event <b> {{ $event->name }} </b></p>
	<br>
	<p>Click the Link below to check the details and respond!</p>
	<br>
	<p> {{ url('/') . '/event/guest' . '/' . $guest_id }}</p>
</div>
 
