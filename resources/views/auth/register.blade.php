@extends('layouts.app')

@section('content')

<?php
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
        
           
                <h1 class="h1 white text-center"><?php echo translate_header( 34, $lang);?></h1>
           
       
    </div>

	 
<div class="height30"></div>

<div class="container">
    <div class="">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo translate_header( 34, $lang);?></div>
                
				<div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label para black"><?php echo translate_header( 253, $lang);?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control radiusoff" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label para black"><?php echo translate_header( 127, $lang);?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control radiusoff" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label para black"><?php echo translate_header( 337, $lang);?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control radiusoff" name="password_confirmation" required>
                            </div>
                        </div>
						
						
						
						 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phoneno" class="col-md-4 control-label para black"><?php echo translate_header( 136, $lang);?></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control radiusoff" name="phone" required>
								@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label para black"><?php echo translate_header( 259, $lang);?></label>

                            <div class="col-md-6">
							<select name="gender" class="form-control radiusoff" required>
							  
							  <option value=""></option>
							   <option value="male">Male</option>
							   <option value="female">Female</option>
							</select>
                               
                            </div>
                        </div>
						
                        
                        <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label para black"><?php echo translate_header( 340, $lang);?></label>

                            <div class="col-md-6">
						{!! NoCaptcha::display() !!}
						@if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>The captcha field is required or invalid.</strong>
                            </span>
                        @endif
						 </div>
                        </div>
						
						
						<input type="hidden" name="usertype" value="0">
						
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn avg_very_small_button radiusoff">
                                    <?php echo translate_header( 34, $lang);?>
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
@include('footer')
@endsection
