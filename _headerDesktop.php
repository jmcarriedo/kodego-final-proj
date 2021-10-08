<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button> -->
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
            
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="assets/img/logo round.png" alt="Hiraya" />
                            </div>
                            <div class="content">
                                <a><?php echo $_SESSION['accessRole']; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a>
                                            <img src="assets/img/logo round.png" alt="Hiraya" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a><?php echo $_SESSION['accessRole']; ?></a>
                                        </h5>
                                        <span class="email"><?php echo $_SESSION['email']; ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="./profile.php">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="./settings.php">
                                            <i class="zmdi zmdi-settings"></i>Settings</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <form action="logout.php" method="POST">
                                        <a>
                                            <i class="zmdi zmdi-power"></i><input type="submit" name="logout" value="Logout" style="background:transparent; cursor:pointer"/></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>