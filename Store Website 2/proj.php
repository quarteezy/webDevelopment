<!DOCTYPE html>
<html>
<head>
<title>DMTech</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylekoto.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgb(150, 194, 93); border: rgb(150, 194, 93);">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="proj.php">
                <img src="pics/logo.png" style="width:200px;">
                </a>
			</div>
            
			<div class="collapse pull-right navbar-collapse font1" id="myNavbar">
				<ul class="nav navbar-nav">
                    
					<li><a href="#" >Home</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="#">Cart</a></li>
					<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item nounderline" href="#">Sign Up</a></br>
                                <a class="dropdown-item nounderline" href="#">Log-in</a></br>
                            </div>
                    </li>
				</ul>
			</div>

            <form class="col-xs-4 form-inline pull-right searchmove">
                <div class="input-group col-md-10">
                    <input type="text" class="search-query form-control" placeholder="Search" />
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                        <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                </div>
            </form>
            
		</div>
	</nav>

    <div class="buildpc container-fluid" style="background: url(pics/pcb.png); background-size: cover; background-position: center center;">
        <div class="container-fluid">
			<h1 class="bot-left bebas" style="color:white">BUILD a PC</h1>
			<p class="text-bg" style="color:white">Our easy-to-follow gaming PC build guide will help you piece together a serious gaming machine.</p></br>
            <button class="btn font2" style="width:250px; height: 50px; margin-top: 10px; padding-top:3px;">LEARN MORE</button>
        </div>
    </div>

    <div class="pccomp container-fluid" style="background: url(pics/bg1.jpg); background-size: cover; background-position: center center;">
        <h1 class="bebas text-center" style="color:white">Explore Products</h1>

        <div class="col-md-2 shadowfilter">
            <div class="thumbnail">
                <a href="product.php" class="nounderline">
                    <img src="pics/ptk.png" style="width:50%">
                    <div class="caption">
                        <h2 class="text-center">PC Cases</h2>
                </div>
                </a>
            </div>
        </div>
        <span></span>

        <div class="col-md-2 shadowfilter">
            <div class="thumbnail">
                <a href="product.php" class="nounderline">
                    <img src="pics/bq.webp" style="width:50%">
                    <div class="caption">
                        <h2 class="text-center">Monitors</h2>
                </div>
                </a>
            </div>
        </div>
        <span></span>

        <div class="col-md-2 shadowfilter">
            <div class="thumbnail">
                <a href="product.php" class="nounderline">
                    <img src="pics/3060.png" style="width:50%">
                    <div class="caption">
                        <h2 class="text-center">Graphics Cards</h2>
                </div>
                </a>
            </div>
        </div>
        <span></span>

        <div class="col-md-2 shadowfilter">
            <div class="thumbnail">
                <a href="product.php" class="nounderline">
                    <img src="pics/lgm.webp" style="width:50%">
                    <div class="caption">
                        <h2 class="text-center">Mouses</h2>
                </div>
                </a>
            </div>
        </div>
        <span></span>

        <div class="col-md-2 shadowfilter">
            <div class="thumbnail">
                <a href="product.php" class="nounderline">
                    <img src="pics/lgk.png" style="width:66%;">
                    <div class="caption">
                        <h2 class="text-center">Keyboards</h2>
                </div>
                </a>
            </div>
        </div>
        <span></span>

        <div class="col-md-2 shadowfilter">
            <div class="thumbnail">
                <a href="product.php" class="nounderline">
                    <img src="pics/hpx.webp" style="width:50%">
                    <div class="caption">
                        <h2 class="text-center">Headsets</h2>
                </div>
                </a>
            </div>
        </div>
        <span></span>

    </div>



    <div class="container-fluid" style="background-color: #3c3d41;">
        <footer class="footer-bs">
            <div class="row">
                <div class="col-md-2 footer-social animated fadeInUp">
                    <h2>Shop</h2>
                    <div class="col-md-15">
                        <ul class="pages">
                            <li><a href="#">New Products</a></li>
                            <li><a href="#">Where to Buy</a></li>
                            <li><a href="#">Branches</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 footer-social animated fadeInUp">
                    <h2>Page</h2>
                    <div class="col-md-15">
                        <ul class="pages">
                            <li><a href="#">DMTech</a></li>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Log-in</a></li>
                            <li><a href="#">Sign-up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 footer-social animated fadeInUp">
                    <h2>Explore</h2>
                    <div class="col-md-15">
                        <ul class="pages">
                            <li><a href="#">NVIDIA 40 Series</a></li>
                            <li><a href="#">Radeon RX 7000 series</a></li>
                            <li><a href="#">Intel 12th Generation Upgrades</a></li>
                            <li><a href="#">AMD AM5 Upgrades</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 footer-social animated fadeInUp">
                    <h2>DMTech</h2>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-ns animated fadeInRight">
                    <h2>BE THE FIRST TO KNOW</h2>
                    <p>Get special offers, exclusive product news, and event info straight to your inbox.</p>
                    <p>
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                        </span>
                        </div><!-- /input-group -->
                    </p>
                </div>
            </div>
        </footer>
    </div>






</body>

</html>