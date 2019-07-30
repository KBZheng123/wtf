<?php
    include_once('function.php');
    include_once('function_product.php');
    getDB();
    $product = get_products();
    $count=count($product) - 1;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="HTML/XHTML namespace.html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shoes Store from templatemo</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body data-gr-c-s-loaded="true"><div class="ddshadow toplevelshadow" style="left: 471.313px; top: 175px;"></div><div class="ddshadow toplevelshadow" style="left: 365.625px; top: 175px;"></div>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="faqs.php#">Online Shoes Store</a></h1></div>
        <div id="header_right">
        	<p>
	        <a href="faqs.php#">My Account</a> | <a href="faqs.php#">My Wishlist</a> | <a href="faqs.php#">My Cart</a> | <a href="faqs.php#">Checkout</a> | <a href="faqs.php#">Log In</a></p>
            <p>
            	Shopping Cart: <strong>0 item</strong> ( <a href="shoppingcart.php">Show Cart</a> )
			</p>
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li style="z-index: 100;"><a href="products.php">Products</a>
                    <ul style="display: none; top: 40px; visibility: visible;">
                        <li><a href="#submenu1">Shoes</a></li>
                        <li><a href="#submenu2">Boots</a></li>
                  </ul>
                </li>
                <li style="z-index: 99;"><a href="about.php">About</a>
                    <ul style="display: none; top: 40px; visibility: visible;">
                        <li><a href="shippingpolicy.php">Shipping policy</a></li>
                        <li><a href="refundpolicy.php">Refund policy</a></li>
                        <li><a href="privacypolicy.php">Privacy policy</a></li>   
                  </ul>
                </li>
                <li><a href="faqs.php" class="selected">FAQs</a></li>
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <br style="clear: left">
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="faqs.php#" method="get">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field">
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn">
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Categories</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
                    	<li class="first"><a href="#">Shoes</a></li>
                        <li class="last"><a href="#">Boots</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Bestsellers </h3>   
                <div class="content"> 
                    <?php
                    for($i=0;$i<4;$i++){
                    $t =mt_rand(0,$count);
                    $value = $product[$t];
                    ?> 
                    <div class="bs_box">
                        <a href="productdetail.php?action=show&productID=<?php echo $value['productID'] ?>""><img src="images/product/<?php echo $value['image'] ?>" alt="image" /></a>
                        <h4><a href="productdetail.php?action=show&productID=<?php echo $value['productID'] ?>""><?php echo $value['productName'] ?></a></h4>
                        <p class="price"><?php echo $value['price'] ?></p>
                        <div class="cleaner"></div>
                    </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <div id="content" class="float_r faqs">
        	<h1>Refund policy</h1>

            <p>Thank you for shopping at ShoesStore. We are terribly sorry for any dissatisfaction you may have. We are here to help.<p>

            <h5>Returns</h5>
            <p>You have 30 days to return the item from the date you received it. To be eligible for a return, your item must be unused and in the same condition you bought it. A receipt or any proof of purchase is required.
            </p>
            
            <h5>Shipping</h5>
            <p>You will be responsible for your own shipping costs for returning your items. Shipping costs are unrefundable.</p>
            
            <h5>Refunds</h5>
            <p>Upon receiving your item, we will inspect it and inform you as soon as possible about the eligibility of the refund. If the refund is approved, we will initiate a refund to your credit account.</p>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p><a href="faqs.php#">Home</a> | <a href="faqs.php#">Products</a> | <a href="faqs.php#">About</a> | <a href="faqs.php#">FAQs</a> | <a href="faqs.php#">Checkout</a> | <a href="faqs.php#">Contact Us</a>
		</p>

		Copyright © 2072 <a href="faqs.php#">Your Company Name</a> <!-- Credit: www.templatemo.com -->
    	
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->


</body></html>