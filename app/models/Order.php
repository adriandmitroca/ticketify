<?php

class Order extends Eloquent {
	
	protected $primaryKey = 'order_id';
	protected $fillable = array('customer_id', 'event_id', 'price');
	
	public function event() {
		return $this->hasOne('EventModel', 'id', 'event_id');
	}
}
