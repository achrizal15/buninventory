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
          <li class="breadcrumb-item active"><a href="#">Laporan</a></li>
        </ol>
      </nav>
    </div>

    <div class="container-fluid">
      <!-- TOP METRICS -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan</h3>
            </div>
            <div class="card-body">
              <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
              <form action="" method="get">
                <div class="row mb-3">
                  <div class="col-md-2">
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
                  <div class="col-md-2">
                    <label for="validationCustom02">Satuan</label>
                    <select name="satuan-name" class="form-control">
                      <option value="all" <?= isset($_GET["satuan-name"]) ? $_GET["satuan-name"] == "all" ? "selected" : "" : "" ?>>Tampil Semua</option>
                      <?php foreach ($satuan as $key => $value) : ?>
                        <option <?= isset($_GET["satuan-name"]) ? $_GET["satuan-name"] == $value->nama ? "selected" : "" : "" ?> value="<?= $value->nama ?>"><?= ucwords($value->nama) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
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
                  <div class="col-md-2" >
                    <div class="footer-filter">
                      <button type="submit" class="btn btn-primary">FILTER</button>
                      </div>
                  
                  </div>

                </div>
              </form>
         
                <table class="datatable-basic table table-bordered table-laporan" id="stokmasuk-table" width="120%">
                  <thead>
                    <tr>
                      <th rowspan="2">PRODUK</th>
                      <th rowspan="2">SATUAN</th>
                      <th rowspan="2">GUDANG</th>
                      <th colspan="4" class="text-center">STOK</th>
                    </tr>
                    <tr>
                      <th class="text-nowrap">PRODUK</th>
                      <th class="text-nowrap">MASUK</th>
                      <th class="text-nowrap">KELUAR</th>
                      <th class="text-nowrap">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($laporan as $p) :  ?>
                      <tr>
                        <td><?= ucwords($p["produk"]->pnama)  ?></td>
                        <td><?= ucwords($p["produk"]->snama)  ?></td>
                        <td><?= ucwords($p["produk"]->gnama)  ?></td>
                        <td><?= $p["produk"]->pqty  ?></td>
                        <td><?= $p["in"]  ?></td>
                        <td><?= $p["out"]  ?></td>
                        <td class="<?= $p["total"] > 0 ? "text-success" : "text-danger" ?>"><?= $p["total"] > 0 ? "+" . $p["total"] : $p["total"] ?></td>
                      </tr>
                    <?php endforeach  ?>
                  </tbody>
                </table>
       
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