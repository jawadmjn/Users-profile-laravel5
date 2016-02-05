<?php namespace App\Http\Controllers;
use Input;
use DB;
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
        $id = Input::all();
        DB::table('members')->where('id', '=', $id)->delete();
        return Redirect::to('/');
    }

    public function update()
    {
        $id = Input::all();
        $update = true;
        // Retrive selected Member info and send to the Form
        $member = DB::table('members')->where('id', $id)->get();

        // For mprocessing update form, Putting $update is sessions and will be removed after final without errors update
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
            DB::table('members')
                ->where('id', $inputs['id'])
                ->update(['name' => $inputs['name'], 'email' => $inputs['email'], 'phone' => $inputs['phone'], 'dob' => $inputs['dob']]);

            // Update done so just forget update and Redirect to main page
            Session::forget('update');
            return Redirect::to('/');
        }
    }

}