<?php namespace App\Http\Controllers;
use Session;
use App\Member;

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
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    public function index()
    {
        Session::forget('update');
        $members = Member::all();

        return view('home')
            ->with('members', $members)
            ->with('totalRecords', $members->count());
    }

    public function showPagination()
    {
        // We can limit it or increase it by changing value 8.
        // If we do not want pagination then replace Member::paginate(8); with Member::all();
        $members = Member::paginate(8);

        // For finding how many numbers we need for pagination i use this technique
        // maximum results / results to show PerPage
        // In case you do not want pagination in data retriving then we can Remove $reqPagination, $currentPageurl and $active.

        $reqPagination = ceil( $members->total() / $members->perPage() );
        $reqPagination = number_format($reqPagination, 0);

        // For adding active class in pagination menu (this css class will show user on which page user is)
        $currentPageurl = $members->url($members->currentPage()); // get current page url

        // get the numeric value from url for comparing it with for-loop $i
        $active = filter_var($currentPageurl, FILTER_SANITIZE_NUMBER_INT);

        // Use this if Pagination is Enable
        return view('home')
            ->with('members', $members)
            ->with('totalRecords', $members->total())
            ->with('reqPagination', $reqPagination)
            ->with('active', $active);
    }

}