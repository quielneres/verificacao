<?php echo $html->docType('xhtml-strict'); ?> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<head>
	<?php 
		echo $html->charset('');
		echo $html->css(array('jquery-ui-1.8.1.custom','firefox'));
		echo $javascript->link(array('https://www.google.com/recaptcha/api.js','jquery-1.6.1.min', 'jquery-ui-1.8.13.custom.min','jquery.jeditable.mini','jquery.form.min','jquery.meio.mask.min','jquery.format.1.02.min', 'jquery.ui.datepicker-pt-BR','jquery.price_format.1.3.js','jquery.numeric.pack','jquery.floatnumber','easyTooltip.min','jquery.abas','funcoes','jquery.select-to-autocomplete'));
	?>
	<title>Sistema Toop Life</title>	  
	<meta name="GENERATOR" content="Marcos Vinícius" /> 
	<meta name="AUTHOR" content="Marcos Vinícius - www.inovesystem.com.br" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="KEYWORDS" content="SISTEMA Toop Life" />
</head>
<body>
    
    	<script type='text/javascript'>
		var string_array = "<?php echo $session->read('string_array'); ?>";
	</script>
    
	<div id="ajax_load"></div>
	<div id="corpo">
		<div id="conteudo">
			<div id="topo">
			<?php echo $this->element('dados_sistema');?>  
			</div>

                        <?php echo $this->element('menu'); ?>
                    
			<div id="inicial"><?php 
			echo $content_for_layout;?>
                        </div>
		</div>
		<div id="rodape">

                    Afiliado: <b><?php echo ($session->read('Auth.Usuario.username')) ? $session->read('Auth.Usuario.NomeUsuario'): ''; ?></b>
                    
                <!--<div class="direita">
                    MI- Ministério de Integração Nacional
                </div>--> 
		</div>
	</div>
</body>
</html>
