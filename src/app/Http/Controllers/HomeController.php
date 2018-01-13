<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSite;
use App\Models\Site;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(["sitesItems" => Site::all()]);
    }

    /**
     * @param AddSite $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(AddSite $request)
    {
        Site::add($request->post());
        return redirect()->back();
    }
}
