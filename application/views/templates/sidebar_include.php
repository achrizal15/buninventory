<div id="sidebar-nav" class="sidebar">
         <nav>
            <ul class="nav" id="sidebar-nav-menu">
               <li class="menu-group">Main</li>
               <li><a href="<?= base_url() ?>" class="<?= active_sidebar("") ?>"><i class="fa fa-home"></i> <span class="title">Home</span></a></li>
               <li class="panel">
                  <a href="#produk" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("produkcontroller") ?>"><i class="ti-package"></i></i> <span class="title">Produk </span> <i class="icon-submenu ti-angle-left"></i></a>
                  <div id="produk" class="collapse">
                     <ul class="submenu">
                        <li><a href="<?= base_url("produkcontroller/index/view") ?>" class="">Daftar Produk</a></li>
                        <li><a href="<?= base_url("produkcontroller/index/add") ?>" class="">Tambah Produk</a></li>
                     </ul>
                  </div>
               </li>
               <li>
                  <a href="<?= base_url("gudangcontroller") ?>" class="<?= active_sidebar("gudangcontroller") ?>">
                     <i class="ti-folder"></i> <span class="title">Gudang Satuan</span>
                  </a>
               </li>
               <li class="panel">
                  <a href="#distributor" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("distributorcontroller") ?>"><i class="ti-truck"></i></i> <span class="title">Distributor</span> <i class="icon-submenu ti-angle-left"></i></a>
                  <div id="distributor" class="collapse">
                     <ul class="submenu">
                        <li><a href="<?= base_url("distributorcontroller") ?>" class="">Daftar Distributor</a></li>
                        <li><a href="<?= base_url("distributorcontroller/action/add") ?>" class="">Tambah Distributor</a></li>
                     </ul>
                  </div>
               </li>
               <li class="panel">
                  <a href="#trstokmasuk" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("trstokmasukcontroller") ?>"><i class="fa-solid fa-cart-flatbed"></i> <span class="title">Barang Masuk</span> <i class="icon-submenu ti-angle-left"></i></a>
                  <div id="trstokmasuk" class="collapse">
                     <ul class="submenu">
                        <li><a href="<?= base_url("trstokmasukcontroller") ?>" class="">Daftar Barang Masuk</a></li>
                        <li><a href="<?= base_url("trstokmasukcontroller/action/add") ?>" class="">Tambah Barang Masuk</a></li>
                     </ul>
                  </div>
               </li>
               <li class="panel">
                  <a href="#trstokkeluar" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("trstokkeluarcontroller") ?>"><i class="fa-solid fa-dolly"></i> <span class="title">Barang Keluar</span> <i class="icon-submenu ti-angle-left"></i></a>
                  <div id="trstokkeluar" class="collapse">
                     <ul class="submenu">
                        <li><a href="<?= base_url("trstokkeluarcontroller") ?>" class="">Daftar Barang Keluar</a></li>
                        <li><a href="<?= base_url("trstokkeluarcontroller/action/add") ?>" class="">Tambah Barang Keluar</a></li>
                     </ul>
                  </div>
               </li>
            </ul>
         </nav>
      </div>