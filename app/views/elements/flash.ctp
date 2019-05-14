<?php echo $javascript->link('formularios/flash'); ?>
<?php if ($session->check('Messages.good')):?>
	<?php 
	$messages = $session->read('Messages.good');
	foreach ( $messages as $key => $value ) {
	?>
		<div class="flash_good">
			<ul>
       			<?php echo '<li>'.$value.'</li>';?>
			</ul>
		</div>	
	<?php }
	echo '<script>window.scroll(0,0);</script>';
	$session->del('Messages.good');?>
<?php endif; ?>


<?php if ($session->check('Messages.bad')):?>
	<?php 
	$messages = $session->read('Messages.bad');
	foreach ( $messages as $key => $value ) {
	?>
		<div class="flash_bad">
			<ul>
       			<?php 
       			echo '<li>'.$value.'</li>'; 
				?>
			</ul>
		</div>	
	<?php }	
	echo '<script>window.scroll(0,0);</script>';
	$session->del('Messages.bad');?>
<?php endif; ?>


<?php if ($session->check('Messages.warn')):?>
	<?php 
	$messages = $session->read('Messages.warn');
	foreach ( $messages as $key => $value ) {
	?>
		<div class="flash_alert">
			<ul>
       			<?php 
       			echo '<li>'.$value.'</li>'; 
				?>
			</ul>
		</div>	
	<?php } 
	echo '<script>window.scroll(0,0);</script>';
	$session->del('Messages.warn'); ?>	
<?php endif; ?>