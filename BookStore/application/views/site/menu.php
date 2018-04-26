
 <div id="header" class="shell">
    <div id="logo"><h1><a href="<?php echo base_url();?>">OURWEBSITE</a></h1></div>
        <!-- Navigation -->
    <div id="navigation">
        <ul>
            <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Promotions</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">About Us</a></li>

            <?php
                if($this->session->userdata('login') == NULL)
                {
                    echo "<li><a href='".base_url('site/login/index')."'>Đăng nhập</a></li>";
                    echo "<li><a href='".base_url('site/signup/index')."'>Đăng kí</a></li>";
                     
                }
                else
                {
                    echo "<li><a href='".base_url('site/logout/index')."'>
                     Đăng xuất</a></li>";
                }
            ?>
        </ul>
    </div>
        <!-- End Navigation -->
    <div class="cl">&nbsp;</div>
        <!-- Login-details -->
    <div id="login-details">
        <?php if($this->session->userdata('login') == NULL)
                {
                    echo '<p>Welcome, <a href="#" id="user">Guest</a> .</p>';
                }
                else
                {
                    echo '<p>Welcome, <a href="#" id="user">'.$this->session->userdata("login").'</a> .</p>';
                }
        ?>
        <p><a href="#" class="cart"><img src="css/images/cart-icon.png" alt=""></a>Shopping Cart (0) <a href="#" class="sum">$0.00</a></p>
    </div>
        <!-- End Login-details -->
</div>	