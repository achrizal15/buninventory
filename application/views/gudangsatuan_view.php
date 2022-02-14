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
               <li class="breadcrumb-item active"><a href="#">Gudang dan Satuan</a></li>
               <!-- <li class="breadcrumb-item active">Current</li> -->
            </ol>
         </nav>
      </div>


      <div class="container-fluid">

         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Daftar Gudang</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
                     <div class="table-responsive">
                        <button type="button" class="btn btn-primary mb-3" id="add-gudang" data-toggle="modal" data-target="#gudangModal">
                           TAMBAH
                        </button>
                        <table class="table table-bordered" id="gudang-table">
                           <thead>
                              <tr>
                                 <th>KODE</th>
                                 <th>NAMA</th>
                                 <th>CREATED AT</th>
                                 <th>ACTION</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($gudang as $key => $value) : ?>
                                 <tr>
                                    <td class="align-middle"><?= $value->kode  ?></td>
                                    <td class="align-middle"><?= ucwords($value->nama) ?></td>
                                    <td class="align-middle"><?= date("d-m-Y", strtotime($value->created_at))  ?></td>
                                    <td class="align-middle">
                                       <button class="btn btn-warning text-white" title="Edit" data-toggle="modal" data-target="#gudangModal" id="edit-gudang" data-id="<?= $value->id?>">
                                          <i class="fas fa-edit"></i><span class="sr-only">EDIT</span>
                                       </button>
                                       <a id="delete-gudang" data-id="<?= $value->id ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
                                    </td>
                                 </tr>
                              <?php endforeach;  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Daftar Satuan</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message_satuan") ? custom_alert_messages("", $this->session->flashdata("message_satuan")) : "" ?>
                     <div class="table-responsive">
                        <button type="button" class="btn btn-primary mb-3" id="add-satuan" data-toggle="modal" data-target="#satuanModal">
                           TAMBAH
                        </button>
                        <table class="table table-bordered" id="satuan-table">
                           <thead>
                              <tr>
                                 <th>NAMA</th>
                                 <th>CREATED AT</th>
                                 <th width="50px">ACTION</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($satuan as $key => $value) : ?>
                                 <tr>
                                    <td class="align-middle"><?= ucwords($value->nama) ?></td>
                                    <td class="align-middle"><?= date("d-m-Y", strtotime($value->created_at))  ?></td>
                                    <td class="align-middle">
                                       <button class="btn btn-warning text-white" title="Edit" data-toggle="modal" data-target="#satuanModal" id="edit-satuan" data-id="<?= $value->id?>">
                                          <i class="fas fa-edit"></i><span class="sr-only">EDIT</span>
                                       </button>
                                       <a id="delete-satuan" data-id="<?= $value->id ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
                                    </td>
                                 </tr>
                              <?php endforeach;  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

         </div>


      </div>
   </div>


</div>
<div class="modal fade" id="satuanModal" tabindex="-1" role="dialog" aria-labelledby="satuanModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="satuanModalLabel">Satuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="" class="needs-validation" id="satuan-form" novalidate method="post">
            <div class="modal-body">
               <input type="text" name="id" hidden>
                         <div class="col-md-12 mb-3">
                  <label for="validationCustom02">Nama Satuan</label>
                  <input type="text" class="form-control" name="nama" id="validationCustom02" required>
                  <div class="invalid-feedback">
                  Tidak boleh kosong!
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="modal fade" id="gudangModal" tabindex="-1" role="dialog" aria-labelledby="gudangModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="gudangModalLabel">Gudang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="" class="needs-validation" id="gudang-form" novalidate method="post">
            <div class="modal-body">
               <div class="col-md-12 mb-3">
                  <input type="text" name="id" hidden>
                  <label for="validationCustom02">Kode</label>
                  <input type="text" class="form-control" name="kode" id="validationCustom02" required>
                  <div class="invalid-feedback">
                  Tidak boleh kosong!
                  </div>
               </div>
               <div class="col-md-12 mb-3">
                  <label for="validationCustom02">Nama Gudang</label>
                  <input type="text" class="form-control" name="nama" id="validationCustom02" required>
                  <div class="invalid-feedback">
                  Tidak boleh kosong!
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
   </div>
</div>