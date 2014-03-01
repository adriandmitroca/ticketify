<?php

class OrderController extends BaseController {

	public function listOrders()	{
		
		$id = Auth::user()->id;

		$orders = Order::where('customer_id', '=', $id)->get();

		return View::make('order.list-orders')->with('orders', $orders);
	}

}