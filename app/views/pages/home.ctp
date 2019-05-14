<div id="redirect">
	<?php echo $html->link('', array('controller'=>'usuarios', 'action' => 'principal')); ?>
</div>
<script type="text/javascript"> 
    window.onload = function (){
    	document.location = document.getElementById('redirect').children[0].getAttribute('href');
    }
</script>