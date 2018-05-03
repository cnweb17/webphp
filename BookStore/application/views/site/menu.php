
 <div id="header" class="shell">
    <div id="logo"><h1><a href="<?php echo base_url();?>">OURWEBSITE</a></h1></div>
        <!-- Navigation -->
    <div id="navigation">
        <ul>
            <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
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
                    echo '<p>Xin chào, <a href="#" id="user">Guest</a> .</p>';
                }
                else
                {
                    echo '<p>Xin chào, <a href="#" id="user">'.$this->session->userdata("login").'</a> .</p>';
                }
        ?>
        <p>
            <a href="<?php echo base_url('site/cart');?>" class="sum">Giỏ hàng (<?php echo $total_items;?>) 
            </a>
            <a href="<?php echo base_url('site/cart');?>" class="cart"><img  width="30" height="30" src="<?php echo public_url('site/images/cart_icon.png');?>" alt="">
            </a>
        </p>
    </div>
        <!-- End Login-details -->
</div>	