<?php
  $this->extend('/Common/default');
  $this->assign('title', 'Add New User');
?>

<ol class="breadcrumb">
  <li><?php echo $this->Html->link('Users', '/users'); ?></li>
  <li class="active">Add New User</li>
</ol>

<section>
  <?php
    echo $this->Form->create('User', array(
      'inputDefaults' => array(
        'div' => array(
          'class' => 'form-group'
        )
      )
    ));
    echo $this->Form->input('first_name', array(
      'class' => 'form-control',
    ));
    echo $this->Form->input('last_name', array(
      'class' => 'form-control',
    ));
    echo $this->Form->input('email', array(
      'type' => 'email',
      'label' => 'Email Address',
      'class' => 'form-control',
    ));
    echo $this->Form->input('username', array(
      'class' => 'form-control',
    ));
    echo $this->Form->input('password', array(
      'type' => 'password',
      'class' => 'form-control',
    ));
    echo $this->Form->input('confirm_password', array(
      'type' => 'password',
      'class' => 'form-control'
    ));
    echo $this->Form->input('role_id', array(
      'options' => $roles,
      'label' => 'Role',
      'class' => 'form-control'
    ));
    echo $this->Form->button('Create', array(
      'class' => 'btn btn-primary'
    ));
    echo $this->Form->end();
  ?>
</section>
