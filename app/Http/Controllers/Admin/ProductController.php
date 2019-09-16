<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $products = DB::table('product')
		               ->where('parent', '=', 0)
		                ->orderBy('prod_id','desc')
					   ->get();
        
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
        return view('admin.product', ['products' => $products, 'setts' => $setts]);
    }
	
	
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $prod_token = $data['prod_token'];
	   
	   $image_count = DB::table('product_images')->where('prod_token', $prod_token)->count();
		
		if(!empty($image_count))
		{
	   
	   foreach($prod_token as $postt)
	   {
		   
	  
	  $image = DB::table('product_images')->where('prod_token', $postt)->first();
		$orginalfile=$image->image;
		$media="/media/";
       $path = base_path('images'.$media.$orginalfile);
	  File::delete($path);
	  
	   DB::delete('delete from product_images where prod_token = ?',[$postt]);
	   DB::delete('delete from product where prod_token = ?',[$postt]);
		   
	   }
	   
	   }
	
	return back();
	
	
	}
	
	
	
	
	
	
	public function destroy($id) {
	
	
		
		$image_count = DB::table('product_images')->where('prod_token', $id)->count();
		
		if(!empty($image_count))
		{
		$image = DB::table('product_images')->where('prod_token', $id)->first();
		
		$orginalfile=$image->image;
		$media="/media/";
       $path = base_path('images'.$media.$orginalfile);
	  File::delete($path);
	  DB::delete('delete from product_images where prod_token = ?',[$id]);
	  }
      DB::delete('delete from product where prod_token = ?',[$id]);
	   
      return back();
      
   }
	
}