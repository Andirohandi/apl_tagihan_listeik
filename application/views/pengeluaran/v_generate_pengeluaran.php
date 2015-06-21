
<div class="box col-md-8">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-list"></i> Data Pengeluaran Bulanan</h2>
		</div>
		<br/>
		<div class="box-content">
			<form class="form-inline">
				
				<div id="kanan-menu">
					<div class="form-group" style='margin-left:0px' >
						<label>Tahun : </label>
						<select id="get_tahun" class="form-control" onchange="get_report()">
							<?php sel_thn();?>
						</select>
					</div>
					<div class="form-group" style='margin-left:20px'>
						<label>Bulan : </label>
						<select id="get_bulan" class="form-control" onchange="get_report()">
							<?php sel_bln()?>
						</select>
					</div>
					
					<div class="form-group" style='float:right;'>
						<div class="input-group" id='aksi'>
							<button type='button' class='btn btn-info' onclick='simpan_generate()'><i class='glyphicon glyphicon-cog'></i>  Generate</button>
						</div>
					</div>
				</div>
			</form>
			</br>
			<div id='hasil2'>
				
			</div>
			<div id='hasil'>
				
			</div>
</div>
<script>
$(document).ready(function(){
	get_report();

});

function get_report()
{
	var bulan = $('#get_bulan').val();
	var tahun = $('#get_tahun').val();
	
	$.ajax({
		url		: 'get_dt_generate',
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
			var conten = '';
			if(result.rs==1){
				
				$('#aksi').hide(500);
				$('#hasil').fadeIn(500);
				conten +="<div class='alert alert-success'>";
				conten +="<i class='glyphicon glyphicon-ok'></i> Data bulan "+result.bln+" "+result.thn+" telah di generate";
				conten +="</div>";
				$('#hasil').empty().append(conten);
			}else{
				$('#aksi').show(500);
				$('#hasil').fadeOut(500);
			}
		}
	});
}

function simpan_generate()
{
	var bulan = $('#get_bulan').val();
	var tahun = $('#get_tahun').val();
	
	$.ajax({
		url		: 'simpan_generate',
		type	: 'POST',
		dataType: 'json',
		data	: {
			bulan:bulan,
			tahun:tahun
			},
		beforeSendf : function()
		{
			$('#hasil2').html("<img src='<?php echo base_url() ?>asset/theme/img/ajax-loaders/ajax-loader-1.gif' title='img/ajax-loaders/ajax-loader-1.gif'>");
		},
		success : function(result)
		{
			var conten = '';
			if(result.rs==1){
				$('#hasil2').hide(1000);
				get_report();
			}else{
				
			}
		}
	});
	
}

</script>


