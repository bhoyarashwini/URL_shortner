<html>
<head>
<style type = "text/css";
</head>
<body>
<h1>
Welcome
</h1>
<p>Type the url in the box below and we will shorten it for you</p>
<div id = "shortning_form">
<form name = "shortning_form" autocomplete = "off" method = "post" action = "">
<ul>
	<li>
		<label for = "url"> URL </label>
			<div>
				<input id = "url" name = "url" type = "text" value = "" tabindex = "1">
			</div>
	</li>
	<li>
		<?php echo validation_errors(); ?>
	</li>
	<li>
			<div>
				<input name = "button" type = "button" value = "Make Short">
			</div>
	</li>
</ul>
</form>
</div>
<p>Ends here </p>
</body>
</html>