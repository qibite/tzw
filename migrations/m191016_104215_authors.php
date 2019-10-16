<?php

use yii\db\Migration;

/**
 * Class m191016_104215_authors
 */
class m191016_104215_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(5)->comment('Идентификатор, он же индекс'),
            'name' => $this->string(255)->comment('Имя или псевдоним писателя'),
            'birth' => $this->date()->comment('Дата рождения'),
            'rate' => $this->float()->comment('Рэйтинг'),
        ]);

        $this->createIndex(
            'id',
            '{{%authors}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191016_104215_authors cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191016_104215_authors cannot be reverted.\n";

        return false;
    }
    */
}
