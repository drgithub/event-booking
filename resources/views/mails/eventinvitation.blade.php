Hello!
<br>
<div>
	<p>This is an invitation for the Event <b> {{ $event->name }} </b></p>
	<br>
	<p>Click the Link below to check the details and respond!</p>
	<br>
	<p> {{ url('/') . '/invitation-form?fkey=' . $guest_key }}</p>
</div>
 
