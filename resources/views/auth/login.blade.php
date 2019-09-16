@extends('layouts.app')

@section('content')

	
<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");

$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
function translate_header($id,$lang) 
{					
	if($lang == "en")
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->count();			
	}
	else
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->count();			
	}				
	if(!empty($translate_cnt))
	{
					return $translate[0]->name;
	}
	else
	{
	  return "";
	}
}
?>


<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate_header( 31, $lang);?></h1>
           
       
    </div>


<div class="height30"></div>
<div class="container">
    <div class="">
	
	
	 @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	 <div class="col-md-2"></div> 
 	
	
	
        <div class="col-md-8">
        <div>
        @if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
    </div>
        
        
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo translate_header( 31, $lang);?></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label para black"><?php echo translate_header( 328, $lang);?></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control radiusoff" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label para black"><?php echo translate_header( 256, $lang);?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label class="para black">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <?php echo translate_header( 331, $lang);?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn avg_very_small_button radiusoff">
                                    <?php echo translate_header( 31, $lang);?>
                                </button>

                                <a class="btn btn-link para gold" href="{{ route('forgot-password') }}">
                                    <?php echo translate_header( 334, $lang);?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div align="center">
                            
                            <div class="ffleft">
                            <a href="{{ url('/login/facebook') }}">

<img src="<?php echo $url;?>/local/images/facebook_btn.png" border="0" alt="facebook login" class="img-responsive" />
</a></div>
        
       <div class="ffleft"> 
   <a href="{{ url('/login/google') }}" class="">
<img src="<?php echo $url;?>/local/images/google_btn.png" border="0" alt="google plus login" class="img-responsive" />
</a></div>
                            
</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
       <div class="col-md-2"></div> 
        
        
    </div>
</div>
@include('footer')
@endsection
