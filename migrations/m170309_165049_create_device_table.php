<?php

use yii\db\Migration;

/**
 * Handles the creation of table `device`.
 */
class m170309_165049_create_device_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'dev' => $this->string()->notNull()
        ]);

        $this->batchInsert('device', ['id', 'dev'],
            [
                [1, 'RB 912UAG'],
                [2, 'RB 921UAG'],
                [3, 'RB 433'],
                [4, 'RB 411AH'],
                [5, 'RB 711AH']
            ]
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('device');
    }
}
