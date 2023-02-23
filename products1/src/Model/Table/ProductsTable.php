<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductCommentsTable&\Cake\ORM\Association\HasMany $ProductComments
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ProductComments', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('Cart', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Reaction', [
            'foreignKey' => 'product_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('product_title')
            ->maxLength('product_title', 255)
            ->requirePresence('product_title', 'create')
            ->notEmptyString('product_title');

        $validator
            ->scalar('product_description')
            ->maxLength('product_description', 255)
            ->requirePresence('product_description', 'create')
            ->notEmptyString('product_description');

        $validator
            ->scalar('product_category')
            ->maxLength('product_category', 255)
            ->requirePresence('product_category', 'create')
            ->notEmptyString('product_category');

        $validator
            ->scalar('product_image')
            ->maxLength('product_image', 255)
            ->requirePresence('product_image', 'create')
            ->notEmptyFile('product_image');

        $validator
            ->scalar('product_tags')
            ->maxLength('product_tags', 255)
            ->requirePresence('product_tags', 'create')
            ->notEmptyString('product_tags');
            
        $validator
            ->dateTime('created_date')
            ->notEmptyDateTime('created_date');

        $validator
            ->dateTime('modified_date')
            ->notEmptyDateTime('modified_date');

        return $validator;
    }
}
