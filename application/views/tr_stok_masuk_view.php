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
          <li class="breadcrumb-item active"><a href="#">Stok Masuk</a></li>
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
      <!-- TOP METRICS -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Stok Masuk</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="stokmasuk-table">
                  <thead>
                    <tr>
                      <th>FAKTUR</th>
                      <th>PRODUK</th>
                      <th>DISTRIBUTOR</th>
                      <th>QTY</th>
                      <th class="text-nowrap">CREATED AT</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tsm as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= $value->trfaktur  ?></td>
                        <td class="align-middle"><?= ucwords($value->pnama) ?></td>
                        <td class="align-middle"><?= ucwords($value->dnama) ?></td>
                        <td class="align-middle"><?= ucwords($value->trqty) ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->pcreated_at))  ?></td>
                        <td class="align-middle" width="150px">
                          <a href="<?= base_url("trstokmasukcontroller/action/edit/" . $value->trid) ?>" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></a>
                          <a id="delete-trstokmasuk" data-id="<?= $value->trid ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
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