<div class="main">

	<!-- MAIN CONTENT -->
	<div class="main-content">

		<div class="content-heading">
			<div class="heading-left">
				<h1 class="page-title">Selamat datang Rivaldo A</h1>
			</div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active"><a href="#">Produk</a></li>
					<!-- <li class="breadcrumb-item active">Current</li> -->
				</ol>
			</nav>
		</div>

		<div class="container-fluid">
			<!-- TOP METRICS -->
			<div class="row">
            <div class="col-md-12">       <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Produk</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered"  id="produk-table">
                    <thead>
                      <tr>
                        <th>KODE</th>
                        <th>GAMBAR</th>
                        <th>NAMA</th>
                        <th>STOK AWAL</th>
                        <th>QTY</th>
                        <th>HARGA BELI</th>
                        <th>HARGA JUAL</th>
                        <th>GUDANG</th>
                        <th>CREATED AT</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                <tbody>
                   <?php foreach ($produk as $key => $value) : ?>
                     <tr>
                        <td class="align-middle"><?= $value->kode  ?></td>
                        <td class="align-middle">
                           <img width="100" src="https://complianz.io/wp-content/uploads/2019/03/placeholder-300x202.jpg" alt="">
                        </td>
                        <td class="align-middle"><?= ucwords($value->nama  ) ?></td>
                        <td class="align-middle"><?= $value->stok_awal  ?></td>
                        <td class="align-middle"><?= $value->qty  ?></td>
                        <td class="align-middle">Rp.<?=number_format( $value->harga_beli,2,",","."); ?></td>
                        <td class="align-middle">Rp.<?=number_format( $value->harga_jual,2,",","."); ?></td>
                        <td class="align-middle">CAFE</td>
                        <td class="align-middle"><?= date("d-m-Y",strtotime($value->created_at))  ?></td>
                        <td class="align-middle">
                           <button type="button" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></button>
                        <a  id="delete-produk" data-id="<?=$value->id?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>
                        </td>
                     </tr>
                     <?php endforeach;  ?>
                </tbody>
                  </table>
                </div>
              </div>
			</div></div>
  
			<!-- END TOP METRICS -->

		
			<!-- END PERFORMANCE INDEX -->
		</div>
	</div>
	<!-- END MAIN CONTENT -->

</div>