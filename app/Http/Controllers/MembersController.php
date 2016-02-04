<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Membersvalidator;
use App\Member;

class MembersController extends Controller
{
	public function index()
	{
		return view('member');
	}

	public function create()
	{
		// save all the information from coming form in inputs variable
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
			// create our user data for the authentication
			Member::create([
		        'name'		=> Input::get('name'),
		        'email'		=> Input::get('email'),
		        'phone'  	=> Input::get('phone'),
		        'dob'		=> Input::get('dob'),
			]);
			return Redirect::to('/');
		}
	}

}