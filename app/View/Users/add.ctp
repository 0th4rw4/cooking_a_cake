<div class="users form">
	<h2>  Usuario Logeado: <?php echo $username ? $username : __('Ninguno'); ?>  </h2>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password', array('type'=>'text') );
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
        $mt_client_id = $mt_client_id ? $mt_client_id : null;
        echo $this->Form->hidden( 'mt_client_id', array( 'value' => $mt_client_id ) );

    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>