<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('Title'); ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap'); ?>
	<?php 
	echo $this->Html->css('bootstrap-responsive.min');
	echo $this->Html->css('main');
	echo $this->Html->css('font-awesome.min'); 
	echo $this->Html->script('chart');
	?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
-->
<?php
echo $this->fetch('meta');
echo $this->fetch('css');
?>
<style type="text/css">
body { padding-top: 80px; }
@media ( min-width: 768px ) {
	#banner {
		min-height: 300px;
		border-bottom: none;
	}
	.bs-docs-section {
		margin-top: 8em;
	}
	.bs-component {
		position: relative;
	}
	.bs-component .modal {
		position: relative;
		top: auto;
		right: auto;
		left: auto;
		bottom: auto;
		z-index: 1;
		display: block;
	}
	.bs-component .modal-dialog {
		width: 90%;
	}
	.bs-component .popover {
		position: relative;
		display: inline-block;
		width: 220px;
		margin: 20px;
	}
	.nav-tabs {
		margin-bottom: 15px;
	}
	.progress {
		margin-bottom: 10px;
	}
}
</style>
</head>

<body>
	<header>
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="/" class="navbar-brand">Shootalk</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-main">
					
					<?php
					if($this->Session->read('user')):
						echo $this->Html->nestedList(
							array($this->Html->link('ログアウト', array('controller'=>'users','action'=>'logout'),array('escape'=>false))),
							array('class' => 'nav navbar-nav')
							);
					else:
						echo $this->Html->nestedList(
							array($this->Html->link('新規登録', array('controller'=>'users','action'=>'register'),array('escape'=>false)),
								$this->Html->link('ログイン', array('controller'=>'users','action'=>'login'),array('escape'=>false))),
							array('class' => 'nav navbar-nav')
							);
					endif;
					?>
					
				</div>
			</div>
		</div>
	</header>



	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>

	

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php 
	echo $this->Html->script('bootstrap');
	?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
