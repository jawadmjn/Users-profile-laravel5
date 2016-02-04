<?php namespace App\Http\Controllers;
use DB;

class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $totalRecords = DB::table('members')->count();
        $members = DB::table('members')->select('id', 'name', 'email', 'phone', 'dob')->get();
        return view('home')
            ->with('members', $members)
            ->with('totalRecords', $totalRecords);
    }

}