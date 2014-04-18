<?php
if(comments_open()){
	?>
	<div class="container">
		<hr />
		<h3>Comment or <a href="http://www.twitter.com/chrishutchinson"><i class="fa fa-twitter"></i> Tweet Me</a></h3>
		<?php
		comments_template();
		?>
	</div>
	<?php
}
?>