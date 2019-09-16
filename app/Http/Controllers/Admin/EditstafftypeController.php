<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class EditstafftypeController extends Controller
{
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
	
	public function showform($id) {
	
	$language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
      $stafftype = DB::select('select * from staff_type where id = ?',[$id]);
      return view('admin.edit-staff-type',['stafftype'=>$stafftype, 'language' => $language]);
   }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  
	 
    protected function stafftypedata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['name'] = Input::get('name');
       
	    $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
	   
		
		$rules = array(
		
		/*'name'=>'required|unique:gallery,name,'.$id,*/
		
		'photo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png'
		);
		
		
		$messages = array(
            
            
			
        );

		
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{ 
		
		
		

		

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $galleryphoto="/galleryphoto/";
			$delpath = base_path('images'.$galleryphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$galleryphoto.$filename);
			$destinationPath=base_path('images'.$galleryphoto);
      
                /* Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				Input::file('photo')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}
		
		
		
		$name=$data['name'];
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$name[$index];		
		   	
		   if($code=="en")
			{
			  DB::update('update staff_type set name="'.$pagename.'",lang_code="'.$code.'" where id = ?', [$id]);
			}
			else
			{
			    $counts = DB::table('staff_type')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $id)
					  ->count();
			     if($counts==0)
				 {
						if(!empty($pagename))
						{
						   $pagenamo = $pagename;
						}
						else
						{
						   $pagenamo = "";
						}
				     DB::insert('insert into staff_type (name, lang_code, token, parent) values (?, ?, ?, ?)', [$pagenamo,$code,$token,$id]);
				 }
				 else
				 {
				   DB::update('update staff_type set name="'.$pagename.'" where lang_code="'.$code.'" and parent = ?', [$id]);
				 }
			
			}
		}
		
		/* DB::insert('insert into users (name, email,password,phone,admin) values (?, ?,?, ?,?)', [$name,$email,$password,$phone,$admin]);*/
		
		
			return back()->with('success', 'Staff type has been updated');
        }
		
		
		
		
    }
}
