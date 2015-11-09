<div class="container">
<h1>ログイン</h1> 
<?php 
print(
  $this->Form->create('User',array('class' => 'form-horizontal')) .
  $this->Form->input('username') .
  $this->Form->input('password') .
  $this->Form->submit('Submit')
); ?>
</div>