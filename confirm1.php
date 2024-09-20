<?php
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$pid = $_REQUEST['pid'];

$select = mysqli_query($connect, "SELECT * FROM rt_product WHERE id ='$pid'") or die("query image field error".mysql_error());
$sea = mysqli_query($connect, "SELECT * FROM rt_product WHERE id ='$pid'") or die("query image field error".mysql_error());
$prow = mysqli_fetch_array($sea);
///////////
$cal = mysqli_query($connect, "SELECT * FROM rt_product WHERE id ='$pid'")or die("".mysql_error());
$cals = mysqli_fetch_array($cal);
$tot_qty=$cals['quantity'];
$pur_id=$_SESSION['purchase_id'];




$catid=$cals['catid'];
/////////////////////
if(isset($butsub)){

	if($tot_qty>0)
	{	
		if($tot_qty>=$uqut)
		{
$day1=date("d");
$month1=date("M");
$year1=date("Y");


$inspur_ord = mysql_query("INSERT INTO user_purchase(catergory,pname,author,price,uqut,uname,pid,nid,day1,month1,year1) VALUES('$catid','".$prow['product']."','".$prow['author']."',
'".$prow['price']."','$uqut','$uname',$pur_id,'".$prow['id']."',$day1,'$month1',$year1)");

/******************************************calculation work*************************************/

$total = $cals['quantity'] - $uqut;

$action  = mysqli_query($connect, "UPDATE product SET quantity='$total' WHERE id='$pid'")or die("update error".mysql_error());



if($inspur_ord != 0){
@header('Location:user_purch_view.php');
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
						            


 

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?php include("title.php");?></title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <style>
        .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>

<body>

	<?php include("include/title1.php");?>

	
	
	<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-2">
							<ul class="nav navbar-nav menu__list">
								<?php include("include/userheader.php");?>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>

	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
                <?php include("include/userlink.php");?>
				</ul>
			</div>
		</div>
	</div>
				
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Confirm Product
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
			
					<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table class="table table-responsive">

    <tr>
      <td bgcolor=""><table width="" border="0" align="center" cellpadding="10">
        <tr>
          <?php 
	$row = mysql_fetch_array($select);
	?>
          <td>&nbsp;</td>
          <td><img src="<?php echo $row['product_image']; ?>" alt="img" class="img img-responsive" width="200" height="200"/></td>
        </tr>
        <tr>
          <td><strong>Catergory</strong></td>
          <td>
            <?php
			$cqry=mysql_query("select * from category where id=$catid");
			$crow=mysql_fetch_array($cqry);
		
			echo $crow['category'];
			?>			</td>
        </tr>
        <tr>
          <td><strong>Product Name </strong></td>
		   <td><label><?php echo $row['product']; ?></label></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
          <td><strong>Price</strong></td>
		          <td><label><?php echo $row['price']; ?></label></td>
        </tr>
        <tr>
          <td><strong>Actual quntity </strong></td>
          <td><?php echo $row['quantity']; ?></td>
        </tr>
        <tr>
          <td><strong>quantity</strong></td>
          <td><input type="text" name="uqut" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
            <td><input name="butsub" type="Submit" id="butsub" value="Submit" onClick="return validate()" />
			<script>
              return validate() {
                window.location.href="addcard.php";
      }
    </script>


        </tr>
      </table></td>
    </tr>
  </table>
</form>
</div>
	</div>
	</div>
	</div>
	</div>
		  
		  
						


	
	
	<?php include("footer1.php");?>



</body>

</html>