
<section class="section section-default point">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 subtitle">
        <h1>Shootalk</h1>
        <h2>喋って成長する対戦型シューティングゲーム</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-4 point-box">
        <div class="point-circle compass">
          <i class="fa fa-rocket"></i>
        </div>
        <div class="point-description">
          <h4>撃って！</h4>
        </div>
      </div>
      <div class="col-xs-4 point-box">
        <div class="point-circle compass">
          <i class="fa fa-comment"></i>
        </div>
        <div class="point-description">
          <h4>喋って！</h4>
        </div>
      </div>
      <div class="col-xs-4 point-box">
        <div class="point-circle compass">
          <i class="fa fa-signal"></i>
        </div>
        <div class="point-description">
          <h4>成長！</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 subtitle">
        <?php echo $this->Html->image('apache.jpg', array('alt' => 'CakePHP', 'class' => 'img-responsive center-block')); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 subtitle">
        <p>
          <?php
          if(is_null($loginstatus)):
            print($this->Html->link('早速プレイ!', array('controller'=>'users','action'=>'login'), array('class'=>'btn btn-lg btn-subcolor')));
          else:
            print($this->Html->link('早速プレイ!', array('controller'=>'room','action'=>'index'), array('class'=>'btn btn-lg btn-subcolor')));
          endif;
          ?>
        </p>
      </div>
    </div>
  </div>
</section>