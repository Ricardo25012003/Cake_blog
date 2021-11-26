<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator) : Validator
    {
        $validator
            ->notEmpty('title')
            ->notEmpty('body');

        return $validator;
    }

    public function isOwnedBy($articleId, $userId)
    {
    return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }
    
}
