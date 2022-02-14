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
              <table class="datatable-basic table table-bordered" id="produk-table" width="100%">
                <thead>
                  <tr>
                    <th width="100">KODE</th>
                    <th width="100">GAMBAR</th>
                    <th>NAMA</th>
                    <th width="100">QTY</th>
                    <th width="100">TANGGAL</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($produk as $key => $value) : ?>
                    <tr>
                      <td class="align-middle"><?= $value->kode  ?></td>
                      <td class="align-middle">
                        <img width="100" src="<?= base_url("assets/images/products/") . $value->gambar ?>" alt="">
                      </td>
                      <td class="align-middle"><?= ucwords($value->nama) ?></td>
                      <td class="align-middle"><?= $value->qty  ?></td>
                      <td class="align-middle"><?= date("d-m-Y", strtotime($value->created_at))  ?></td>
                      <td class="align-middle text-center" width="150px">

                        <?php if (show_menu("stokmasuk")) :  ?>
                          <a href="<?= base_url("trstokmasukcontroller/action/add") ?>" class="btn btn-success text-white" title="Add"><i class="fas fa-plus"></i><span class="sr-only">Tambah</span></a>
                        <?php else :  ?>
                          <!-- italic -->
                          <i>Anda tidak memiliki akses</i>
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

      <!-- END TOP METRICS -->


      <!-- END PERFORMANCE INDEX -->
    </div>
  </div>
  <!-- END MAIN CONTENT -->

</div>