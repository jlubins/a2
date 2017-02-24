<?php require('textarrays.php'); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>XKCD Password Generator</title>
		<meta name="author" content="John Lubinski">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Coda" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div id="passwordgenerator">
						<h1>XKCD Password Generator</h1>
            <br>
						<form method='post' action='/'>
							<div class="row">
	            <div class="col-sm-4">
							<input type='hidden' name='alwaysPost' value='0'>
							<label for='text'>Select which base text you would like to use to generate your password.</label>
              <div class="dropdown dropdown-dark">
								<select name='text' id='text' class="dropdown-select">
									<option value='choose'>Choose one...</option>
									<option value='iliad.txt'>Homer's Iliad</option>
									<option value='alice.txt'>Alice in Wonderland</option>
									<option value='constitution.txt'>United States Constitution</option>
								</select>
							</div>
            </div>
            <div class="col-sm-4">
              <label for='wordnumber'>Select the number of words you would like to be generated.</label>
              <div class="dropdown dropdown-dark">
								<select name="wordnumber" class="dropdown-select">
									<option value='3'>3</option>
									<option value='4'>4</option>
									<option value='5'>5</option>
									<option value='6'>6</option>
								</select>
							</div>
            </div>

              <div class="col-sm-2">
                <fieldset class='checkboxes'>
  								<label id="check1"><input type='checkbox' name='uppercase_checkbox' value='isuppercase'>Uppercase</label><br><br>
  								<label id="check2"><input type='checkbox' name='incl_number_checkbox' value='incl_number'>Include Number</label><br><br>
  							</fieldset>
              </div>
              <div class="col-sm-2">
                <br>
              <input type='submit' class='btn btn-primary btn-small'>
            </div>
              </div>
							<?php if ($_POST): ?>
							<div class="alert <?=$alertType?>" role="alert">
								<h2>
								<?=$password?>
								</h2>
							</div>
							<?php endif; ?>
						</form>
				</div>
			</div>
	</body>
</html>
