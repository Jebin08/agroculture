<?php
session_start();
include("include/dbconnect.php");
include("email.php");
extract($_POST);
$uname=$_SESSION['uname'];
$pid = $_REQUEST['pid'];
$sel = mysqli_query($connect, "SELECT * FROM rt_customer WHERE uname='$uname'") or die("query image field error".mysql_error());
$se=mysqli_fetch_array($sel);
$email=$se['email'];
$mobile=$se['mobile'];
$otp1=$se['otp'];
$select = mysqli_query($connect, "SELECT * FROM rt_product WHERE id ='$pid'") or die("query image field error".mysql_error());
$s=mysqli_fetch_array($select);
$category=$s['category'];
$sea = mysqli_query($connect, "SELECT * FROM rt_product WHERE id ='$pid'") or die("query image field error".mysql_error());
$prow = mysqli_fetch_array($sea);
///////////
$cal = mysqli_query($connect, "SELECT * FROM rt_product WHERE id ='$pid'")or die("".mysql_error());
$cals = mysqli_fetch_array($cal);
$tot_qty=$cals['quantity'];
$rdate=date("d-m-Y");



/////////////////////
if(isset($butsub)){

	if($tot_qty>0)
	{	
		if($tot_qty>=$uqut)
		{


$inspur_ord = mysqli_query($connect, "INSERT INTO rt_cart(id,uname,pid,status,rdate,price,category,quantity,uqut,amount,pname,deli_mode,shipping_address,retailer) VALUES('$id','$uname','$pid','0','$rdate','".$prow['price']."','$category','".$cals['quantity']."','$uqut','$amount','".$prow['product']."','$deli_mode','$shipping_address','".$prow['retailer']."')");

/******************************************calculation work*************************************/

$total = $cals['quantity'] - $uqut;
$otp=rand(1000,9999);

$action  = mysqli_query($connect, "UPDATE rt_product SET quantity='$total' WHERE id='$pid'")or die("update error".mysql_error());
$action1  = mysqli_query($connect, "UPDATE rt_customer SET otp='$otp' WHERE uname='$uname'")or die("update error".mysql_error());

$q1=mysqli_query($connect,"select * from rt_cart where uname='$uname' ORDER BY id DESC");
$row1=mysqli_fetch_array($q1);
$id=$row1['id'];

if($inspur_ord != 0){
    $message="Dear($uname) otp is $otp";
        echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name=Consumer&mess='.$message.'&mobile='.$mobile.'" frameborder="0" style="display:none"></iframe>';
$mess1="User($uname) successfully Added in Product '".$prow['product']."' for Your cart" ;
/* echo '<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message='.$mess1.'&email='.$email.'&subject=Agro Culture - $uname" frameborder="0" style="display:none"></iframe>';
 */
        
                    ?>
                    <script>
                        alert("Added to Your Cart");
                    //Using setTimeout to execute a function after 5 seconds.
                    setTimeout(function () {
                       //Redirect with JavaScript
                       window.location.href= 'cart.php?pid=<?php echo $pid;?>&id=<?php echo $id;?>';
                    }, 5000);
                    </script>
                    <?php

			
				

}
			}
			else
			{
			echo '<script language="">alert("Available only '.$tot_qty.' qunatity!")</script>';
			}
	}
	else
	{
	echo '<script language="">alert("You have could not purchase this product!")</script>';

	}

}
?>
						            


 
<html>

