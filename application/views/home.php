<div class="main">

	<!-- MAIN CONTENT -->
	<div class="main-content">

		<div class="content-heading">
			<div class="heading-left">
				<h1 class="page-title">Selamat datang <?= $this->session->userdata("nama")  ?></h1>
				<p class="page-subtitle">Dashboard ringkasan fitur</p>
			</div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Parent</a></li>
					<li class="breadcrumb-item active">Current</li> -->
				</ol>
			</nav>
		</div>

		<div class="container-fluid">
			<!-- TOP METRICS -->
			<div class="row">
				<div class="col-sm-6 col-lg-3">
					<div class="widget widget-metric_1 animate">
						<span class="icon-wrapper custom-bg-orange"><i class="fa fa-area-chart"></i></span>
						<div class="right">
							<span class="value"> <?= $total_produk  ?><i class="change-icon change-up fa fa-sort-up text-indicator-green"></i></span>
							<span class="title">JUMLAH PRODUK <span class="change text-indicator-green"></span></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="widget widget-metric_1 animate">
						<span class="icon-wrapper custom-bg-lightseagreen"><i class="fa fa-shopping-cart"></i></span>
						<div class="right">
							<span class="value"><?= $total_qty->total_produk  ?> <i class="change-icon change-up fa fa-sort-up text-indicator-green"></i></span>
							<span class="title">QTY PRODUK<span class="change text-indicator-green"></span></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="widget widget-metric_1 animate">
						<span class="icon-wrapper custom-bg-blue2"><i class="fa-solid fa-cart-flatbed"></i></span>
						<div class="right">
							<span class="value"><?= $stok_in  ?><i class="change-icon change-down fa fa-sort-up text-indicator-green"></i></span>
							<span class="title">STOK MASUK <span class="change text-indicator-green"></span></span>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="widget widget-metric_1 animate">
						<span class="icon-wrapper custom-bg-purple"><i class="fa-solid fa-dolly"></i></span>
						<div class="right">
							<span class="value"><?= $stok_out  ?> <i class="change-icon change-up fa fa-sort-up text-indicator-green"></i></span>
							<span class="title">STOK KELUAR <span class="change text-indicator-green"></span></span>
						</div>
					</div>
				</div>
			</div>
			<!-- END TOP METRICS -->

			<div class="card">
				<div class="card-header">
					<div class="card-title">Stok Yang Wayae Beli</div>
				</div>
				<div class="card-body">

					<table class="datatable-basic table table-bordered" id="produk-table" width="100%">
						<thead>
							<tr>
								<th width="100">KODE</th>
								<th width="100">GAMBAR</th>
								<th>NAMA</th>
								<th width="100">QTY</th>
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
									<td class="align-middle text-center" width="150px">
							
									<?php if(show_menu("stokmasuk")):  ?>
										<a href="<?= base_url("trstokmasukcontroller/action/add") ?>" class="btn btn-success text-white" title="Add"><i class="fas fa-plus"></i><span class="sr-only">Tambah</span></a>
										<?php else:  ?>
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

			<!-- END PERFORMANCE INDEX -->
		</div>
	</div>
	<!-- END MAIN CONTENT -->

</div>