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
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>

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
</head>

<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="/">Title</a>
				<?php
				if($this->Session->read('user')):
					echo $this->Html->link('ログアウト', array('controller'=>'users','action'=>'logout'),array('class' => 'btn btn-danger pull-right','escape'=>false));
				else:				
					echo $this->Html->link('新規登録', array('controller'=>'users','action'=>'register'),array('class' => 'btn btn-success pull-right','escape'=>false));
					echo $this->Html->link('ログイン', array('controller'=>'users','action'=>'login'),array('class' => 'btn btn-success pull-right','escape'=>false));
				endif;
				?>
			</div>
		</div>
	</div>

	<div class="container">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

	</div> <!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
