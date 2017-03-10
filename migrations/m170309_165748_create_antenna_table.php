<?php

use yii\db\Migration;

/**
 * Handles the creation of table `antenna`.
 */
class m170309_165748_create_antenna_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('antenna', [
            'id' => $this->primaryKey(),
            'name' =>  $this->string()->notNull()
        ]);

        $this->batchInsert('antenna', ['id', 'name'],
            [
                [1, 'Ubiquiti RocketDish 5G'],
                [2, 'Ubiquiti RocketDish 2G'],
                [3, 'Ubiquiti AirMAX Sector 5G'],
                [4, 'Ubiquiti AirMAX Sector 2G']
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('antenna');
    }
}
