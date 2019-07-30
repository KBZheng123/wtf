<?php
	include_once('function.php');
	include_once('function_product.php');
	getDB();
	$product = get_products();
	$count=count($product) - 1;
    $action = filter_input(INPUT_GET, 'action');
    if(empty($action)){
        $action = filter_input(INPUT_POST, 'action');
    }
    $productID = filter_input(INPUT_GET, 'productID');
    if($action=='show'){
        $product1 = get_product_by_id($productID);
    }
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

<script type="text/javascript" src="./productdetail_files/jquery-1-4-2.min.js.download"></script> 
<link rel="stylesheet" href="./productdetail_files/slimbox2.css" type="text/css" media="screen"> 
<script type="text/JavaScript" src="./productdetail_files/slimbox2.js.download"></script> 


</head>

<body data-gr-c-s-loaded="true"><div class="ddshadow toplevelshadow" style="left: 471.313px; top: 175px;"></div><div class="ddshadow toplevelshadow" style="left: 365.625px; top: 175px;"></div>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="productdetail.php#">Online Shoes Store</a></h1></div>
        <div id="header_right">
        	<p>
	        <a href="productdetail.php#">My Account</a> | <a href="productdetail.php#">My Wishlist</a> | <a href="productdetail.php#">My Cart</a> | <a href="productdetail.php#">Checkout</a> | <a href="productdetail.php#">Log In</a></p>
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
                <li><a href="faqs.php">FAQs</a></li>
                <li><a href="checkout.php">Checkout</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <br style="clear: left">
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="productdetail.php#" method="get">
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
                        <h4><a href="productdetail.php?action=show&productID=<?php echo $value['productID'] ?>"><?php echo $value['productName'] ?></a></h4>
                        <p class="price"><?php echo $value['price'] ?></p>
                        <div class="cleaner"></div>
                    </div>
                	<?php }
                	?>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
        	<h1><?php echo $product1['productName'] ?></h1>
            <div class="content_half float_l">
        	<a rel="lightbox[portfolio]" href="images/product/<?php echo $product1['image']?>"><img src="images/product/<?php echo $product1['image']?>" alt="image"></a>
            </div>
            <div class="content_half float_r">
                <table>
                    <tbody><tr>
                        <td width="160">Price:</td>
                        <td><?php echo $product1['price']?></td>
                    </tr>
                    <tr>
                        <td>Availability:</td>
                        <td>In Stock</td>
                    </tr>
                    <tr>
                        <td>Model:</td>
                        <td>Product 14</td>
                    </tr>
                    <tr>
                        <td>Manufacturer:</td>
                        <td>Apple</td>
                    </tr>
                    <tr>
                    	<td>Quantity</td>
                        <td><input type="text" value="1" style="width: 20px; text-align: right"></td>
                    </tr>
                </tbody></table>
                <div class="cleaner h20"></div>

                <a href="shoppingcart.php" class="addtocart"></a>

			</div>
            <div class="cleaner h30"></div>
            
            <h5>Product Description</h5>
            <p><?php echo $product1['description']?></p>	
            
          <div class="cleaner h50"></div>
            
            <h3>Related Products</h3>
        	<div class="product_box">
            	<a href="productdetail.php"><img src="./productdetail_files/01.jpg" alt=""></a>
                <h3>Ut eu feugiat</h3>
                <p class="product_price">$ 100</p>
                <a href="shoppingcart.php" class="addtocart"></a>
                <a href="productdetail.php" class="detail"></a>
            </div>        	
            <div class="product_box">
            	<a href="productdetail.php"><img src="./productdetail_files/02.jpg" alt=""></a>
                <h3>Curabitur et turpis</h3>
                <p class="product_price">$ 200</p>
                <a href="shoppingcart.php" class="addtocart"></a>
                <a href="productdetail.php" class="detail"></a>
            </div>        	
            <div class="product_box no_margin_right">
            	<a href="productdetail.php"><img src="./productdetail_files/03.jpg" alt=""></a>
                <h3>Mauris consectetur</h3>
                <p class="product_price">$ 120</p>
                <a href="shoppingcart.php" class="addtocart"></a>
                <a href="productdetail.php" class="detail"></a>
            </div>     
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p><a href="productdetail.php#">Home</a> | <a href="productdetail.php#">Products</a> | <a href="productdetail.php#">About</a> | <a href="productdetail.php#">FAQs</a> | <a href="productdetail.php#">Checkout</a> | <a href="productdetail.php#">Contact Us</a>
		</p>

		Copyright © 2072 <a href="productdetail.php#">Your Company Name</a> <!-- Credit: www.templatemo.com -->
    	
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->


<div id="lbOverlay" style="display: none;"></div><div id="lbCenter" style="display: none;"><div id="lbImage"><div style="position: relative;"><a id="lbPrevLink" href="productdetail.php#"></a><a id="lbNextLink" href="productdetail.php#"></a></div></div></div><div id="lbBottomContainer" style="display: none;"><div id="lbBottom"><a id="lbCloseLink" href="productdetail.php#"></a><div id="lbCaption"></div><div id="lbNumber"></div><div style="clear: both;"></div></div></div></body></html>