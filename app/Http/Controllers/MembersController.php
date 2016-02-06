<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Membersvalidator;
use App\Member;
use Session;

class MembersController extends Controller
{
    // this constructor take user to CRUD on members if Authentication is successful
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('member');
    }

    public function create()
    {
        // save all the information from coming form in inputs variable
        $inputs = Input::all();

        // Send information for Validation before saving data into DB
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
            // create our member data
            Member::create([
                'name'      => Input::get('name'),
                'email'     => Input::get('email'),
                'phone'     => Input::get('phone'),
                'dob'       => Input::get('dob'),
            ]);
            return Redirect::to('/');
        }
    }

    public function delete()
    {
        // get the id of the member
        $id = Input::get('id');

        //find if id exist
        $member = Member::find($id);

        // Delete the member
        $member->delete();
        return Redirect::to('/');
    }

    public function update()
    {
        $id = Input::all();

        // this variable will be use as check for putting update or create link on same user creation form ( one form with multiple operations)
        $update = true;

        // Retrive selected Member info and send to the Form
        $member = Member::find($id);

        // For processing update form, Putting $update is sessions and will be removed after final without errors update
        Session::put('update', $update);
        return view('member')
            ->with('member', $member[0])
            ->with('update', $update);
    }

    public function updatemember()
    {
        $inputs = Input::all();

        // Send information for Validation before saving data into DB
        // Sending this id is the trick to avoid unique conflicts while updating
        $validator = Membersvalidator::validator($inputs, $inputs['id']);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
            return Redirect::to('member')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all()); // send back the input
        }
        else
        {
            // update our member data
            $member = Member::find($inputs['id']);

            $member->name = $inputs['name'];
            $member->email = $inputs['email'];
            $member->phone = $inputs['phone'];
            $member->dob = $inputs['dob'];
            $member->save();

            // Update done so just forget from sessions update and Redirect to main page
            Session::forget('update');
            return Redirect::to('/');
        }
    }

}