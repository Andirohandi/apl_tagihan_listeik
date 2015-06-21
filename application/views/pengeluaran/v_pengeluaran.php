<style>
table thead th{
	text-align:center;
}

</style>
<div class="box col-md-8">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-list"></i> Data Pengeluaran Bulanan</h2>
		</div>
		<br/>
		<div class="box-content">
			<form class="form-inline">
				
				<div id="kanan-menu">
					<div class="form-group" >
						<label for="exampleInputName2">Jmlh : </label>
						<select class="form-control" id="get_jumlah" >
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
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
					<div class="form-group" style='margin-left:20px'>
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
					<div class="form-group" style='float:right;'>
						<div class="input-group">
							<button type='button' class='btn btn-info' onclick='get_db_pengeluaran()'><i class='glyphicon glyphicon-search'></i>  Tampilkan</button>
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
				<th>TAGIHAN</th>
				<th>LAIN_LAIN</th>
				<th>KETERANGAN</th>
			</thead>
			<tbody id="table_pengeluaran">
				
			</tbody>
		</table>
		</div>
</div>
<div class="box col-md-4">
	<div class="box-inner">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-plus"></i> Input Pengeluaran</h2>
		</div>
		<br/>
		<div class="box-content">
			<div class="row">
				<div class="col-sm-12 col-md-12 cok-xs-12">
					<label>Tahun </label>
					<select class='form-control' id='sel_thn' onchange='cek_periode()'>
					<?php sel_thn();?>
					</select>
					<br/>
					<label>Bulan</label>
					<select class='form-control' id='sel_bln' onchange='cek_periode()'>
					<?php sel_bln();?>
					</select>
					<br/>
					<div style='display:none;' id='input_tagihan'>
						<label>Biaya Tagihan</label>
						<input type="text" id="get_tagihan" name="get_tagihan" class="form-control" placeholder="Masukkan Tagihan">
						<br/>
						<label>Biaya Lain</label>
						<input type="text" id="get_lain" name="get_lain" class="form-control" placeholder="Masukkan Biaya Lain - Lain">
						<br/>
						<label>Keterangan </label>
						<textarea id="get_keterangan" name="get_keterangan" class="form-control" ></textarea>
						<br/><br/>
						<button type='button' style='float:right;margin-bottom:20px;' class='btn btn-sm btn-success' onclick='simpan_pengeluaran()'><i class='glyphicon glyphicon-plus'></i> Tambah Pemakai</button>
						<br/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	get_db_pengeluaran();
	cek_periode();
});

function get_db_pengeluaran()
{
	var bulan 	= $('#get_bulan').val();
	var tahun 	= $('#get_tahun').val();
	var jumlah  = $('#get_jumlah').val();
	
	$.ajax({
		url		: 'pengeluaran/get_dt_pengeluaran',
		type	: 'POST',
		dataType: 'html',
		data	: {
			jumlah:jumlah,
			bulan:bulan,
			tahun:tahun
			},
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			
			$('#table_pengeluaran').html(result);
		}
	});
}

function cek_periode()
{
	var bulan = $('#sel_bln').val();
	var tahun = $('#sel_thn').val();
	
	$.ajax({
		url		: 'pengeluaran/get_dt_periode',
		type	: 'POST',
		dataType: 'json',
		data	: {
			bulan:bulan,
			tahun:tahun
			},
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			if(result.rs==1){
				$('#input_tagihan').fadeOut(500);
				alertify.alert('Maaf! Periode '+result.bln+' '+result.thn+' telah ada!');
			}else{
				$('#input_tagihan').fadeIn(500);
			}
		}
	});
	
}

function simpan_pengeluaran()
{
	var bulan = $('#sel_bln').val();
	var tahun = $('#sel_thn').val();
	var tagihan = $('#get_tagihan').val();
	var lainlain = $('#get_lain').val();
	var ket = $('#get_keterangan').val();
	
	$.ajax({
		url		: 'pengeluaran/tambah_pengeluran',
		type	: 'POST',
		dataType: 'json',
		data	: {
			bulan:bulan,
			tahun:tahun,
			tagihan:tagihan,
			lainlain:lainlain,
			ket:ket
			},
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			if(result.rs==0)
			{
				
				alertify.error('Maaf! Data gagal disimpan. Periksa kembali data yang anda inputkan');
			}else{
				$('#sel_bln').val();
				$('#sel_thn').val();
				$('#get_tagihan').val('');
				$('#get_lain').val('');
				$('#get_keterangan').val('');
				$('#input_tagihan').fadeOut(500);
				get_db_pengeluaran();
				alertify.success('Data berhasil ditambahkan');
			}
		}
	});
}

</script>