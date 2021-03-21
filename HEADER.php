<?php
//unset($_SESSION);
//var_dump($_SESSION);die;
?>
<header>
    <div class="top_bar">
        <div class="container">
            <div class="top_header_content">
                <div class="menu_logo">
                    <a href="#" title="" class="menu">
                        <i class="icon-menu"></i>
                    </a>
                    <a href="index-2.php" title="" class="logo">
                        <img src="images/logp.png" alt="">
                    </a>
                </div><!--menu_logo end-->
                <div class="search_form">
                    <form>
                        <input type="text" name="search" placeholder="Search Videos">
                        <button type="submit">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                </div><!--search_form end-->
                <ul class="controls-lv">
                    <li>
                        <a href="#" title=""><i class="icon-message"></i></a>
                    </li>
                    <li>
                        <a href="#" title=""><i class="icon-notification"></i></a>
                    </li>
                    <li class="user-log">
                        <div class="user-ac-img">
                            <p>
                                <?php
                                if (isset($_SESSION['user_id'])){
                                    $profil= $Users->trouver($_SESSION['user_id']);
                                    $nom = $profil['pseudo'];
                                    $l= $nom[0];
                                    echo $l;} else{ echo 'r';} ?>

                            </p>
                            <img src="images/resources/user-img.png" alt="" >
                        </div>
                        <div class="account-menu">

                            <h4>

                                        <span class="usr-status">
                                            <?php if (isset($_SESSION['user_id'])){ echo $nom; }?></span></h4>
                            <div class="sd_menu">
                                <ul class="mm_menu">
                                    <li>
												<span>
													<i class="icon-user"></i>
												</span>
                                        <a href="#" title="">My hannel</a>
                                    </li>
                                    <li>
												<span>
													<i class="icon-paid_sub"></i>
												</span>
                                        <a href="#" title="">Paid subscriptions</a>
                                    </li>
                                    <li>
												<span>
													<i class="icon-settings"></i>
												</span>
                                        <a href="#" title="">Settings</a>
                                    </li>
                                    <li>
												<span>
												</span>
                                        <?php if (isset($_SESSION['user_id'])) { ?>
                                            <i class="icon-logout"></i>
                                            <a href="Deconnexion.php" title="">Se deconnecter</a>
                                        <?php } else {?>
                                            <i class="icon-login"></i>
                                            <a href="login" title="">Se connecter</a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div><!--sd_menu end-->
                            <div class="sd_menu scnd">
                                <ul class="mm_menu">
                                    <li>
												<span>
													<i class="icon-light"></i>
												</span>
                                        <a href="#" title="">Dark Theme</a>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <b class="slider round"></b>
                                        </label>
                                    </li>
                                    <li>
												<span>
													<i class="icon-language"></i>
												</span>
                                        <a href="#" title="">Language</a>
                                    </li>
                                    <li>
												<span>
													<i class="icon-feedback"></i>
												</span>
                                        <a href="#" title="">Send feedback</a>
                                    </li>
                                    <li>
												<span>
													<i class="icon-location"></i>
												</span>
                                        <a href="#" title="">India</a>
                                        <i class="icon-arrow_below"></i>
                                    </li>
                                </ul>
                            </div><!--sd_menu end-->
                            <div class="restricted-mode">
                                <h4>Restricted Mode</h4>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                            </div><!--restricted-more end-->
                        </div>
                    </li>
                    <li>
                        <a href="Upload_Video.html" title="" class="btn-default">Upload</a>
                    </li>
                </ul><!--controls-lv end-->
                <div class="clearfix"></div>
            </div><!--top_header_content end-->
        </div>
    </div><!--header_content end-->
    <div class="btm_bar">
        <div class="container">
            <div class="btm_bar_content">

                <div class="clearfix"></div>
            </div><!--btm_bar_content end-->
        </div>
    </div><!--btm_bar end-->
</header><!--header end-->

<div class="side_menu">
    <div class="form_dvv">
        <a href="#" title="" class="login_form_show">Sign in</a>
    </div>
    <div class="sd_menu">
        <ul class="mm_menu">
            <li>
						<span>
							<i class="icon-home"></i>
						</span>
                <a href="#" title="">Home</a>
            </li>
            <li>
						<span>
							<i class="icon-fire"></i>
						</span>
                <a href="#" title="">Trending</a>
            </li>
            <li>
						<span>
							<i class="icon-subscriptions"></i>
						</span>
                <a href="#" title="">Subscriptions</a>
            </li>
        </ul>
    </div><!--sd_menu end-->
    <div class="sd_menu">
        <h3>Library</h3>
        <ul class="mm_menu">
            <li>
						<span>
							<i class="icon-history"></i>
						</span>
                <a href="#" title="">History</a>
            </li>
            <li>
						<span>
							<i class="icon-watch_later"></i>
						</span>
                <a href="#" title="">Watch Later</a>
            </li>
            <li>
						<span>
							<i class="icon-purchased"></i>
						</span>
                <a href="#" title="">Purchases</a>
            </li>
            <li>
						<span>
							<i class="icon-like"></i>
						</span>
                <a href="#" title="">Liked Videos</a>
            </li>
            <li>
						<span>
							<i class="icon-play_list"></i>
						</span>
                <a href="#" title="">Playlist</a>
            </li>
        </ul>
    </div><!--sd_menu end-->
    <div class="sd_menu subs_lst">
        <h3>Subscriptions</h3>
        <ul class="mm_menu">
            <?php
            foreach ($chaines as $c) {
                ?>
                <li>
						<span class="usr_name">
							<img src="images/resources/th1.png" alt="">
						</span>
                    <a href="#" title=""><?= $c['nom_channel'] ?></a>
                    <small>3</small>
                </li>
            <?php } ?>
        </ul>
        <a href="#" title="" class="more-ch"><i class="icon-arrow_below"></i> Show 14 more</a>
    </div><!--sd_menu end-->
    <div class="sd_menu">
        <ul class="mm_menu">
            <li>
						<span>
							<i class="icon-settings"></i>
						</span>
                <a href="#" title="">Settings</a>
            </li>
            <li>
						<span>
							<i class="icon-flag"></i>
						</span>
                <a href="#" title="">Report history</a>
            </li>
            <li>
						<span>
							<i class="icon-logout"></i>
						</span>
                <a href="#" title="">Sign out</a>
            </li>
        </ul>
    </div><!--sd_menu end-->
    <div class="sd_menu m_linkz">
        <ul class="mm_menu">
            <li><a href="#">About</a></li>
            <li><a href="#">Community Rules </a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contracts </a></li>
            <li><a href="#">Donate</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
        <span>azyrusthemes</span>
    </div><!--sd_menu end-->
    <!--sd_menu end-->
    <div class="dd_menu"></div>
</div>