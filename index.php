<!DOCTYPE HTML>
<html lang="ru">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>RedRocketMedia Test Task</title>
		
		<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	</head>

	<body>
		<div class="container">

		<h1>Rating</h1>

		<?php require_once 'inc/functions.php'; ?>

		<div class="rating">
			<div id="rating-stars" class="rating-stars not-voiced">
				<?php for ($i = 5; $i >= 1; $i--): ?>
				<input type="radio" name="rating" id="mark<?php echo $i; ?>" <?php echo isChecked($i); ?>>
				<label for="mark<?php echo $i; ?>">
					<span class="rating-stars__img" data-rating="<?php echo $i; ?>" onclick="doRating(this)"></span>
				</label>
				<?php endfor ?>
			</div>
			<div id="rating-num" class="rating-num"><?php echo getRatingData('count') ?></div>
		</div>
		<div id="rating-result" class="text-hint rating-result"></div>
		<!-- end rating -->


		<h1>Progress Bar</h1>
		<div id="progress-bar-current" style="display: none;">1</div>
		<div id="progress-bar" class="progress-bar">
			<div id="progress-bar-inner" class="progress-bar-inner">
				<span class="progress-bar-percentage" id="progress-bar-percentage">1%</span>
			</div>
		</div>

		<select id="progress-bar-select" class="progress-bar-select">
			<option value="8" selected >8</option>
			<option value="16">16</option>
			<option value="32">32</option>
			<option value="64">64</option>
		</select>
		<input type="submit" name="progress" value="go" onclick="changeProgressBar()">
		<div id="progress-bar-result" class="progress-bar-result text-hint"></div>
		<!-- end progress bar -->


		<h1>VanillaJS Ajax</h1>
		<div class="text-hint">Get interesting facts about numbers with <a target="_blanc" href="http://numbersapi.com/">http://numbersapi.com</a></div>
		<form onsubmit="event.preventDefault(); getNumberApi(); ">
			<input type="number" id="numbersapi" name="numbersapi" placeholder="enter any number">
			<input type="submit" value="submit" onclick="">
			<div id="numbersapi-result"></div>
		</form>

	</div> <!-- .container -->

	<script type="text/javascript" src="dist/js/script.js"></script>

	</body>
</html>



