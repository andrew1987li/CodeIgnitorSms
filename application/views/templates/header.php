<?php
  $this->load->helper('url');

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/assets/js/jquery-3.1.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Welcome</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('pages/view/home') ?>">Home</a></li>
        <li><a href="<?php echo site_url('pages/view/about'); ?>">About</a></li>
        <?php
           $sess_id = $this->session->userdata('logged_in');

           if(!empty($sess_id) && $sess_id == TRUE)
           {
                echo('<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="'.site_url('customers/index').'">Customers</a></li>
            <li><a href="'.site_url('smsmsg/index').'">ReceviedSms</a></li>
            <li class="divider"></li>
            <li><a href="'.site_url('smsmsg/sendsms').'">SendSms</a></li>
            <li><a href="'. site_url('users/logout')  .'">Logout</a></li>
          </ul>
        </li>');
           }else{
               
           }

        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">
        <?php 
            $sess_id = $this->session->userdata('logged_in');

           if(!empty($sess_id) && $sess_id == TRUE){
              echo ("Hi,".$this->session->userdata('username'));
           }else{
              echo ("Please log in to use all functions.");
           }

         ?>
         </p></li>
         <?php
            $e_msg='       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                     <div class="row">
                            <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="/index.php/users/login/" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                             <label class="sr-only" for="txtusername">User Name</label>
                                             <input type="text" class="form-control" id="txtusername" placeholder="User ID" required
                                               name="user_name">
                                        </div>
                                        <div class="form-group">
                                             <label class="sr-only" for="txtuserpwd">Password</label>
                                             <input type="password" class="form-control" id="txtuserpwd" placeholder="Password"  name="user_pwd" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                 </form>
                            </div>
                     </div>
                </li>
            </ul>
        </li>';
        if(!empty($sess_id) && $sess_id == TRUE)
           {
              

           }
           else{
              echo($e_msg);
           }

         ?>
 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



</body>
</html>