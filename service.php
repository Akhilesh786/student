<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BeatMonitor - Health & Medical - All Services</title>

    <?php include 'header_meta.php'; ?>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Outfit:wght@100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body>
<?php include 'header.php'; ?>


    <div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">All Services</h1>
                <ul class="breadcumb-menu">
                    <li><a href="home-medical-clinic.html">Home</a></li>
                    <li>All Services </li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
Service Area  
==============================-->
    <section class="position-relative overflow-hidden space overflow-hidden" id="service-sec">
        <div class="container">
            <div class="row gy-4">
                <?php
						 $limit = 6;
						$query = "SELECT blog_id FROM blog";

						$s = $dbh->prepare($query);
						$s->execute();
						$total_results = $s->rowCount();
						$total_pages = ceil($total_results/$limit);

						if (!isset($_GET['page'])) {
							$page = 1;
						} else{
							$page = $_GET['page'];
						}

						$starting_limit = ($page-1)*$limit;
						$show  = "SELECT * FROM blog ORDER BY blog.blog_id DESC LIMIT $starting_limit, $limit";

						$r = $dbh->prepare($show);
						$r->execute();
						
						while($row = $r->fetch(PDO::FETCH_ASSOC)){ 
                            //print_r($row);
                            print '<div class="col-md-6 col-lg-4 col-xxl-3">
                                        <div class="service-card style2">
                                            <div class="box-content">
                                                <div class="box-icon">
                                                    <img src="admin/doc/'.$row['blog_head_image'].'" alt="Icon">
                                                </div>
                                                <h3 class="box-title"><a href="service-details/'.$row['blog_url'].'">'.$row['blog_head'].'</a></h3>
                                                <p class="box-text">'.$row['blog_description'].'</p>
                                                <a href="service-details/'.$row['blog_url'].'" class="th-btn black-border">Read More <i class="fa-light fa-arrow-right-long ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>';
						
						}
						?>
                
                
            </div>
            <div class="th-pagination  mt-50 mb-0 text-center">
                <ul class="page-pagination">
                </ul>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Slider -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Imagesloadedr -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Nice-select -->
    <script src="assets/js/nice-select.min.js"></script>
    <!-- wow -->
    <script src="assets/js/wow.min.js"></script>

    <!-- 360 degree Js -->
    <script src="assets/js/threesixty.min.js"></script>
    <script src="assets/js/panolens.min.js"></script>

    <!-- gsap area start -->
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/SplitText.js"></script>
    <!-- gsap area end -->

    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/pagination.js"></script>
	<script>
		
		$(document).ready(function(){
		$('.page-pagination').pagination({
        items: <?php echo $total_results;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'service/'
		});
		});
	</script>
</body>

</html>