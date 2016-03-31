<section class="section section-default point">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 subtitle">
        <h2><?php echo $roomname ?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 subtitle">
        <canvas id="tutorial" width="400" height="300"></canvas>
      </div>
      <div class="col-xs-6 subtitle">
        <?php
        $header_list = '<thead>'.$this->Html->tableHeaders(array(
          'ユーザ名',
          'コメント'
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
        <div class="input-group">
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-subcolor" type="submit">コメント</button>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
    function draw(){
        var canvas = document.getElementById('tutorial');
        if (canvas.getContext){
            var ctx = canvas.getContext('2d');
            ctx.fillRect(50,50,300,200);
            ctx.clearRect(120,80,200,140);
            ctx.strokeRect(200,20,180,260);
            ctx.font = "bold 22px 'ＭＳ Ｐゴシック'";
            ctx.fillText('ゲーム画面',0,30);
        }
    }
    $(document).ready(function(){
  draw();
});
      <?php $this->Html->scriptEnd(); ?>