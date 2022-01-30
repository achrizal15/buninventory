<div class="main">

   <!-- MAIN CONTENT -->
   <div class="main-content">

      <div class="content-heading">
         <div class="heading-left">
            <h1 class="page-title">Selamat datang <?= $this->session->userdata("nama")  ?></h1>
         </div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url("usercontroller") ?>">User</a></li>
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
                     <h3 class="card-title"><?= ucwords($aksi)  ?> User</h3>

                  </div>
                  <div class="card-body">
                  <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
                     <form action="<?= base_url("usercontroller/") . $aksi ?>"data-parsley-validate novalidate method="post" enctype="multipart/form-data">

                        <input type="text" hidden value="<?= isset($user) ? $user->id : "" ?>" name="id">
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Nama</label>
                           <input type="text" required class="form-control" name="nama" value="<?= isset($user) ? $user->nama : "" ?>">
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Email</label>
                           <input type="email" <?= $aksi == "edit" ? "disabled" : "required" ?> class="form-control" name="email" value="<?= isset($user) ? $user->email : "" ?>" >
                           <div class="valid-feedback">
                              Looks good!
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="validationCustom02">Role</label>
                           <select name="role_id" class="form-control select-basic" id="select-role" required>
                              <option selected value="" hidden>Pilih Satu</option>
                              <?php foreach ($role as $value) :  ?>
                                 <?php if ($user->role_id == $value->id) :  ?>
                                    <option selected value="<?= $value->id ?>"><?=  ucwords($value->nama ) ?></option>
                                 <?php else :  ?>
                                    <option value="<?= $value->id ?>"><?=  ucwords($value->nama ) ?></option>
                                 <?php endif;  ?>
                              <?php endforeach;  ?>
                           </select>
                           <div class="invalid-feedback">Tidak boleh kosong</div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="password"><?= $aksi=="edit"?"Masukkan Password Baru":"Password"  ?></label>
                           <div class="password-strength-container">
                              <input name="password" type="password" <?= $aksi == "edit" ? "" : "required" ?>  class="form-control" id="password-strength">
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="password">Ulangi Password</label>                       
                              <input  type="password" class="form-control"  data-parsley-equalto="#password-strength" >
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