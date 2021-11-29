<div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Html->link('Cadastrar Usuário', ['controller' => 'Users', 'action' => 'add'], ['class' => 'button float-right']) ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('email', ['required' => true]) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>