<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Quote Component</div>
					<div class="panel-body">
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter a day ...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">Submit</button>
								</span>
							</div><!-- /input-group -->
						</div><!-- /.col-lg-6 -->
						<div class="col-md-6">
							<div class="input-group">
								<button class="btn btn-default" type="button">Random</button>
							</div><!-- /input-group -->
						</div><!-- /.col-lg-6 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>
