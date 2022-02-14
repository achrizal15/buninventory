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
               <li class="breadcrumb-item"><a href="<?= base_url("produkcontroller") ?>">Role</a></li>
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
                     <h3 class="card-title"><?= ucwords($aksi)  ?> Role</h3>

                  </div>
                  <div class="card-body">
                     <form action="<?= base_url("rolecontroller/") . $aksi ?>" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($role) ? $role->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama</label>
                           <input type="text" class="form-control" name="nama" id="validationCustom02" required value="<?= isset($role) ? ucwords($role->nama) : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6">

                           <label for="validationCustom02">Izin Akses Role</label>
                           <div class="row">
                              <div class="col-md-6 mb-3">

                                 <?php foreach ($akses as $k => $val) : ?>
                                    <?php if ($k % 2 == 0) :  ?>
                                       <label class="switch-input mb-3">
                                          <?php if (isset($role->id)) :  ?>
                                             <input type="checkbox" name="role_akses[]" <?= $this->ram->get_roles_akses($role->id, $val->nama) ? "checked" : "" ?> value="<?= $val->id ?>">
                                          <?php else :  ?>
                                             <input type="checkbox" name="role_akses[]" value="<?= $val->id ?>">
                                          <?php endif;  ?>
                                          <i data-swon-text="ON" data-swoff-text="OFF"></i>
                                          <?= ucwords($val->content)  ?>
                                       </label>
                                    <?php endif;  ?>
                                 <?php endforeach  ?>
                              </div>
                              <div class="col-md-6 mb-3">

                                 <?php foreach ($akses as $k => $val) : ?>
                                    <?php if ($k % 2 != 0) :  ?>
                                       <label class="switch-input mb-3">
                                          <?php if (isset($role->id)) :  ?>
                                             <input type="checkbox" name="role_akses[]" <?= $this->ram->get_roles_akses($role->id, $val->nama) ? "checked" : "" ?> value="<?= $val->id ?>">
                                          <?php else :  ?>
                                             <input type="checkbox" name="role_akses[]" value="<?= $val->id ?>">
                                          <?php endif;  ?>
                                          <i data-swon-text="ON" data-swoff-text="OFF"></i>
                                          <?= ucwords($val->content)  ?>
                                       </label>
                                    <?php endif;  ?>
                                 <?php endforeach  ?>
                              </div>
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