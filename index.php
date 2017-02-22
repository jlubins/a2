<?php require('textarrays.php'); ?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>XKCD Password Generator</title>
  <meta name="author" content="John Lubinski">

  <link rel="stylesheet" href="css/styles.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <h1>XKCD Password Generator</h1>

  <form method='post' action='/#'>
    <input type='hidden' name='alwaysPost' value='0'>

    <label for='text'>Select which base text you would like to use to generate your password.</label>
      <select name='text' id='text'>
        <option value='choose'>Choose one...</option>
        <option value='alice'>Alice in Wonderland</option>
        <option value='constitution'>United States Constitution</option>
        <option value='iliad'>Homer's Iliad</option>
      </select>

    <input name="wordnumber" type="range" min="3" max="6" step="1" />

    <fieldset class='checkboxes'>
      <label><input type='checkbox' name='uppercase_checkbox' value='isuppercase'>Uppercase</label>
      <label><input type='checkbox' name='incl_number_checkbox' value='incl_number'>Include Number</label>
    </fieldset>

    <input type='submit' class='btn btn-primary btn-small'>

    <?php if($_POST): ?>
			<div class="alert <?=$alertType?>" role="alert">
				<?=$results?>
			</div>
		<?php endif; ?>
  </form>

  <!-- <?php dump($generatednumbers, $password, $isuppercase, $generatedvalues) ?> -->

</body>
</html>
