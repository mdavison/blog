<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {


    /**
     * Restrict this controller to authenticated users
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

        return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request, User::$rules);

        $user = User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password'))
        ]);

        return redirect('users')->withMessage('User ' . $user->name . ' was added.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

        return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param  int $id
     * @return Response
     */
	public function update(UpdateUserRequest $request, $id)
	{
        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        // Only change the password if they entered something
        $password = $request->get('password');
        if ( ! empty($password)) {
            $user->password = Hash::make($password);
        }

        $user->update();

        return redirect('users')->withMessage('User was updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('users')->withMessage($user->name . ' was deleted.');
	}

}
