<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Display the index/home page.
	 *
	 * @return Response
	 */
	public function home()
	{
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('pages.home', compact('posts'));
	}

    public function dashboard()
    {
        return view('pages.dashboard');
    }

}
