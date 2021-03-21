<!DOCTYPE html>
<html lang="en">
<?php
require_once 'Classes/CHANNEL.php';
require_once 'Classes/VIDEOS.php';
require_once 'Classes/USER.php';

$Channel = new CHANNEL();
$Users = new USER();
$Videos = new VIDEOS();
$chaines = $Channel->lister(1);
$video = $Videos->trouver_video($_GET['code']);
$commentaire = $Videos->lister_commentaire($_GET['code']);
$like= $Videos->lister_like($_GET['code']);
$dislike= $Videos->lister_dislike($_GET['code']);

?>
<!-- Mirrored from oren.azyrusthemes.com/single_video_page.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 11:50:38 GMT -->
<head>
<meta charset="UTF-8">
<title>Oren Video Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/video/videos.js"></script>
<link rel="icon" href="images/Favicon.png">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontello.css">
<link rel="stylesheet" type="text/css" href="css/fontello-codes.css">
<link rel="stylesheet" type="text/css" href="css/thumbs-embedded.css">
<link rel="stylesheet" type="text/css" href="css/video-js.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/color.css">

</head>
<body>

<div class="wrapper">

    <?php require_once "HEADER.php" ?><!--side_menu end-->


	<section class="mn-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<div class="mn-vid-sc single_video">
						<div class="vid-1">
							<div class="vid-pr">
								<video
								    id="my-video"
								    class="video-js"
								    controls
								    preload="auto"
								    width="640"
								    height="264"
								    poster="images/resources/<?= $video['miniature'] ?>"
								    data-setup="{}"
								  >
								    <source src="demo_video.mp4" type="video/mp4" />
								    <source src="demo_video.html" type="video/webm" />
								</video>
							</div><!--vid-pr end-->
							<div class="vid-info">
								<h3><?= $video['titre'] ?></h3>
								<div class="info-pr">
									<span>60,723,169 views</span>
									<ul class="pr_links">
										<li>
                                            <form id="like">
                                          <input type="hidden" value="<?php if (isset($_SESSION['user_id'])){ echo $_GET['code']; } ?>" id="video_id">
                                          <input type="hidden" value="<?php if (isset($_SESSION['user_id'])){ echo $_SESSION['user_id']; } ?>" id="user_id">

											<button data-toggle="tooltip"  id="btn_like" data-placement="top" title="I like this">
												<i class="icon-thumbs_up_fill"></i>
											</button>
                                            </form>
											<span> <?php
                                                $nb_like=0;
                                                foreach ($like as $liker){
                                                    $nb_like++;
                                                }
                                                echo $nb_like;
                                                ?></span>
										</li>
										<li>
                                            <form id="dislike">
                                                <input type="hidden" value="<?php if (isset($_SESSION['user_id'])){ echo $_GET['code']; } ?>" id="video_id">
                                                <input type="hidden" value="<?php if (isset($_SESSION['user_id'])){ echo $_SESSION['user_id']; } ?>" id="user_id">

                                                <button data-toggle="tooltip"  id="btn_dislike" data-placement="top" title="I like this">
                                                    <i class="icon-thumbs_down_fill"></i>
                                                </button>
                                            </form>
											<span>
                                                <?php
                                                $nb_dislike=0;
                                                foreach ($dislike as $disliker){
                                                     $nb_dislike++;
                                                }
                                                echo $nb_dislike;
                                                ?>
                                            </span>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div><!--info-pr end-->
							</div><!--vid-info end-->
						</div><!--vid-1 end-->
						<div class="abt-mk">
							<div class="info-pr-sec">
                                <?php
                                $user= $Users->trouver($video['u_id']);
                                ?>
								<div class="vcp_inf cr">
									<div class="vc_hd">
										<img src="images/resources/th5.png" alt="">
									</div>
									<div class="vc_info pr">
										<h4><a href="#" title=""><?= $user['pseudo'] ?></a></h4>
										<span>Publiee le  <?= $video['date_reg'] ?></span>
									</div>
								</div><!--vcp_inf end-->							
								<ul class="chan_cantrz">

									<li>
										<a href="#" title="" class="subscribe">S'abonner <strong>13M</strong></a>
									</li>
								</ul><!--chan_cantrz end-->
								<ul class="df-list">

                                    <li>
                                        <button data-toggle="tooltip" data-placement="top" title="Telecharger">
                                            <i class="icon-load"></i>
                                        </button>
                                    </li>
									<li>
										<button data-toggle="tooltip" data-placement="top" title="Ajouter aux favoris">
											<i class="icon-like"></i>
										</button>
									</li>

									<li>
										<button data-toggle="tooltip" data-placement="top" title="Partager">
											<i class="icon-share"></i>
										</button>
									</li>

								</ul><!--df-list end-->
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
                            <!--	<div class="about-ch-sec">
                                    <div class="abt-rw">
                                        <h4>Cast:</h4>
                                        <ul>
                                            <li><span>Nathan Drake</span></li>
                                            <li><span>Victor Sullivan </span></li>
                                            <li><span>Sam Drake </span></li>
                                            <li><span>Elena Fisher</span></li>
                                        </ul>
                                    </div>
                                    <div class="abt-rw">
                                        <h4>Category : </h4>
                                        <ul>
                                            <li><span>Gaming</span></li>
                                            <li><span>PS4 Exclusive  </span></li>
                                            <li><span>Gameplay  </span></li>
                                            <li><span>1080p</span></li>
                                        </ul>
                                    </div>
                                    <div class="abt-rw">
                                        <h4>About : </h4>
                                        <p> Three years after the events of Uncharted 3: Drake's Deception, Nathan Drake, now retired as a fortune hunter, has settled into a normal life with his wife Elena Fisher. His world is then turned upside down when his older brother Sam, long believed to be dead, suddenly reappears seeking Drake's help. </p>
                                    </div>
                                    <div class="abt-rw tgs">
                                        <h4>Tags : </h4>
                                        <ul>
                                            <li><a href="#" title="">#Kingdom</a></li>
                                            <li><a href="#" title="">#ImStillHereBecause </a></li>
                                            <li><a href="#" title="">#denim</a></li>
                                            <li><a href="#" title="">#tshirt</a></li>
                                        </ul>
                                    </div>
                                </div>-->
						</div><!--abt-mk end-->
             <?php if (isset($_SESSION['user_id'])){ ?>
						<div class="cmt-bx">
							<ul class="cmt-pr">
                                <?php
                                $nb_comment= count($commentaire);
                                ?>
								<li><span><?= $nb_comment ?></span> Comments</li>
							</ul>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
							<div class="vcp_inf pc" id="comment">
                                <div id="resultat_insertion"></div>
								<div class="vc_hd">
									<img src="images/resources/th1.png" alt="">
								</div>
								<form class="form_comment" method="post" action="" id="form_comment">
									<input type="text" placeholder="Add a public comment" id="libelle">
									<input type="hidden" placeholder="Add a public comment" id="user_id" value="<?php if (isset($_SESSION['user_id'])) { echo $_SESSION['user_id']; } ?>">
									<input type="hidden" placeholder="Add a public comment" id="video_id" value="<?php if (isset($_SESSION['user_id'])) { echo $_GET['code']; } ?>">
									<button type="submit">Comment</button>
								</form>
								<div class="clearfix"></div>
								<div class="rt-cmt">
									<a href="#" title="">
										<i class="icon-cancel"></i>
									</a>
									<div class="clearfix"></div>
								</div><!--vcp_inf end-->
							</div><!--cmt-bx end-->
							<ul class="cmn-lst">
                                <?php
                                $video= $Videos->trouver_video($_GET['code']);
                                foreach ($commentaire as $comment) {
                                 $user= $Users->trouver($comment['u_id']);
                                ?>
								<li>
									<div class="vcp_inf">
										<div class="vc_hd">
											<img src="images/resources/th2.png" alt="">
										</div>
										<div class="coments">
											<div class="pinned-comment">
												<span><i class="icon-pinned"></i><?= $user['pseudo'] ?></span>
											</div>
											<h2>ScereBro <small class="posted_dt"> <?= $comment['date_reg'] ?></small></h2>
											<p><?= $comment['libelle'] ?></p>
											<ul class="cmn-i">
												<li>
													<a href="#" title="">
														<i class="icon-thumbs_up"></i>
													</a>
													<span>680</span>
												</li>
												<li>
													<a href="#" title="">
														<i class="icon-thumbs_down"></i>
													</a>
													<span>21</span>
												</li>
											</ul>
											<a href="#" title="">View all 164 replies</a>
										</div><!--coments end-->
									</div><!--vcp_inf end-->
								</li>
								<?php } ?>
							</ul><!--comment list end-->
						</div>
                    <?php }else{  ?>
                        <div class="cmt-bx">
                            <p>
                                Pour commenter veuillez vous connecter svp, cliquez <a href="login.php">ici</a>
                            </p>
                        </div>
                        <?php } ?>
					</div><!--mn-vid-sc end--->
				</div><!---col-lg-9 end-->
				<div class="col-lg-3">
					<div class="sidebar">
						<div class="vidz-prt">
							<h2 class="sm-vidz">Suggestion</h2>

							<div class="clearfix"></div>
						</div><!--vidz-prt end-->
						<div class="videoo-list-ab">
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide1.png" alt="">
										<span class="vid-time">10:21</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide2.png" alt="">
										<span class="vid-time">13:49</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide3.png" alt="">
										<span class="vid-time">2:54</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="ad-rw">
								<img src="images/resources/ad-img.jpg" alt="">
							</div>
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide4.png" alt="">
										<span class="vid-time">5:25</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide5.png" alt="">
										<span class="vid-time">4:01</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide6.png" alt="">
										<span class="vid-time">6:20</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">A day in the life of a Google software engineer</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide7.png" alt="">
										<span class="vid-time">8:16</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">Avengers: Infinity War - Gym Workout</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
							<div class="videoo">
								<div class="vid_thumbainl">
									<a href="single_video_page.php" title="">
										<img src="images/resources/vide8.png" alt="">
										<span class="vid-time">29:32</span>
										<span class="watch_later">
											<i class="icon-watch_later_fill"></i>
										</span>
									</a>	
								</div><!--vid_thumbnail end-->
								<div class="video_info">
									<h3><a href="#" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
									<h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
									<span>686K views .<small class="posted_dt">1 week ago</small></span>
								</div>
							</div><!--videoo end-->
						</div>-->
					</div><!--side-bar end-->
				</div>
			</div>
		</div>
	</section><!--mn-sec end-->

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
<script src="js/video.js"></script>
<script src="js/script.js"></script>

</body>

<!-- Mirrored from oren.azyrusthemes.com/single_video_page.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Mar 2021 11:51:14 GMT -->
</html>