<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modal error report</title>
	<style>
		.form-group{
			margin-bottom: 0px;
		}
	</style>
</head>
<body>
	<div id="modal-inquiry" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<form class="modal-content">			
				<div class="modal-header text-center" style="height:150px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2>Become a Proud RE/MAX AGENT</h2>
					<span>Unlimited Income Opportunities</span>
				</div>
				<div class="modal-body">
					<div class="form-group" style="margin-bottom: 0px">
						Name : <input type="text" name="error-name" required>
					</div>
					<div class="form-group">
						Email: <input type="text" name="error-email" required>
					</div>
					<div class="form-group">
						Phone : <input type="text" name="error-name" required>
					</div>

					<div class="form-group">
						Message :
						<textarea style="width: 100%; height: 150px; margin-top: 10px;"></textarea>
					</div>				
				</div>
				<div class="modal-footer" style="padding: 10px;margin-top: 0px;">
					<div class="form-group">							
						<button id="error-submit" type="submit" class="btn btn-block">Submit</button>
					</div>				
				</div>	
			</form>
		</div>
	</div>
</body>
</html>

