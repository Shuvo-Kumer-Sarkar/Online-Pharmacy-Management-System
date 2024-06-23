<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><h2><?php echo $_SESSION['setting_name'] ?></h2></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home"><span>  <i class="fa fa-home"></i>  </span>Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span> <span class="badge badge-danger item_count">0</span> <i class="fa fa-cart-plus"></i>  </span>Cart</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=ambulance"><span>  <i class="fa fa-ambulance"></i>  </span>Ambulance</a></li>
                      
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about"><span>  <i class="fa fa-address-book"></i>  </span>About Us</a></li>
                        <?php if(isset($_SESSION['login_user_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome ". $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off"></i></a></li>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now"><span>  <i class="fa fa-user-circle"></i>  </span>Login</a></li>
                      <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>

        
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
        <footer class="bg-light py-5">
    
        <center>

        <div class="parts container row" style="margin-top:30px;padding-bottom:30px; background:#EAEAEAE6;width: 101%;"> 
				<div class="col-md-4 text-center" style="margin-top:60px;padding-bottom:30px;"> 
					<img src="assets/images/31.png" alt="" />
          <h3 style="color:green; font-family:Times New Roman;">Same Day Delivery</h3>
                    <p>We deliver your medicine on the same day you order. Customer satisfaction is our main goal!</p>
				</div>
				
				<div class="col-md-4 text-center" style="margin-top:60px;padding-bottom:30px;">  
					<img src="assets/images/33.png" alt="" />
          <h3 style="color:green; font-family:Times New Roman;">Quality Medicine</h3>
                    <p>We deliver the best medicines for the customers for better results to both customers and ourselves.</p>
				</div>

        <div class="col-md-4 text-center" style="margin-top:60px;padding-bottom:30px;"> 
					<img src="assets/images/32.png" alt="" />
                    <h3 style="color:green; font-family:Times New Roman;">Our Stock</h3>
                    <p>We stock all kind of medicine, even we have same medicine from different companies. We tend to serve every customer with their medical needs.</p>
				</div>
        
        </center>
				
				
			</div>
            <div class="container"><div class="medium text-center text-danger">We deliver your medicine on the same day you order. Customer satisfaction is our main goal!
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
