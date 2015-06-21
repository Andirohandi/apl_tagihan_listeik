<style>
table thead th{
	text-align:center;
}

</style>
<div class="box col-md-12">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-user"></i> Data Pemakai</h2>
		</div>
		<br/>
		<div class="box-content">
			<form class="form-inline">
				
				<div id="kanan-menu">
					<div class="form-group" style='margin-left:0px' >
						<label>Tahun : </label>
						<select id="get_tahun" class="form-control">
							<option value="">ALL</option>
							<?php 
								$tak = 2020;
								for($x=2000;$x<=$tak;$x++)
								{
									echo "<option value='$x'>$x</option>";
								}
							
							?>
						</select>
					</div>
					<div class="form-group" style='margin-left:20px'>
						<label>Bulan : </label>
						<select id="get_bulan" class="form-control" >
							<option value="">ALL</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
					
					<div class="form-group" style='float:right;'>
						<div class="input-group" id='aksi'>
							<button type='button' class='btn btn-success' onclick='simpan_generate()'><i class='glyphicon glyphicon-search'></i>  Tampilkan</button>
						</div>
					</div>
				</div>
			</form>
			</br>
		
		<table class="table table-striped table-bordered responsive">
			<thead>
				<th>No</th>
				<th>TAHUN</th>
				<th>BULAN</th>
				<th>SALDO AWAL</th>
				<th>PENDAPATAN</th>
				<th>BIAYA REKENING</th>
				<th>BIAYA LAIN - LAIN</th>
				<th>SALDO AKHIR</th>
				<th>AKSI</th>
			</thead>
			<tbody id="table_saldo">
				
			</tbody>
		</table>
		</div>
</div>
<script>
$(document).ready(function(){
	get_db_pengeluaran();
});

function get_db_pengeluaran()
{
	var bulan 	= $('#get_bulan').val();
	var tahun 	= $('#get_tahun').val();
	
	$.ajax({
		url		: 'saldo/get_dt_saldo',
		type	: 'POST',
		dataType: 'html',
		data	: {
			bulan:bulan,
			tahun:tahun
			},
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			
			$('#table_saldo').html(result);
		}
	});
}


</script>