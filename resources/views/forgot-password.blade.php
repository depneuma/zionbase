<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$headertype = $setts[0]->header_type;
$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }		
	?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     @include('static')
    

	
    <div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 322, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	<div class="clear height40"></div>
	
	
	<div class="container">
    <div class="">
     <div class="col-md-2"></div> 
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo translate( 322, $lang);?></div>
                <div class="panel-body">
                    @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('forgot-password') }}" id="formID">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label para black"><?php echo translate( 127, $lang);?></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input radiusoff" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn avg_very_small_button radiusoff">
                                    <?php echo translate( 325, $lang);?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="col-md-2"></div> 
    </div>
</div>
	
	
	<div class="height30"></div>

      
	   <div class="clear clearfix"></div>

      @include('footer')
</body>
</html>