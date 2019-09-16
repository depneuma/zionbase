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
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    
@include('static')
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 106, $lang);?></h1>
           
       
    </div>
	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	<div class="container">
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    <div class="profile">
		<div class="col-md-3">
        <div class="height20"></div>
			<div class="profile-sidebar">
				
				<div class="profile-userpic" align="center">
				<?php 
				$url = URL::to("/");
				$userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$editprofile[0]->photo;
						if($editprofile[0]->photo!=""){?>
					<img src="<?php echo $url.$path;?>" class="img-responsive round" alt="">
						<?php } else { ?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive round" alt="">
						<?php } ?>
				</div>
				<div class="height20"></div>
				<div class="profile-usertitle text-center">
					
					<?php $sta=$editprofile[0]->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst=translate( 241, $lang); } ?>
					
				</div>
				
				
				
				<div class="profile-usermenu" align="center">
					<ul class="nav">
						<!--<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>-->
                        
                        
                        
						<li>
							<a href="<?php echo $url;?>/dashboard" class="ash h4">
							
                            <i class="lnr lnr-home  bold"></i>
							<?php echo translate( 244, $lang);?> </a>
						</li>
						
                        <?php if($setts[0]->site_blog=="on" || $setts[0]->site_sermon=="on" || $setts[0]->site_event=="on"){?>
						<li>
							<a href="<?php echo $url;?>/my-comments" class="ash h4">
							
                            <i class="lnr lnr-bubble  bold"></i>
							<?php echo translate( 25, $lang);?> <span class="roundbg"><?php echo $viewpost;?></span></a>
						</li>
                        
                        <?php } ?>
						
						<?php if($sta!=1){?>
						<li>
						<?php if(config('global.demosite')=="yes"){?>
						<a href="#" class="btndisable ash h4"> <i class="lnr lnr-trash bold"></i>
							<?php echo translate( 247, $lang);?> <span class="disabletxt" style="font-size:13px;">( <?php echo config('global.demotxt');?> )</span>
							</a> 
						<?php } else { ?>
						
							<a href="<?php echo $url;?>/delete-account" onClick="return confirm('<?php echo translate( 250, $lang);?>');" class="ash h4">
							
							
                            <i class="lnr lnr-trash bold"></i>
							<?php echo translate( 247, $lang);?>
							</a>
						<?php } ?>
						</li>
						<?php } ?>
						
						<li>
							<a href="<?php echo $url;?>/logout" class="ash h4">
							
                            <i class="lnr lnr-exit bold"></i>
							<?php echo translate( 28, $lang);?> </a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		<div class="col-md-9 moves20">
        <div class="height20"></div>
           
			   
			   <div class="panel-body" style="border-top:none !important; border-bottom:none !important; border-right:none !important;">
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"><?php echo translate( 253, $lang);?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control validate[required] text-input radiusoff" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><?php echo translate( 127, $lang);?></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input radiusoff" name="email" value="<?php echo $editprofile[0]->email;?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><?php echo translate( 256, $lang);?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff"  name="password" value="">

                                
                            </div>
                        </div>

                        
						
						<input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">
						
						 <input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
						
						 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label"><?php echo translate( 136, $lang);?></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control validate[required] text-input radiusoff" value="<?php echo $editprofile[0]->phone;?>" name="phone">
								@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label"><?php echo translate( 259, $lang);?></label>

                            <div class="col-md-6">
							<select name="gender" class="form-control validate[required] text-input radiusoff">
							  
							  <option value=""></option>
							   <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>>Male</option>
							   <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>>Female</option>
							</select>
                               
                            </div>
                        </div>
						
						
						
						
						<div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label"><?php echo translate( 262, $lang);?></label>

                            <div class="col-md-6">
                                <input type="file" id="photo" name="photo" class="form-control radiusoff">
								@if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
						
						
						<input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">
                        
                        <input type="hidden" name="save_gender" value="<?php echo $editprofile[0]->gender;?>">
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary btndisable"><?php echo translate( 265, $lang);?></button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="avg_small_button radiusoff white">
                                    <?php echo translate( 265, $lang);?>
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
                   
                </div>
				
				
			   
			    <div class="height20"></div>
			    <div class="profile-content">
			   
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
			   
			   
            </div>
		</div>
	</div>


	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>