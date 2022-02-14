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
                     <h3 class="card-title"><?=ucwords($aksi)?> Tambah Produk</h3>

                  </div>
                  <div class="card-body">
                     <form action="<?= base_url("produkcontroller/") . $aksi ?>" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($produk) ? $produk->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Kode</label>
                           <?php if ($aksi == "add") :  ?>
                              <input type="text" readonly value="P0<?= isset($kodeproduk) ? $kodeproduk->id : "1" ?>" class="form-control" id="validationCustom02" name="kode" required>
                           <?php else :  ?>
                              <input type="text" readonly value="<?= isset($produk) ? $produk->kode : "1" ?>" class="form-control" id="validationCustom02" name="kode" required>
                           <?php endif;  ?>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama Produk</label>
                           <input type="text" class="form-control" name="nama" id="validationCustom02" required value="<?= isset($produk) ? $produk->nama : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Satuan</label>
                           <select name="satuan" class="form-control" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($satuan as $key => $value) :  ?>
                                 <?php if ($produk->satuan_id == $value->id) :  ?>
                                    <option selected value="<?= $value->id ?>"><?= ucwords($value->nama)  ?></option>
                                 <?php else :  ?>
                                    <option value="<?= $value->id ?>"><?= ucwords($value->nama)  ?></option>
                                 <?php endif;  ?>
                              <?php endforeach;  ?>
                           </select>
                           <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Gudang</label>
                           <select name="gudang" class="form-control" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($gudang as $key => $value) :  ?>
                                 <?php if ($produk->gudang_id == $value->id) :  ?>
                                    <option selected value="<?= $value->id ?>"><?= ucwords($value->nama)  ?></option>
                                 <?php else :  ?>
                                    <option value="<?= $value->id ?>"><?= ucwords($value->nama)  ?></option>
                                 <?php endif;  ?>
                              <?php endforeach;  ?>
                           </select>
                           <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <!-- <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Stok Awal</label>
                           <input type="number" min="1" class="form-control" name="stok_awal" id="validationCustom02" value="<?= isset($produk) ? $produk->stok_awal : "" ?>" required>
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div> -->
                        <div class="col-md-6">
                           <div class="row">
                              <div class="col-md-6 mb-3">
                                 <label for="validationCustomHargaJual">Harga Jual</label>
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="harga_jual" id="validationCustomHargaJual" placeholder="0" min="1" aria-describedby="inputGroupPrepend" value="<?= isset($produk) ? intval($produk->harga_jual): "" ?>" required>
                                    <div class="invalid-feedback">
                                       Please choose a Harga Jual.
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <label for="validationCustomHargaBeli">Harga Beli</label>
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="harga_beli" id="validationCustomHargaBeli" placeholder="0" min="1" aria-describedby="inputGroupPrepend"value="<?= isset($produk) ? intval($produk->harga_beli) : "" ?>" required>
                                    <div class="invalid-feedback">
                                       Please choose a Harga Beli.
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Upload Gambar <small>(Opsional)</small></label>
                           <input type="file" class="dropify" name="gambar" data-max-file-size="100K" data-allowed-file-extensions="jpeg jpg png" data-default-file="<?= isset($produk) ? base_url("assets/images/products/".$produk->gambar) : "" ?>">
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