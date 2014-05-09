<?php

class ShopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shops = Shop::all();

		return View::make("shops.index")
			->with("shops", $shops);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make("shops.create");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'phone_number'      => 'required',
			'fax_number' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('shops/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$shop = new Shop;
			$shop->name       = Input::get('name');
			$shop->phone_number      = Input::get('phone_number');
			$shop->fax_number = Input::get('fax_number');
			$shop->timestamps=false;

			$shop->save();

			// redirect
			Session::flash('message', 'Successfully created shop!');
			return Redirect::to('shops');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$shop = Shop::find($id);

		return View::make("shops.show")
			-> with("shop", $shop);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		// get the shop
		$shop = Shop::find($id);

		// show the edit form and pass the shop
		return View::make('shops.edit')
			->with('shop', $shop);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		///
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'phone_number'      => 'required',
			'fax_number' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('shops/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$shop = Shop::find($id);
			$shop->name       = Input::get('name');
			$shop->phone_number      = Input::get('phone_number');
			$shop->fax_number = Input::get('fax_number');
			$shop->timestamps=false;

			$shop->save();

			// redirect
			Session::flash('message', 'Successfully created shop!');
			return Redirect::to('shops');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$shop = Shop::find($id);
		$shop->delete();

		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('shops');
	}


}
