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
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.rvn_field{
	height: 50px;
	border: #0369A7 solid 1px;
	border-radius: 10px;
	margin-top: 20px;
	margin-bottom: 5px;
}
.rvn_field::placeholder{color: #0369A7;}
.rvn_btn{
	border-radius: 10px;
	background: #0369A7;
	border-color: #0369A7;
	height: 50px;
	margin-top: 10px;
	}
.twitter{
    color: #fff;
    background: #00aced;
    line-height: 40px;
    border:1px solid #00aced !important;
    background-color : #00aced;
  }
.twitter a:hover{color: #fff;}
.text-twitter{
      color: #00aced;
  }
</style>
</head>
<body>
	<div class="container-fluid">
	<div class="row"> 
		<div class="col-lg-7"> <img src="https://images.pexels.com/photos/459198/pexels-photo-459198.jpeg" alt="Flying Bird" width="700px" /> </div>
		<div class="col-lg-5"> 

		
		<h1> Sign in  here</h1>

		<?= form_open(); ?>
		  
			<div class="form-group"> 
			<input type="text" name="email" class="form-control rvn_field" placeholder="Enter Email Address" >
			</div>
			<div class="form-group"> <input type="password" name="password" class="form-control rvn_field" placeholder="Enter Password" /></div>
			<div class="row mt-md-4 mt-2"> 
			<div class="col-6"><a href="#"><small>Forgot Password?</small></a></div>
			<div class="col-6"><small>New here? <a href="#"> Create Account</a></small></div>
			</div>
			<div class="form-group"> <button class="form-control btn btn-primary rvn_btn" type="submit" name="submit"> Sign in</button> </div>
		 
             <h5 class="mt-3">LOGIN VIA SOCIAL ACCOUNT</h5>
           <!-- Twitter Login Button !-->

			<?php if(!empty($url)):?>
			<div class="form-group"><a href="<?= $url ?>" class="form-control btn twitter rvn_btn mt-3 p-1"><span class="float-start py-1 mt-0 mb-1 px-1 rounded-start bg-white text-twitter fs-5"><i class="bi bi-twitter px-1"></i></span> Login with Twitter</a> </div> 
			<?php endif; ?>
		 <pre>
		 
		 </pre>
		<?= form_close(); ?>
		
		</div>
	</div>
	
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
	</body>
</html>
	
