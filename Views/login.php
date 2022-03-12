<!DOChtml>
<!-- General Login page !-->
<html>
<head> 
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Login Page </title>

</head>
<body>
	<div class="container-fluid">
	<div class="row"> 
		<div class="col-lg-7"> <p > </div>
		<div class="col-lg-5 offset-lg-7"> 
		<!-- print success message !-->
			<?php if($page_session->getTempdata('success')): ?>
				<div class="alert alert-success" role="alert"><?= $page_session->getTempdata('success');?></div>
				<?php endif;?>
				<?php if(isset($success)):?>
				<div class="alert alert-success" role="alert"><?= $success;?></div>
				<?php endif ?>
				<?php if(isset($error)):?>
				<div class="alert alert-danger" role="alert"><?= $error;?></div>
				<?php endif ?>
			<?php if(isset($validation)): ?>
			<div class="alert alert-danger">
			<?= $validation->listErrors()?>
			</div>
			<?php endif;?>

			<?php if(session()->getTempdata('error')):?>
			<div class="alert alert-danger">  <?= session()->getTempdata('error');?></div>
			<?php endif;?>
		
		<h1> Sign in  here</h1>

		<?= form_open(); ?>
		  
			<div class="form-group"> 
			<input type="text" name="email" class="form-control" placeholder="Enter Email Address" value="<?= set_value('email') ?>">
			</div>
			<div class="form-group"> <input type="password" name="password" class="form-control" placeholder="Enter Password" /></div>
			<div class="row mt-md-4 mt-2"> 
			<div class="col-6"><a href="<?= base_url()?>/login/forgot"><small>Forgot Password?</small></a></div>
			<div class="col-6"><small>New here? <a href="<?= base_url()?>/register"> Create Account</a></small></div>
			</div>
			<div class="form-group"> <button class="form-control btn btn-primary rvn_btn" type="submit" name="submit"> Sign in</button> </div>
		  

            
             
              
             <h5 class="mt-3">LOGIN VIA SOCIAL ACCOUNT</h5>
           <!-- Twitter Login Button !-->

			<?php if(!empty($url)):?>
			<div class="form-group"><a href="<?= $url ?>" class="form-control btn twitter mt-3 p-1"><span class="float-start py-2 mt-0 mb-1 px-1 rounded-start bg-white text-twitter fs-4"><i class="fa fa-twitter px-1"></i></span> Login with Twitter</a> </div> 
			<?php endif; ?>
		 
		<?= form_close(); ?>
		
		</div>
	</div>
	
	</div>


	
	