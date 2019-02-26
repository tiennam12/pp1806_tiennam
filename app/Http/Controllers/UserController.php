<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreBlogPost;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$objUser  = new User();
		$allUsers = $objUser->all()->toArray();

		return view('user')->with('allUsers', $allUsers);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
    {
        return view('create');
    }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreBlogPost $request)
	{
		$allRequest = $request->all();
		$name   = $allRequest['name'];
		$email  = $allRequest['email'];
		$password = $allRequest['password'];

		$dataInsertToDatabase = array(
			'name' => $name,
			'email' => $email,
			'password' => $password,	
		);

		$objUser = new User();
		$objUser->insert($dataInsertToDatabase);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		return view('profile', ['user' => $user]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$objUser     = new User();
		$getUserById = $objUser->find($id)->toArray();
		return view('edit')->with('getUserById', $getUserById);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id='')
	{
		$allRequest = $request->all();
		$name = $allRequest['name'];
		$email = $allRequest['email'];
		$idUser = $allRequest['id'];

		$objUser = new User();
		$getUserById = $objUser->find($idUser);
		$getUserById->name = $name;
		$getUserById->email = $email;
		$getUserById->save();
		$request->session()->flash('status', 'thành công!');
		return session('status'); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
        return redirect()->action('UserController@index');
	}
}
