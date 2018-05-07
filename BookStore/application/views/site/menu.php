
 <div id="header">
   <a id="logo" href="<?php echo base_url();?>">
     <img src="<?php echo public_url('site'); ?>/images/logo.png" alt="logo">
   </a>

   <!-- Navigation -->
   <div id="navigation">
     <!-- Login-details -->
     <div id="login-details">
       <ul>
         <?php if($this->session->userdata('login') == NULL)
                 {
                     echo '<li>Xin chào, <a href="#" id="user">Guest</a>.</li>';
                 }
                 else
                 {
                     echo '<li>Xin chào, <a href="#" id="user">'.$this->session->userdata("login").'</a>. </li>';
                 }
         ?>
         <li>
           <a id="cart" href="<?php echo base_url('site/cart');?>">
             <i class="fa fa-shopping-cart"></i> Giỏ hàng (<?php echo $total_items;?>)
           </a>
         </li>
       </ul>

     </div>
     <!-- End Login-details -->

     <div id="menubar">
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

   </div>
   <!-- End Navigation -->


</div>
