<?php 

use Carbon\Carbon;

function renderDate($date, $format)
{
	return Carbon::parse($date)->format($format);
}