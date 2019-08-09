<html>
<head>
<title>POLITEKNIK NEGERI SUBANG</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Majestic Login Form Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>
<!-- /font files -->
<!-- css files -->
<link href="<?php echo base_url('assets/login/css') ?>/animate-custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/login/css') ?>/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url()?>assets/back/dist/swt/sweetalert.css" rel="stylesheet" />
<!-- /css files -->
</head>
<body>

<?php
    if (null !== $this->session->userdata('logged')){
        redirect(site_url('dashboard'));
    }
?>
	
<h1 class="w3ls">AUDIT MUTU INTERNAL</h1>			
<div id="container_demo" >
    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
        <div id="login" class="animate form">
			<form method="POST" action="<?= base_url('login/proses')?>" autocomplete="off"> 
                <h2>Login</h2> 
                <p> 
					<label for="username" class="uname" data-icon="u" ><span>Your username</span></label>
                    <input id="username" name="username" required="required" type="text" placeholder="USERNAME"/>
                </p>
                <p> 
                    <label for="password" class="youpasswd" data-icon="p"><span>Your password</span></label>
                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                </p>
                <p class="keeplogin"> 
					<input type="checkbox" id="brand" value="">
					<label for="brand"><span></span> Remember me?</label>
				</p>
                <p class="login button"> 
                    <input type="submit" value="Login" /> 
				</p>
                
            </form>
        </div>
		
	</div>
</div>
<script src="<?=base_url()?>assets/back/dist/swt/sweetalert.min.js"></script>
<script>

   //swal tambah gagal
   <?php if($this->session->userdata('gagal_proses')){ ?>
     swal("Oopss!", "Username dan Password Salah!", "error")
     <?php
     $this->session->unset_userdata('gagal_proses');
   } ?>

</script>

</body>
</html>
