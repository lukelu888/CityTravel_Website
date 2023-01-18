<header>
        <div class="logo">
            <a href="WelcomePage.php">
                <img src="./media/logo/logo.png" alt="logo" id="logo">
            </a>
        </div>
      
        <div class="navbar">
            <ul>
                <li ><img src="./media/background/profile-user.png" alt="userImg"></li>
                <li style="font-weight: bold;"><a href="WelcomePage.php">Welcome <?php echo $_SESSION['UserName'];?></a></li>
                <li ><a href="AccountPage.php">Account</a></li>
                <li ><a href="Logout.php">Logout</a></li>
            </ul>
        </div> 
    </header>