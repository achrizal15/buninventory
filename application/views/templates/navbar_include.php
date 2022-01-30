<nav class="navbar navbar-expand fixed-top">
         <div class="navbar-brand d-none d-lg-block text-white">
            <!-- <a href="index.html"><img src="<?= base_url() ?>assets/images/logo-white.png" alt="Klorofil Pro Logo" class="img-fluid logo"></a> -->
            BUNINVENTORY
         </div>
         <div class="container-fluid p-0">
            <button id="tour-fullwidth" type="button" class="btn btn-default btn-toggle-fullwidth"><i class="ti-menu"></i></button>

            <div id="navbar-menu">
               <ul class="nav navbar-nav align-items-center">

                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://i.imgur.com/M701HZb.jpg" class="user-picture"" alt=" Avatar"> <span><?php   ?></span></a>
                     <ul class="dropdown-menu dropdown-menu-right logged-user-menu">
                        <li><a href="#"><i class="ti-user"></i> <span><?= $this->session->userdata("nama")  ?></span></a></li>
                        <li><a href="<?=base_url("authcontroller/logout")?>"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>