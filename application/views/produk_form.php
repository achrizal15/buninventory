<div class="main">

   <!-- MAIN CONTENT -->
   <div class="main-content">

      <div class="content-heading">
         <div class="heading-left">
            <h1 class="page-title">Selamat datang Rivaldo A</h1>
         </div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url("produkcontroller") ?>">Produk</a></li>
               <li class="breadcrumb-item active"><a href="#">Form</a></li>
            </ol>
         </nav>
      </div>

      <div class="container-fluid">
         <!-- TOP METRICS -->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Tambah Produk</h3>
                  </div>
                  <div class="card-body">
                     <form action="" method="post">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">KODE</label>
                           <input type="text" readonly value="<?=isset($produk)?$produk->id:"01"?>" class="form-control" id="validationCustom02" required>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama Produk</label>
                           <input type="text" class="form-control" id="validationCustom02" required>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <!-- END TOP METRICS -->


         <!-- END PERFORMANCE INDEX -->
      </div>
   </div>
   <!-- END MAIN CONTENT -->

</div>