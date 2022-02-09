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
        <!-- MAS ALDO DIV DIBAWAH INI TOLONG DIHAPUS YA JANGAN LUPA PENUTUP DIVNYA -->
              <div class="table-responsive">

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