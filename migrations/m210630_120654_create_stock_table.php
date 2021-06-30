<?php

use yii\db\Migration;

/**
 * Handles the creation of table `stock`.
 */
class m210630_120654_create_stock_table extends Migration
{

    public function timestamps($tableName)
    {
        $this->addColumn(
            $tableName,
            'created_at',
            $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')
        );

        $this->addColumn(
            $tableName,
            'updated_at',
            $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        );

        $this->addColumn(
            $tableName,
            'deleted_at',
            $this->timestamp()->null()->defaultExpression('NULL')
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $this->createTable('stock', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'ticker' => $this->string(50)->notNull(),
            'name' => $this->string(250)->notNull(),
            'price' => $this->float()->notNull(),
            'change' => $this->float()->notNull(),
            'week_change' => $this->float()->notNull(),
        ]);

        $this->timestamps('stock');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('stock');
    }
}
