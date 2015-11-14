<section class="section section-default point">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 subtitle">
        <h2>ルームを選択してください</h2>
        <?php
        $header_list = '<thead>'.$this->Html->tableHeaders(array(
          'ルーム名',
          '参加人数'
          ),array('class' => ''),array('class'=>'text-center')).'</thead>';
        $cells_list = $this->Html->tableCells(
          array(
            array('Red', '30'),
            array(array('Orange',array('class' => 'haspass')) ,array('10',array('class' => 'haspass'))),
            array('Yellow', '5'),
            )
          );
        echo $this->Html->tag('table',$header_list.$cells_list,array('class' => 'table table-striped table-bordered table-hover', 'id'=>'room_table'));
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
    $this->Form->submit('Submit')
    ); ?>
  </div>
  <div id="password_dialog">
    <?php 
    print(
      $this->Form->create('Room',array('class' => 'form-horizontal')) .
      $this->Form->input('password') .
      $this->Form->submit('Submit')
      ); ?>
    </div>

    <?php $this->Html->scriptStart(array('inline' => false)); ?>
    $('#room_table td').click(function(){
    //縦
    var row = $(this).closest('tr').index();
    //横
    var col = this.cellIndex;
    console.log('Row: ' + row + ', Column: ' + col);
    if($(this).hasClass('haspass')){
    $('#password_dialog').dialog('open');
  }
  else{
  document.location.href = "http://localhost/index.php/game/room/"+row;
}
});
$('#newroom_dialog').dialog({
autoOpen: false,
title: '新規ルーム作成',
closeOnEscape: false,
modal: true,
});
$('#password_dialog').dialog({
autoOpen: false,
title: 'パスワード入力',
closeOnEscape: false,
modal: true,
});
function open_newroom_dialog(){
$('#newroom_dialog').dialog('open');
}
<?php $this->Html->scriptEnd(); ?>