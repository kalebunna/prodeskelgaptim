<div class="container">
    <div class="page-header">
		<div class="row">
			<div class="col-sm-6">
				<h3><?= $page ?></h3>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<h6>Export Data</h6>
				</div>
				<div class="card-body">
					<p>Data diambil dari data penduduk yang telah diinputkan sebelumnya <b>jika belum upload silahkan upload terlebih dahulu.</b>data yang diixport akan di berbentuk excel dan berupa angka angka.<b> harap jangan dirubah datanya</b> karena akan bisa jadi akan terhajad<span class="text-danger"> error</span> dan datanya tidak diinputkan ke database Digdaya atau data tidak akan valid.</p>
					<a href="<?= base_url("Sid/export_data_penduduk") ?>"class="btn  btn-primary">Export Data Penduduk</a>
					<a href="http://" class="btn  btn-warning ">Export Data Keluarga</a>
				</div>
			</div>
		</div>
	</div>
</div>