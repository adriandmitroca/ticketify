<?php

class EventModel extends Eloquent {

	protected $table = 'events';

	public function getDate() {
		$date = DateTime::createFromFormat('Y-m-d H:i:s', $this->time);
		$date = $date->format('j/m/y @ gA');

		return $date;
	}
}
