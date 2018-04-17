
        <div id="logo"><a href="<?php echo base_url();?>"><img src="<?php echo public_url('site') ;?>/images/logo.png"></a></div>
        <div id="navigation">
            <ul>
                <li><a href="<?php echo base_url();?>" class="current">Trang Chủ</a></li>
                <li><a href="#">Tìm Kiếm</a></li>
                <li><a href="#">Danh Mục</a></li>            
                <li><a href="#">Theo Dõi Đơn Hàng</a></li>  
                
                    <?php
                        if($this->session->userdata('user') != NULL) 
                        {
                           echo "<li><a id= 'session' href =''>Hello ".$this->session->userdata('user')."</a></li>" ;
                            echo "<li><a href='".base_url('site/logout/index')."'>Đăng xuất</a></li>";
                        }
                        else
                        {
                        echo "<li><a href='".base_url('login')."'>Đăng nhập</a></li>";
                        echo "<li><a href='".base_url('site/login/index')."'>Đăng kí</a></li>";
                        }
                    ?>
                
                <!--<li><a href="#">Đăng kí</a></li>-->
    	   </ul>
        </div>
    	