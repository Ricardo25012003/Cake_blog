<div class="users form">
    <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Add User') ?></legend>
            <?= $this->Form->control('email') ?>
            <?= $this->Form->control('password') ?>
            <?= $this->Form->control('role', [
                'options' => ['admin' => 'Admin', 'author' => 'Author']
            ]) ?>
    </fieldset>
    <?= $this->Form->button(__('Cadastrar')); ?>
    <?= $this->Html->link('voltar', ['controller' => 'Articles', 'action' => 'index'], ['class' => 'button float-right']) ?>
    <?= $this->Form->end() ?>

</div>