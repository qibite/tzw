<?php

use yii\db\Migration;

/**
 * Class m191016_104933_books
 */
class m191016_104933_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(5),
            'author_id' => $this->integer(5),
            'write_at' => $this->date(),
            'title' => $this->string(255),
            'rate' => $this->float(),
        ]);

        $this->createIndex(
            'id',
            '{{%books}}',
            'id'
        );

        $this->createIndex(
            'author_id',
            '{{%books}}',
            'author_id'
        );

        $this->addForeignKey(
            'book_of_author',
            '{{%books}}',
            'author_id',
            '{{%authors}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191016_104933_books cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191016_104933_books cannot be reverted.\n";

        return false;
    }
    */
}
