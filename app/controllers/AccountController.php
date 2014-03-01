<?php 
class AccountController extends BaseController {

	public function getSignIn() {
		return View::make('account.sign-in');
	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(), array(
			'email'		=>	'required|email',
			'password'	=>	'required'
			));
	
		if($validator->fails()) {
			return Redirect::route('account-sign-in')
					->withErrors($validator)
					->withInput();
		}

		else {
			
			$remember = (Input::has('remember')) ? true : false;
			
			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => '1'
				), $remember);

			if($auth) {
				return Redirect::intended('/');
			}
			
		}

		return 	Redirect::route('home')
				>with('global', "Login failed. Have you entered your email and password properly?");
	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(),
			array(
				'email'				=> 'required|max:50|email|unique:users',
				'username'			=> 'required|max:20|min:3|unique:users',
				'password'			=> 'required|min:6',
				'password_again'	=> 'required|same:password'

			)
		);

		if($validator->fails()) {
				return Redirect::route('account-create')
						->withErrors($validator)
						->withInput();
		}
		else {
			
			$email		= Input::get('email');
			$username	= Input::get('username');
			$password 	= Input::get('password');

			$code		= str_random(60);

			$user = User::create(array(
					'email'		=> $email,
					'username'	=> $username,
					'password'	=> Hash::make($password),
					'code'		=> $code,
					'active'	=> 0
				));

			if($user) {

				Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
						$message->to($user->email, $user->username)->subject('Activate your account');
				});

				return Redirect::route('home')
						->with('global', 'Your account has been created! We have sent you an email with verification code.');
			}
		}
	}

	public function getActivate($code) {

			$user = User::where('code', '=', $code)->where('active', '=', '0');

			if($user->count()) {
				$user = $user->first();

				$user->active 	= 1;
				$user->code 	= '';

				if($user->save())
					return Redirect::route('home')
							->with('global', 'Your account has been activated!');
			}

			return Redirect::route('home')
					->with('global', 'Something went wrong. Try again later.');
	}

	public function getChangePassword() {
		return View::make('account.change-password');
	}

	public function postChangePassword() {
		$validator = Validator::make(Input::all(),
			array(
				'old_password' => 'required',
				'new_password' => 'required|min:6',
				'new_password_again' => 'required|same:new_password'
			)
		);

		if($validator->fails()) {
			return 	Redirect::route('account-change-password')
					->withErrors($validator);
		}
		else {

			$user 			= User::find(Auth::user()->id);

			$old_password	= Input::get('old_password');
			$password 		= Input::get('new_password');

			if(Hash::check($old_password, $user->getAuthPassword())) {
				$user->password = Hash::make($password);
			
				if($user->save()) {
					return 	Redirect::route('home')
							->with('global', 'Your password has been changed');
				}
			}
			else {
				return 	Redirect::route('account-change-password')
				->with('global', 'Your old password does not match. Try again.');
			}
		}
	}

	public function getChangeSettings() {
		
		$user_id = Auth::user()->id;
		$user = User::find($user_id);
		
		return 	View::make('account.change-settings')
				->with('user', $user);		
	}

	public function postChangeSettings() {
		$user_id = Auth::user()->id;

		$validator = Validator::make(Input::all(), array(
			'email' => 'required|email|unique:users,id,$user_id',
			'first_name' => '',
			'last_name' => '',
			'address' => '',
			'city' => '',
			'zip_code' => 'max:6',
			'phone' => 'numeric'
		));

		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$address_input = Input::get('address');
		$city = Input::get('city');
		$zip_code = Input::get('zip_code');
		$phone = Input::get('phone');



		if($validator->fails()) {
			return 	Redirect::route('account-settings')
					->withErrors($validator);
		}
		else {
			$address = Address::firstOrCreate(array('user_id' => $user_id));

			$address->first_name = $first_name;
			$address->last_name = $last_name;
			$address->address = $address_input;
			$address->city = $city;
			$address->zip_code = $zip_code;
			$address->phone = $phone;
			if($address->save()) {
				return 	Redirect::route('account-settings')
						->with('global', 'Your profile has been updated.');
			}

		}
	}
}
?>