<head>
    <meta charset="utf-8">
    <title><?php include("include/title.php"); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="static/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="static/lib/animate/animate.min.css" rel="stylesheet">
    <link href="stati/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="static/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    Customer: <?php echo $uname;?>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>
                   
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Agro</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1"> Culture</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="cart.php?act=search">
                    <div class="input-group">
                        <input type="text" name="getval" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                            <button type="submit" name="bt" value="bt"><i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
  

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        {% for ds in data2 %}
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ds[0]}} <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
								{% for ds1 in ds[1] %}
                                <a href="/userhome?act=ct&cat={{ds1[2]}}&rt={{ds1[1]}}" class="dropdown-item">{{ds1[2]}}</a>
                                {% endfor %}
                            </div>
                        </div>
						{% endfor %}
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Digital</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Farming</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                        <a href="userhome.php" class="nav-item nav-link">Home</a>
                            <a href="cart.php" class="nav-item nav-link">Cart</a>
                            <a href="purchase.php" class="nav-item nav-link">Purchased</a>
							<a href="logout.php" class="nav-item nav-link">Logout</a>
                            <!--<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>-->
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!--<a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>-->
                            <a href="purchase.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="userhome.php">Home</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
				<form name="form1" method="post" action="">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
						Product:<?php echo $s['product'];?>
                        <tr>
                            <td class="align-middle"><?php echo $s['product'];?></td>
                            <td class="align-middle"> <input type="text" id="price" name="price" value="<?php echo $s['price'];?>"class="form-control form-control-sm bg-secondary border-0 text-center"></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <!--<div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>-->
									<input type="hidden" name="retailer" value="<?php echo $s['retailer'];?>">
									<input type="hidden" name="pid" value="<?php echo $pid;?>">
                                    <input type="text" id="uqut" name="uqut" class="form-control form-control-sm bg-secondary border-0 text-center">
									
									<span style="color:#FF0000"><?php echo $s['quantity'];?> products only available</span>

                                    <!--<div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>-->
                                </div>
                            </td>
                            <td class="align-middle"><input type="text" id="amount" name="amount" class="form-control form-control-sm bg-secondary border-0 text-center" readonly></td>
                            <td class="align-middle"><a href="cart.php?act=del&did=<?php echo $s['id'];?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <tr>
                            <td class="align-middle">
                                <label>Delivery Mode</label>
                              <select name="deli_mode" class="form-control form-control-sm bg-secondary border-0 text-center">
                                <option value="">Choose</option>
                                <option value="Home Delivery">Home Delivery</option>
                                <option value="Farm Shopping">Farm Shopping</option>
                              </select>

                            </td>
                            <td class="align-middle">
                                <label>Shopping Address</label>
                                <textarea name="shipping_address" class="form-control form-control-sm bg-secondary border-0 text-center"></textarea>
                            </td>

                        </tr>
						

                        
                    </tbody>
                </table>
                <?php
 if($act=="del")
{
    $did=$_REQUEST['did'];
    mysqli_query($connect,"delete from rt_cart where id=$did");
    ?>
<script language="javascript">
    alert("return to User home page");
window.location.href="userhome.php";
</script>
<?php
}
?>
				
				<div class="row">
					<div class="col-md-4">

					</div>
					<div class="col-md-4">
					
				<input type="submit" name="butsub" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Check">
					</div>
				</div>
				</form>
				
				
            </div>
            <div class="col-lg-4">
                <!--<form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>-->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <!--<div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>-->
                    <?php 
                    $l = mysqli_query($connect, "select * from rt_cart where uname='$uname' ORDER BY id DESC LIMIT 1") or die("query image field error".mysqli_error());
                    while($e=mysqli_fetch_array($l))
                    {
                    $amount=$e['amount'];
                    $id=$e['id'];
                   

                    ?>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rs. <?php echo $amount;?></h5>
                            <?php
                    }
                    ?>
                        </div>
						
						<form name="form3" method="post" action="">
						<input type="hidden" name="ch" value="3">
						<input type="text" name="otp" class="form-control" placeholder="Enter OTP" required>
                        <button type="submit" name="$btn2" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Confirm</button>
						</form>
                        <?php 
                        if(isset($btn2))
                        {
                            $qry=mysqli_query($connect,"select * from  rt_customer where uname='$uname' && otp='$otp'");
                            $num=mysqli_num_rows($qry);
                                if($num==1)
                                {
                                    ?>
                                <span style="color:#009900"><?php echo "Otp verified";?></span>

                           <?php

                                }
                                else
                                {
                                    ?>
                                <span style="color:#FF0000"><?php echo "Wrong Otp!!";?></span>

                                  <?php

                               
                                }
                            
                            }
                            ?>

						<form name="form2" method="post" action="">
						<input type="hidden" name="ch" value="2">
						<input type="text" name="card" class="form-control" placeholder="Card No." required>
                        <button type="submit" name="btn3" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Buy Now</button>
						</form>
                        <?php
                        if(isset($btn3)){

                            if($tot_qty>0)
                            {	
                                if($tot_qty>=$uqut)
                                {
                        
                        
                        
                       
                        
                        
                        $action  = mysqli_query($connect, "UPDATE  rt_cart SET status='1' where id='$id'")or die("update error".mysql_error());
                        
                        
                        
                        if($action != 0){
                            $message="User($uname) successfully paid $amount for the product of '".$prow['product']."'";

                                echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name=Consumer&mess='.$message.'&mobile='.$mobile.'" frameborder="0" style="display:none"></iframe>';
                        $mess1="User($uname) successfully paid $amount for the product of '".$prow['product']."'";
                        
                                
                                    $objEmail	=	new CI_Email();
                                    $objEmail->from('iotcloudadmin@iotcloud.co.in', "Agro Culture");
                                    $objEmail->to("$email");
                                    
                                    //$objEmail->cc($txt_cc);
                                    //$objEmail->bcc($txt_bcc);
                                    $objEmail->subject("Agro Culture - $uname");
                                    $objEmail->message("$mess1");
                                    //send mail
                                        
                                        if ($objEmail->send())
                                        {	
                                            @header('Location:cart.php?pid='.$pid.'');
                        
                                        }
                                        else
                                        {	
                                        //echo "not";
                                        }
                        
                        
                        }
                                    }
                                    else
                                    {
                                    echo '<script language="">alert("Available only '.$tot_qty.' qunatity!")</script>';
                                    }
                            }
                            else
                            {
                            echo '<script language="">alert("You have could not purchase this product!")</script>';
                        
                            }
                        
                        }

                        ?>
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
             <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">Digital Farming is the process of ensuring you carry merchandise that Farmers want, with neither too little nor too much on hand.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Agriculture, Tamilnadu, India</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>agri@info.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="/userhome"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="/cart"><i class="fa fa-angle-right mr-2"></i>Cart</a>
                            <a class="text-secondary mb-2" href="/logout"><i class="fa fa-angle-right mr-2"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    Digital Farming <a class="text-primary" href="#"></a>
                    
                    <a class="text-primary" href="https://htmlcodex.com"></a>
                    <br> <a href="https://themewagon.com" target="_blank"></a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="../static/img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
    $('#price, #uqut').change(function(){
    var price = parseFloat($('#price').val()) || 0;
    var uqut = parseFloat($('#uqut').val()) || 0;

    $('#amount').val(price * uqut);    
});
</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../static/lib/easing/easing.min.js"></script>
    <script src="../static/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../static/mail/jqBootstrapValidation.min.js"></script>
    <script src="../static/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../static/js/main.js"></script>
</body>

</html>