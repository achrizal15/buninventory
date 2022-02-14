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
               <li class="breadcrumb-item active"><a href="#">Distributor</a></li>
               <!-- <li class="breadcrumb-item active">Current</li> -->
            </ol>
         </nav>
      </div>

      <div class="container-fluid">
         <!-- TOP METRICS -->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Daftar Distributor</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
                     <div style="overflow-x: auto;">
                        <table class="table table-bordered" id="distributor-table"> 
                           <thead>
                              <tr>
                                 <th>NAMA</th>
                                <th>TELEPON</th>
                                <th>EMAIL</th>
                                <th>ALAMAT</th>
                                 <th>CREATED AT</th>
                                 <th>ACTION</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($distributor as $key => $value) : ?>
                                 <tr>
                                    <td class="align-middle"><?= $value->nama  ?></td>
                                    <td class="align-middle"><?= $value->telepon  ?></td>
                                    <td class="align-middle"><?= $value->email  ?></td>
                                    <td class="align-middle"><?= $value->alamat  ?></td>
                                    <td class="align-middle"><?= date("d-m-Y", strtotime($value->created_at))  ?></td>
                                    <td class="align-middle">
                                       <a href="<?= base_url("distributorcontroller/action/edit/" . $value->id) ?>" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></a>
                                       <a id="delete-distributor" data-id="<?= $value->id ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
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

         <!-- END TOP METRICS -->


         <!-- END PERFORMANCE INDEX -->
      </div>
   </div>
   <!-- END MAIN CONTENT -->

</div>