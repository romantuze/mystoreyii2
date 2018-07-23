<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categoryarticle`.
 */
class m180629_192915_create_categoryarticle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categoryarticle', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categoryarticle');
    }
}
