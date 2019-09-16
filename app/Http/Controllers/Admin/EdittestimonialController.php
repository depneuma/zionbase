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


class EdittestimonialController extends Controller
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
      $testimonials = DB::select('select * from testimonials where id = ?',[$id]);
      return view('admin.edit-testimonial',['testimonials'=>$testimonials, 'language' => $language]);
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
	 
	  
	 
    protected function testimonialdata(Request $request)
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
		$name=$data['name'];
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $testimonialphoto="/testimonialphoto/";
			$delpath = base_path('images'.$testimonialphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$testimonialphoto.$filename);
			$destinationPath=base_path('images'.$testimonialphoto);
      
                 Image::make($image->getRealPath())->resize(100, 100)->save($path);
				/*Input::file('photo')->move($destinationPath, $filename);*/
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		$desc=$data['desc'];
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$name[$index];
		   $pagedesc=$desc[$index];			
		   	
		   if($code=="en")
			{
			  
			  DB::update('update testimonials set name="'.$pagename.'",description="'.$pagedesc.'",image="'.$savefname.'",lang_code="'.$code.'"	 where id = ?', [$id]);
			}
			else
			{
			    $counts = DB::table('testimonials')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $id)
					  ->count();
			     if($counts==0)
				 {
						if(!empty($pagename))
						{
						   $pagenamo = $pagename;
						   $pagedeso = $pagedesc;
						}
						else
						{
						   $pagenamo = "";
						   $pagedeso = "";
						}
				     
					 DB::insert('insert into testimonials (name, description , image, lang_code, token, parent) values (?, ? ,?, ?, ?, ?)', [$pagenamo,$pagedeso,$savefname, $code,$token,$id]);
				 }
				 else
				 {
				   DB::update('update testimonials set name="'.$pagename.'",description="'.$pagedesc.'",image="'.$savefname.'" where lang_code="'.$code.'" and parent = ?', [$id]);
				 }
			
			}
		}
		
		
		
		/*DB::update('update testimonials set name="'.$name.'",description="'.$desc.'",image="'.$savefname.'" where id = ?', [$id]);*/
		
			return back()->with('success', 'Testimonial has been updated');
        }
		
		
		
		
    }
}
