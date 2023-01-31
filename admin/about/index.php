<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">About</h5>
		</div>
		<div class="card-body">
			<form id="about_c">
				<div class="form-group">
					<input type="hidden" name="file" value="about">
					<label for="" class="control-label">About Content</label>
		             <textarea name="content" id="" cols="30" rows="10" class="form-control summernote"><?php echo (is_file(base_app.'about.html')) ? file_get_contents((base_app.'about.html')) : '' ?></textarea>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary btn-sm" form="about_c">Update </button>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('#about_c').submit(function(e){
			e.preventDefault();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Content.php?f=update",
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
							location.reload()
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