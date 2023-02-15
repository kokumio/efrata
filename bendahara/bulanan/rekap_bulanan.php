<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from bulanan where jenis='Masuk'");
 while ($row = mysqli_fetch_assoc($sql)) {
    $masuk=$data['tot_masuk'];
  }
?>

while ($row = mysqli_fetch_assoc($sql)) {

<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h5>
		<i class="icon fas fa-info"></i> Saldo Kas GKE Efrata</h5>
	<h5>Pemasukan :
		<?php
  echo rupiah($masuk);
  ?>
	</h5>

	<hr>

	<h3>Saldo Akhir :
		<?php
    $saldo= $masuk;
    echo rupiah($saldo);
    ?>
	</h3>
</div>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Rekap Kas GKE Efrata</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Uraian</th>
						<th>Pemasukan</th>
						<th>Waktu</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from bulanan order by tgl_pb asc");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php  $tgl = $data['tgl_pb']; echo date("d/M/Y", strtotime($tgl))?>
						</td>
						<td>
							<?php echo $data['uraian_pb']; ?>
						</td>
						<td align="right">
							<?php echo rupiah($data['masuk']); ?>
						</td>
				<td>
							<?php echo $data['waktu']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->