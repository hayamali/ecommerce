<?php

namespace App\Http\Controllers;

use App\Empoloy;
use Illuminate\Http\Request;

class EmpoloyController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('employ');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$data = $this->validate($request,
			[
				'username' => 'required',
				'job_ar' => 'required',
				'job_en' => 'required',
				'manger' => 'required',
				//'image' => 'required|' . v_image(),
			]);

		if (request()->hasFile('image')) {
			$data['image'] = up()->upload([
				'file' => 'image',
				'path' => 'employ',
				'upload_type' => 'single',
				'delete_file' => '',
			]);
		}

		$emp = Empoloy::create([
			'username' => $request->name,
			'job_ar' => $request->job_ar,
			'job_en' => $request->job_en,
			'manger' => $request->manger,
			'image' => '',
		]);

		return redirect(url('employ'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
