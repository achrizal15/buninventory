<div class="main">

   <!-- MAIN CONTENT -->
   <div class="main-content">

      <div class="content-heading">
         <div class="heading-left">
            <h1 class="page-title">Selamat Datang  <?= $this->session->userdata("nama")  ?></h1>
         </div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url("produkcontroller") ?>">Distributor</a></li>
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
                     <h3 class="card-title"><?=ucwords($aksi)?> Tambah Distributor</h3>

                  </div>
                  <div class="card-body">
                     <form action="<?= base_url("distributorcontroller/") . $aksi ?>" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($distributor) ? $distributor->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama</label>
                           <input type="text" class="form-control" name="nama" id="validationCustom02" required value="<?= isset($distributor) ? $distributor->nama : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Telepon</label>
                           <input type="number" class="form-control" name="telepon" id="validationCustom02" required value="<?= isset($distributor) ? $distributor->telepon : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Email</label>
                           <input type="text" class="form-control" name="email" id="validationCustom02" required value="<?= isset($distributor) ? $distributor->email : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Alamat</label>
                           <input type="text" class="form-control" name="alamat" id="validationCustom02" required value="<?= isset($distributor) ? $distributor->alamat : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-6">
                           <button type="submit" class="btn btn-primary">Simpan</button>
                           <a href="" class="btn btn-danger">Reset</a>
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