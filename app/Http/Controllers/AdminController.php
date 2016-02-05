<?php namespace App\Http\Controllers;
use DB;
use Session;

class AdminController extends Controller {

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('update');
        $totalRecords = DB::table('members')->count();

        // ->simplePaginate(8) allows us to paginate our page ig members are more than 8
        // We can limit it or increase it by changing value 8.
        // If we do not want pagination then replace ->simplePaginate(8) with ->get();
        $members = DB::table('members')->select('id', 'name', 'email', 'phone', 'dob')->simplePaginate(8);

        // For finding how many numbers we need for pagination i use this technique
        // $maximum questions / Question to show PerPage
        // In case you do not want pagination in data retriving then we can Remove $reqPagination, $currentPageurl and $active.
        $reqPagination = ceil( $totalRecords / $members->perPage() );
        $reqPagination = number_format($reqPagination, 0);

        // For adding active class in pagination menu
        $currentPageurl = $members->url($members->currentPage()); // get current page url
        // get the numeric value from url for comparing it with for-loop $i
        $active = filter_var($currentPageurl, FILTER_SANITIZE_NUMBER_INT);

        return view('home')
            ->with('members', $members)
            ->with('totalRecords', $totalRecords)
            ->with('reqPagination', $reqPagination)
            ->with('active', $active);
    }

}