<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * from work where id = '{$_GET['id']}' ");
	foreach($qry->fetch_array() as $k => $v){
		if(!is_numeric($k)){
			$$k = $v;
		}
	}
}
?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">Work</h5>
		</div>
		<div class="card-body">
			<form id="work">
				<div class="row" class="details">
					<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="" class="control-label">Company</label>
							<textarea name="company" cols="30" rows="2" class="form-control"><?php echo isset($company) ? $company : '' ?></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="" class="control-label">Position</label>
							<textarea name="position" cols="30" rows="2" class="form-control"><?php echo isset($position) ? $position : '' ?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group col-xs-7">
							<label for="" class="control-label">Started</label>
							<select name="s_month" id="" class="select custom-select custom-select-sm">
								<?php 
									for ($m=1; $m<=12; $m++) {
									     $_month = date('F', mktime(0,0,0,$m, 1, date('Y')));
									     echo "<option ".((isset($s_month) && $s_month == $_month) ? "selected" : "").">" .$_month.'</option>';
									    }
								?>
							</select>
						</div>
						<div class="form-group col-xs-5">
							<label for="" class="control-label"></label>
							<select name="s_year" id="" class="select custom-select custom-select-sm">
								<?php 
									for ($y =0; $y < 100; $y++) {
									     $_year = date('Y') - $y;
									     echo "<option ".((isset($s_year) && $s_year == $_year) ? "selected" : "").">" .$_year.'</option>';
									    }
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group col-xs-7">
							<label for="" class="control-label">Ended</label>
							<select name="e_month" id="" class="select custom-select custom-select-sm">
								<?php 
									for ($m=1; $m<=12; $m++) {
									     $_month = date('F', mktime(0,0,0,$m, 1, date('Y')));
									     echo "<option ".((isset($e_month) && $e_month == $_month) ? "selected" : "").">" .$_month.'</option>';
									    }
								?>
							</select>
						</div>
						<div class="form-group col-xs-5">
							<label for="" class="control-label"></label>
							<select name="e_year" id="" class="select custom-select custom-select-sm">
								<?php 
									for ($y =0; $y < 100; $y++) {
									     $_year = date('Y') - $y;
									     echo "<option ".((isset($e_year) && $e_year == $_year) ? "selected" : "").">" .$_year.'</option>';
									    }
								?>
							</select>
							<br>
							<label for="present"><input type="checkbox" name="present" id="present">Present</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
				             <textarea name="description" id="" cols="30" rows="10" class="form-control summernote"><?php echo (isset($description)) ? html_entity_decode(($description)) : '' ?></textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary btn-sm" form="work"><?php echo isset($_GET['id']) ? "Update": "Save" ?></button>
			<a class="btn btn-primary btn-sm" href="./?page=work">Cancel</a>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('.select')
		$('#work').submit(function(e){
			e.preventDefault();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Content.php?f=work",
				method:"POST",
				data:$(this).serialize(),
				error: err=>{
					alert_toast("An error occured",'error')
					console.log(err);
				},
				success:function(resp){
					if(resp != undefined){
						resp = JSON.parse(resp)
						if(resp.status == 'success'){
							location.href=_base_url_+"admin/?page=work";
						}else{
							alert_toast("An error occured",'error')
							console.log(resp);
							end_loader();
						}
					}
				}
			})
		})
		$('.summernote').summernote({
		        height: 200,
		        toolbar: [
		            [ 'style', [ 'style' ] ],
		            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
		            [ 'fontname', [ 'fontname' ] ],
		            [ 'fontsize', [ 'fontsize' ] ],
		            [ 'color', [ 'color' ] ],
		            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
		            [ 'table', [ 'table' ] ],
		            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
		        ]
		    })
	})
	
</script>