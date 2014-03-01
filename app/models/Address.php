<?php

class Address extends Eloquent {

	protected $primaryKey = 'user_id';
	protected $table = 'addresses';

	public $timestamps = false;
}
