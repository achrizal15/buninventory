<div class="main">

   <!-- MAIN CONTENT -->
   <div class="main-content">

      <div class="content-heading">
         <div class="heading-left">
            <h1 class="page-title">Selamat Datang <?= $this->session->userdata("nama")  ?></h1>
         </div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url("trstokmasukcontroller") ?>">Stok Masuk</a></li>
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
                     <h3 class="card-title"><?=ucwords($aksi)?> Stok Produk Masuk</h3>

                  </div>
                  <div class="card-body">
                     <form action="<?= base_url("trstokmasukcontroller/") . $aksi ?>" id="form-stok-masuk" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($stokin) ? $stokin->trid : "" ?>" name="id">
                        <input type="text" hidden value="<?= isset($stokin) ? $stokin->trqty : "" ?>" name="stok-asal">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Faktur <small>(Opsional)</small></label>
                           <input type="text" value="<?= isset($stokin) ? $stokin->trfaktur : "" ?>" class="form-control" id="validationCustom02" name="faktur">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Produk</label>
                           <select name="produk_id" class="form-control select-basic" id="select-produk" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($produk as $value) :  ?>
                                 <?php if ($stokin->trproduk_id == $value->pid) :  ?>
                                    <option selected value="<?= $value->pid ?>"><?= $value->pkode . " : " . $value->pnama  ?></option>
                                 <?php else :  ?>
                                    <option value="<?= $value->pid ?>"><?= $value->pkode . " : " . $value->pnama . "($value->snama)" ?></option>
                                 <?php endif;  ?>
                              <?php endforeach;  ?>
                           </select>
                           <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Distributor</label>
                           <select name="distributor_id" class="form-control select-basic" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($distributor as $value) :  ?>
                                 <?php if ($stokin->trdistributor_id == $value->id) :  ?>
                                    <option selected value="<?= $value->id ?>"><?= $value->nama  ?></option>
                                 <?php else :  ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama  ?></option>
                                 <?php endif;  ?>

                              <?php endforeach;  ?>
                           </select>
                           <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Stok Awal</label>
                           <input type="text" id="qty-awal" value="<?= isset($stokin) ? $stokin->pqty : "" ?>" disabled class="form-control">
                        </div>
                        <div class="col-md-6">
                           <div class="row">
                              <div class="col-md-6 mb-3">
                                 <label for="validationCustom02">Stok Ahir</label>
                                 <input type="text" id="stok-final" value="<?=  isset($stokin) ? $stokin->pqty - $stokin->trqty :""?>" disabled hidden>
                                 <input type="number" min="0" class="form-control" name="stok_awal" readonly id="validationCustom02" value="<?= isset($stokin) ? $stokin->pqty : "" ?>" required>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <label for="validationCustom02">Stok Masuk</label>
                                 <input type="number" min="1" class="form-control" name="qty" id="validationCustom02" value="<?= isset($stokin) ? $stokin->trqty : "" ?>" required>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Catatan <small>(Optional)</small></label>
                           <textarea name="catatan" class="form-control" rows="5"><?= isset($stokin) ? $stokin->trcatatan : ""  ?></textarea>
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