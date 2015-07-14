<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller {

    /**
     * Restrict all but index to authenticated users
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();

        return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request, Post::$rules);

        //$post = Post::create($request->all());
		$post = Post::create([
			'title'	=> $request->get('title'),
			'slug' 	=> str_slug($request->get('title')),
			'body'	=> $request->get('body')
		]);

        return redirect('posts')->withMessage('Post ' . $post->title . ' was created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Is $id a slug?
		if ( ! count($post = Post::where('slug', '=', $id)->first())) {
			$post = Post::findOrFail($id);
		}

        return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $this->validate($request, Post::$rules);

        $post = Post::findOrFail($id);
        //$post->update($request->all());
		$post->update([
			'title'	=> $request->get('title'),
			'slug' 	=> str_slug($request->get('title')),
			'body'	=> $request->get('body')
		]);

        return redirect('posts')->withMessage('Post was updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('posts')->withMessage($post->title . ' was deleted.');
	}

}
