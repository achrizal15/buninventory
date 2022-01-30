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
          <li class="breadcrumb-item active"><a href="#">User</a></li>
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
              <h3 class="card-title">Daftar User</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <a href="<?=base_url("usercontroller/action/add")?>" class="btn btn-primary mb-3">TAMBAH</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="user-table" width="120%">
                  <thead>
                    <tr>
                      <th>NAMA</th>
                      <th>EMAIL</th>
                      <th>ROLE</th>
                      <th class="text-nowrap">CREATED AT</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($user as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= ucwords($value->unama)  ?></td>
                        <td class="align-middle"><?= $value->uemail  ?></td>
                        <td class="align-middle"><?= ucwords($value->rnama)  ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->ucreated_at))  ?></td>
                        <td class="align-middle" width="150px">
                          <a href="<?= base_url("Usercontroller/action/edit/" . $value->uid) ?>" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></a>
                          <?php if ($value->uid != $this->session->userdata("id")) :  ?>
                            <a id="delete-user" data-id="<?= $value->uid ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
                          <?php endif;  ?>
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