<h1>Artigos do Blog</h1>
<table>
<?= $this->Html->link('Deslogar', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'button float-left']) ?>

    <!-- Link para Criar artigo -->
    <div style="margin-top: 20px;">
    <?= $this->Html->link('Adicionar artigo', ['action' => 'add'], ['class' => 'button float-right']) ?>
    </div>

    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Criado</th>
    </tr>

    <!-- Aqui é onde iremos iterar nosso objeto de solicitação $articles, exibindo informações de artigos -->

    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->id ?></td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Deletar',
                ['action' => 'delete', $article->id],
                ['confirm' => 'Tem certeza?'])
            ?>
            <?= $this->Html->link('Editar', ['action' => 'edit', $article->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>