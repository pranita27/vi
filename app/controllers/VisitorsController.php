<?php

class VisitorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		print_r(self::getValidationRules());
		print_r(self::getValidationRules(['name']));
		print_r(self::getValidationRules(['test']));
		*/
		// print_r(Config::get('app.visitor_img_path'));
		return $this->getByDate('2015-01-01', '2015-01-02');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), self::getValidationRules());
		if ($v->fails()) {
			print_r($v->failed());
			print_r($v->messages());
			// return true;
			// print_r($v->)
		}
		else {
			$visitor = new Visitor(Input::all());
			$visitor->picture_file_path = '';
			if (Input::has('img')) {
				list($type, $data) = explode(';', Input::get('img'));
				list(, $data)      = explode(',', $data);
				$data = str_replace(' ', '+', $data);
				$data = base64_decode($data);
				if ($data) {
					$dest_dir = Config::get('app.visitor_img_path') . date('/Y/m/d/');
					if (File::isDirectory($dest_dir)) {
						if (!File::isWritable($dest_dir)) {
							//Try to change perms?
						}
					}
					else {
						File::makeDirectory($dest_dir, 0775, true);
					}
					$rand = '';
					do {
						$file_name = Str::slug(Input::get('name')) . $rand . '.jpeg';
						$rand = Str::random(4);
					} while (File::exists($dest_dir . $file_name));
					if (file_put_contents($dest_dir . $file_name, $data)) {
						$visitor->picture_file_path = $file_name;
					}
				}
			}
			//
			if (!$visitor->save()) {
				App::abort(500, 'Oops!! Something went wrong.');	
			}

			$visit = new Visit(Input::all());
			$visit->visitor_id = $visitor->id;
			if (!$visit->save()) {
				App::abort(500, 'Oops!! Something went wrong.');
			}
			
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
		return Visitor::find($id);
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
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public static function getValidationRules($selected = []) {
		$rules = [
			'name' => 'required|between:3,100',
			'submitted_id' => 'required|between:3,100',
			'phone' => ['required', 'regex:/^((\+91)|0?)[7-9][0-9]{9}$/', 'unique:visitors'],
			'email' => 'required|between:5,150|email|unique:visitors',
			'from' => 'required|between:3,100',
			// 'picture' => 'required|mimes:jpeg,png|between:4,400',
		];
		return empty($selected) ? $rules : array_only($rules, $selected);
	}

	public function getByDate($fromdate, $todate = NULL) {
		if($fromdate !== '' ){
			if($todate === NULL){
				$todate = $fromdate;
			}
			$from = date('Y-m-d', strtotime($fromdate));
	  		$to = date('Y-m-d', strtotime($todate));
			$visitors = DB::table('visitors')
	            ->where('created_at', '>=', $from.' 00:00:00')
	            ->where('created_at', '<=', $to.' 23:59:59')
	            ->get();
			return $visitors;
		}
	}

	public function getByPhone($phone) {
		return Visitor::where('phone', 'LIKE', '%'.$phone.'%')->get();
	}

}
