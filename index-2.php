
<!DOCTYPE html>
<html lang="en">
<?php
require_once 'Classes/CHANNEL.php';
require_once 'Classes/VIDEOS.php';
require_once 'Classes/USER.php';
$Users = new  USER();
$Channel = new CHANNEL();
$Videos = new VIDEOS();
$chaines = $Channel->lister(1);
$video = $Videos->lister();
 ?>
<!-- Mirrored from oren.azyrusthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 11:50:37 GMT -->
<head>
<meta charset="UTF-8">
<title>Oren Video Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="icon" href="images/Favicon.png">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="css/fontello.css">
<link rel="stylesheet" type="text/css" href="css/fontello-codes.css">
<link rel="stylesheet" type="text/css" href="css/thumbs-embedded.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/color.css">

</head>


<body>



	<div class="wrapper hp_1">
<?php require_once "HEADER.php" ?>
		<!--side_menu end-->


		<section class="vds-main">
			<div class="vidz-row">
				<div class="container">
					<div class="vidz_sec">
						<div class="vidz_list">
							<div class="row">
                                <?php

                                foreach ($video as $v) {
                                    $user= $Users->trouver($v['u_id']);
                                ?>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
									<div class="videoo">
										<div class="vid_thumbainl">
											<a href='single_video_page.php?code=<?=  $v['video_id']; ?>' title="">

												<img src="images/resources/<?= $v['miniature'] ?>" alt="">
												<span class="vid-time">10:21</span>
												<span class="watch_later">
													<i class="icon-watch_later_fill"></i>
												</span>
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<h3><a href="single_video_page.php" title=""><?= $v['titre'] ?></a></h3>
											<h4><a href="Single_Channel_Home.html" title=""><?= $user['pseudo'] ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span>686K views .<small class="posted_dt"><?= $v['date_reg']?></small></span>
										</div>
									</div><!--videoo end-->
								</div>
                                <?php } ?>
							</div>
						</div><!--vidz_list end-->
					</div><!--vidz_videos end-->
				</div>
			</div><!--vidz-row end-->

		</section><!--vds-main end-->

		<section class="more_items_sec text-center">
			<div class="container">
				<a href="#" title="">
					<svg width="19" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M18.1618 24.0001H0.838235C0.374412 24.0001 0 23.6261 0 23.1628V5.86052C0 5.39727 0.374412 5.02332 0.838235 5.02332H18.1618C18.6256 5.02332 19 5.39727 19 5.86052V23.1628C19 23.6261 18.6256 24.0001 18.1618 24.0001ZM1.67647 22.3256H17.3235V6.69773H1.67647V22.3256Z" fill="#9494A0"/>
						<g opacity="0.25">
						<path opacity="0.25" d="M13.1324 4.18605C12.6685 4.18605 12.2941 3.81209 12.2941 3.34884V1.67442H6.70589V3.34884C6.70589 3.81209 6.33148 4.18605 5.86765 4.18605C5.40383 4.18605 5.02942 3.81209 5.02942 3.34884V0.83721C5.02942 0.373954 5.40383 0 5.86765 0H13.1324C13.5962 0 13.9706 0.373954 13.9706 0.83721V3.34884C13.9706 3.81209 13.5962 4.18605 13.1324 4.18605Z" fill="#9494A0"/>
						</g>
						<path d="M9.50001 19.3479C9.28487 19.3479 9.06972 19.267 8.90766 19.1024L5.92634 16.1275C5.59942 15.801 5.59942 15.2707 5.92634 14.9442C6.25325 14.6177 6.78413 14.6177 7.11104 14.9442L9.50001 17.3275L11.8862 14.9442C12.2131 14.6177 12.744 14.6177 13.0709 14.9442C13.3978 15.2707 13.3978 15.801 13.0709 16.1275L10.0924 19.1024C9.93031 19.267 9.71516 19.3479 9.50001 19.3479Z" fill="#9494A0"/>
						<path d="M9.49999 18.4186C9.03617 18.4186 8.66176 18.0447 8.66176 17.5814V10.3256C8.66176 9.86236 9.03617 9.4884 9.49999 9.4884C9.96382 9.4884 10.3382 9.86236 10.3382 10.3256V17.5814C10.3382 18.0447 9.96382 18.4186 9.49999 18.4186Z" fill="#9494A0"/>
						<g opacity="0.5">
						<path opacity="0.5" d="M15.6471 6.69764C15.1832 6.69764 14.8088 6.32369 14.8088 5.86043V4.18601H4.19118V5.86043C4.19118 6.32369 3.81677 6.69764 3.35294 6.69764C2.88912 6.69764 2.51471 6.32369 2.51471 5.86043V3.34881C2.51471 2.88555 2.88912 2.5116 3.35294 2.5116H15.6471C16.1109 2.5116 16.4853 2.88555 16.4853 3.34881V5.86043C16.4853 6.32369 16.1109 6.69764 15.6471 6.69764Z" fill="#9494A0"/>
						</g>
					</svg>
				</a>
			</div>
		</section><!--more_items_sec end-->

	</div><!--wrapper end-->




<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/flatpickr.js"></script>
<script src="js/script.js"></script>



</body>


<!-- Mirrored from oren.azyrusthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 11:50:37 GMT -->
</html>