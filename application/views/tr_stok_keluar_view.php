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
          <li class="breadcrumb-item active"><a href="#">Stok Keluar</a></li>
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
              <!-- <div class="table-responsive"> -->
              <form action="" method="get">
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="validationCustom02">Dari</label>
                    <input name="dari" type="date" class="form-control" value="<?= isset($_GET["dari"]) ? $_GET["dari"] : date("Y-m-d", strtotime("first day of this month")) ?>">
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom02">Sampai</label>
                    <input name="sampai" type="date" class="form-control" value="<?= isset($_GET["sampai"]) ? $_GET["sampai"] : date("Y-m-d", strtotime("now")) ?>">
                    </select>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary" style="position: absolute; bottom:1px">FILTER</button>
                  </div>

                </div>
              </form>
                <table class="datatable-basic table table-bordered" id="stokkeluar-table" width="120%">
                  <thead>
                    <tr>
                      <th>FAKTUR</th>
                      <th>PRODUK</th>
                      <th>KEPADA</th>
                      <th>KAPAL</th>
                      <th>QTY</th>
                      <th>SISA STOK</th>
                      <th class="text-nowrap">CREATED AT</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($tsm as $key => $value) : ?>
                      <tr>
                        <td class="align-middle"><?= $value->trfaktur  ?></td>
                        <td class="align-middle"><?= ucwords($value->pnama) ?></td>
                        <td class="align-middle"><?= ucwords($value->trkepada) ?></td>
                        <td class="align-middle"><?= ucwords($value->trnama_kapal) ?></td>
                        <td class="align-middle"><?= ucwords($value->trqty) ?></td>
                        <td class="align-middle"><?= ucwords($value->trstok_ahir) ?></td>
                        <td class="align-middle"><?= date("d-m-Y", strtotime($value->trcreated_at))  ?></td>
                        <td class="align-middle" width="150px">
                          <a href="<?= base_url("trstokkeluarcontroller/action/edit/" . $value->trid) ?>" class="btn btn-primary text-white" title="Edit"><i class="ti-eye"></i><span class="sr-only">SHOW</span></a>
                          <a id="delete-trstokkeluar" data-id="<?= $value->trid ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
                        </td>
                      </tr>
                    <?php endforeach;  ?>
                  </tbody>
                </table>
              <!-- </div> -->
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