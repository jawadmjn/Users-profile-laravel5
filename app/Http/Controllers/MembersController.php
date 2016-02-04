<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Membersvalidator;

class MembersController extends Controller
{
	public function index()
	{
		return view('member');
	}

	public function create()
	{
		$inputs = Input::all();

		$validator = Membersvalidator::validator($inputs);

		// if the validator fails, redirect back to the form
		if ($validator->fails())
		{
		    return Redirect::to('member')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::all()); // send back the input
		}
		else
		{
			dd("it works");
			// create our user data for the authentication
		    $userdata = array(
		        'name'     => Input::get('name'),
		        'email'     => Input::get('email'),
		        'phone'  => Input::get('phone'),
		        'dob'  => Input::get('dob'),
		    );

		    // attempt to create member
		    if (Auth::attempt($userdata))
		    {
		    	// validation successful!
		        echo 'SUCCESS!';

		    }
		    else
		    {
		    	// validation not successful, send back to form
		        return Redirect::to('member');
		    }

		}
	}

}