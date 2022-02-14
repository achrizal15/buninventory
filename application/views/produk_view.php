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
          <li class="breadcrumb-item active"><a href="#">Produk</a></li>
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
              <h3 class="card-title">Daftar Produk</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <!-- <div class="table-responsive"> -->
              <form action="" method="get">
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="validationCustom02">Gudang</label>
                    <select name="gudang-name" class="form-control">
                      <option value="all" <?= isset($_GET["gudang-name"]) ? $_GET["gudang-name"] == "all" ? "selected" : "" : "" ?>>Tampil Semua</option>
                      <?php foreach ($gudang as $key => $value) : ?>
                        <option <?= isset($_GET["gudang-name"]) ? $_GET["gudang-name"] == $value->nama ? "selected" : "" : "" ?> value="<?= $value->nama ?>">
                          <?= ucwords($value->nama) ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="validationCustom02">Satuan</label>
                    <select name="satuan-name" class="form-control">
                      <option value="all" <?= isset($_GET["satuan-name"]) ? $_GET["satuan-name"] == "all" ? "selected" : "" : "" ?>>Tampil Semua</option>
                      <?php foreach ($satuan as $key => $value) : ?>
                        <option <?= isset($_GET["satuan-name"]) ? $_GET["satuan-name"] == $value->nama ? "selected" : "" : "" ?> value="<?= $value->nama ?>"><?= ucwords($value->nama) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary" style="position: absolute; bottom:1px">FILTER</button>
                  </div>

                </div>
              </form>


              <table class="datatable-basic table table-bordered" id="produk-table" width="120%">
                <thead>
                  <tr>
                    <th>KODE</th>
                    <th>GAMBAR</th>
                    <th>NAMA</th>
                    <th>QTY</th>
                    <th class="text-nowrap">HARGA BELI</th>
                    <th class="text-nowrap">HARGA JUAL</th>
                    <th>GUDANG</th>
                    <th>SATUAN</th>
                    <th class="text-nowrap">CREATED AT</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($produk as $key => $value) : ?>
                    <tr>
                      <td class="align-middle"><?= $value->pkode  ?></td>
                      <td class="align-middle">
                        <img width="100" src="<?= base_url("assets/images/products/") . $value->pgambar ?>" alt="">
                      </td>
                      <td class="align-middle"><?= ucwords($value->pnama) ?></td>
                      <td class="align-middle"><?= $value->pqty  ?></td>
                      <td class="align-middle">Rp.<?= number_format($value->pharga_beli, 2, ",", "."); ?></td>
                      <td class="align-middle">Rp.<?= number_format($value->pharga_jual, 2, ",", "."); ?></td>
                      <td class="align-middle"><?= ucwords($value->gnama)  ?></td>
                      <td class="align-middle"><?= ucwords($value->snama)  ?></td>
                      <td class="align-middle"><?= date("d-m-Y", strtotime($value->pcreated_at))  ?></td>
                      <td class="align-middle" width="150px">
                        <a href="<?= base_url("produkcontroller/index/edit/" . $value->pid) ?>" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></a>
                        <a id="delete-produk" data-id="<?= $value->pid ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
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