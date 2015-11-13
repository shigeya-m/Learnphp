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
            array('Orange', '10'),
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
          print($this->Html->tag('a','新規ルーム作成', array('class'=>'btn btn-lg btn-subcolor','onClick'=>'alert("ルーム作成処理を追加");')));
        ?>
      </div>
    </div>
  </div>
</section>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
$('#room_table td').click(function(){
    //縦
    var row = $(this).closest('tr').index();
    //横
    var col = this.cellIndex;
    console.log('Row: ' + row + ', Column: ' + col);
    document.location.href = "http://localhost/index.php/game/room/"+row;
});
<?php $this->Html->scriptEnd(); ?>