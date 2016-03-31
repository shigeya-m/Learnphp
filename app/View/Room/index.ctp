<html>
	<head>
		<title></title>
	</head>
	<body>
		<section class="section section-default point">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 subtitle">
						<h2>ルームを選択してください</h2>
							<?php
								$all_rows = array();
								foreach($tableCells as $tableCell) {
								    $cells = array();
								    $haspass = false;
								    if($tableCell[$modelName]['password']!==''){
								    	$haspass = true;
								    }
								    foreach($tableHeaders as $tableHeader) {
								    	$cell = $tableCell[$modelName][$tableHeader];
								    	if($haspass){
								    		$cell = array($cell,array('class' => 'haspass'));
								    	}
								        array_push($cells, $cell);
								    }
								    array_push($all_rows,$cells);
								}

								$tableHeaders = '<thead>'.$this->Html->tableHeaders($tableHeaders,array('class' => ''),array('class'=>'text-center')).'</thead>';
								$all_rows = $this->Html->tableCells($all_rows);
								echo $this->Html->tag('table',$tableHeaders.$all_rows,array('class' => 'table table-striped table-bordered table-hover', 'id'=>'room_table'));
							?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 subtitle">
						<?php
										print($this->Html->tag('a','新規ルーム作成', array('class'=>'btn btn-lg btn-subcolor','onClick'=>'open_newroom_dialog();')));
										?>
					</div>
				</div>
			</div>
		</section>
		<div id="newroom_dialog">
			<?php 
				print(
					$this->Form->create('Room',array('class' => 'form-horizontal')) .
					$this->Form->input('roomname') .
					$this->Form->input('password') .
					$this->Form->submit('Submit', array('name' => 'create')).
					$this->Form->end()
					); ?>
		</div>
		<div id="password_dialog">
			<?php 
				print(
					$this->Form->create('Room',array('class' => 'form-horizontal')) .
					$this->Form->input('roomname',array('id'=>'enter_room_name','disabled'=>'disabled')) .
					$this->Form->input('password') .
					$this->Form->submit('Submit', array('name' => 'enter','onclick'=>"$('#enter_room_name').prop('disabled',false);")).
					$this->Form->end()
					); ?>
		</div>
		<?php $this->Html->script('room_index', array( 'inline' => false )); ?>
	</body>
</html>
