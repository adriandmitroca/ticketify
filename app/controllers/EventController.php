<?php 
	
class EventController extends BaseController {

	public function showEvents() {
		$events = EventModel::all();

		return 	View::make('events.show-events')
				->with('events', $events);
	}

	public function eventDetails($code) {

		$event = EventModel::find($code);

		if($event) {
			return 	View::make('events.event-details')
					->with('event', $event);
		}

		return App::abort(404);

	}

	public function getEventBuy($id) {

		$user_id = Auth::user()->id;
		$user = User::find($user_id);

		$order = EventModel::find($id);

		$date = DateTime::createFromFormat('Y-m-d H:i:s', $order->time);
		$date = $date->format('j/m/y @ gA');

		return 	View::make('events.event-buy')
				->with('order', $order)
				->with('date', $date)
				->with('user', $user);
	}

	public function postEventBuy($event_id) {
		$validator = Validator::make(Input::all(), array(
			'email' => 'required|email',
			'first_name' => 'required',
			'last_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'zip_code' => 'required',
			'phone' => 'required'
		));

		if($validator->fails()) {
			return Redirect::route('events.event-buy')->withErrors($validator)->withInput();
		}

		else {
			$price = Order::find($event_id)->price;
			$user_id = Auth::user()->id;
			$order = Order::create(array(
				'customer_id' => $user_id,
				'event_id' => $event_id,
				'price' => $price
			));

			if($order) {
				return Redirect::route('events')->with('global', 'Thank you for your order.');
			}

		}
	}
}


 ?>