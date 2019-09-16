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

class PagesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $pages = DB::table('pages')
		         ->where('parent', '=', 0)
				 ->get();

        return view('admin.pages', ['pages' => $pages]);
    }
	
	
	public function showform($id) {
	
	   $language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
      $pages = DB::select('select * from pages where page_id = ?',[$id]);
      return view('admin.edit-page',['pages'=>$pages, 'language' => $language]);
   }
   
   public function formview()

    {
        $language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
        return view('admin.add-page' , ['language' => $language]);

    }
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	
	
	
	 protected function addpagedata(Request $request)
    {
       
		
		
		
		
         
		 $data = $request->all();
			
         
        			
		$page_title=$data['page_title'];
		
		
		
		
		
		$page_desc = $data['page_desc'];
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		if(!empty($data['top_menu']))
		{
		   $topmeno = $data['top_menu'];
		}
		else
		{
		   $topmeno = "";
		}
		if(!empty($data['footer_menu']))
		{
		   $footermeno = $data['footer_menu'];
		}
		else
		{
		   $footermeno = "";
		}
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$page_title[$index];
		   $pagedesc=$page_desc[$index];
		   
		
			if($code=='en')
			   {
				   $parent=0;
			   }
			   else
			   {
			   
			       $pages = DB::table('pages')
		           	->where('token', '=', $token)
					->where('parent', '=', 0)
					->get();
					
					 $pages_cnt = DB::table('pages')
		           		->where('token', '=', $token)
					->where('parent', '=', 0)
					->count();
					if($pages_cnt==0)
					{
					
                       	$parent = $idd;				
					  
					   
					}
					else
					{
					   $parent=$pages[0]->page_id;
					}
					
					
			   }
		
		if(!empty($pagename))
		{
		   $pagenamo = $pagename;
		}
		else
		{
		   $pagenamo = "";
		}
		
		if(!empty($pagedesc))
		{
		   $pagedeo = $pagedesc;
		}
		else
		{
		   $pagedeo = "";
		}
		
		
		/*DB::insert('insert into gallery (name, image, lang_code, parent) values (?, ?, ?, ?)', [$pagename,$namef,$code,$parent]);*/
		
		$idd = DB::table('pages')-> insertGetId(array(
        'page_title' => $pagenamo,
		'post_slug' => $this->clean($slug),
		'page_desc' => htmlentities($pagedeo),
		'menu_top' => $topmeno,
		'menu_bottom' => $footermeno,
        'lang_code' => $code,
		'token' => $token,
		'parent' => $parent,
		'status' => 1,
			));
		
		
		}
		
		
		
		
		
		
			return back()->with('success', 'Page has been added');
        
		
		
		
		
    }
   
   
   protected function pagedata(Request $request)
    {
       
		
		
		
		
         
		 $data = $request->all();
			
         $page_id=$data['page_id'];
        			
		$page_title=$data['page_title'];
		
			
		$page_desc = $data['page_desc'];
		
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		if(!empty($data['top_menu']))
		{
		   $topmeno = $data['top_menu'];
		}
		else
		{
		   $topmeno = "";
		}
		if(!empty($data['footer_menu']))
		{
		   $footermeno = $data['footer_menu'];
		}
		else
		{
		   $footermeno = "";
		}
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$page_title[$index];
		   $pagedesc=$page_desc[$index];		
		   	
		   if($code=="en")
			{
			  
			  DB::update('update pages set page_title="'.$pagename.'",post_slug="'.$this->clean($slug).'",page_desc="'.htmlentities($pagedesc).'",menu_top="'.$topmeno.'",menu_bottom="'.$footermeno.'",lang_code="'.$code.'" where page_id = ?', [$page_id]);
			}
			else
			{
			    $counts = DB::table('pages')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $page_id)
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
				     DB::insert('insert into pages (page_title, post_slug, page_desc, menu_top, menu_bottom, lang_code, token, parent) values (?, ?, ?, ?, ?, ?, ?, ?)', [$pagenamo,$this->clean($slug),htmlentities($pagedeso),$topmeno,$footermeno,$code,$token,$page_id]);
				 }
				 else
				 {
				   DB::update('update pages set page_title="'.$pagename.'",post_slug="'.$this->clean($slug).'",page_desc="'.htmlentities($pagedesc).'",menu_top="'.$topmeno.'",menu_bottom="'.$footermeno.'" where lang_code="'.$code.'" and parent = ?', [$page_id]);
				 }
			
			}
		}
		
		
		
		
		/*DB::update('update pages set page_title="'.$page_title.'",page_desc="'.$page_desc.'" where page_id = ?', [$page_id]);*/
		
			return back()->with('success', 'Page has been updated');
        
		
		
		
		
    }
   
   
   public function status($status,$id,$sid) {
	 
	 DB::update('update pages set status="'.$sid.'" where page_id = ?',[$id]);
	 DB::update('update pages set status="'.$sid.'" where parent = ?',[$id]);
	 return back();
	 }
   
   
   protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $pageid = $data['page_id'];
	   
	   foreach($pageid as $id)
	   {
		   
		   
		   
		   DB::delete('delete from pages where page_id!=4 and page_id!=5 and page_id!=1 and parent = ?',[$id]);
      DB::delete('delete from pages where page_id!=4 and page_id!=5 and page_id!=1 and page_id = ?',[$id]);
		   
	   }
	   
      return back();
		
	}
   
   
   
   
   
	
	public function destroy($id) {
		
		  DB::delete('delete from pages where page_id!=4 and page_id!=5 and page_id!=1 and parent = ?',[$id]);
      DB::delete('delete from pages where page_id!=4 and page_id!=5 and page_id!=1 and page_id = ?',[$id]);
	   
      return back();
      
   }
	
}