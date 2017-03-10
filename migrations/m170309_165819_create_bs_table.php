<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bs`.
 */
class m170309_165819_create_bs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bs', [
            'id' => $this->primaryKey(),
            'dev_id'=>$this->integer(),
            'ant_id'=>$this->integer(),
            'name'=>$this->string()
        ]);

        $this->batchInsert('bs', ['dev_id', 'ant_id', 'name'],
            [
                [1, 2, 'Россошь, вышка ОРТПЦ'],
                [2, 1, 'Лиски, Энтузиастов'],
                [3, 3, 'Бобров, вышка ОРТПЦ'],
                [2, 2, 'Кантемировка, Элеватор'],
                [4, 2, 'Богучар, вышка МРСК'],
                [3, 4, 'Острогожск, сев. Микрорайон'],
                [2, 4, 'Острогожск, Элеватор'],
                [3, 1, 'Эртиль, Сахарный Завод'],
                [4, 1, 'Нижнедевицк, вышка Билайн'],
                [4, 2, 'Бобров, Элеватор'],
                [2, 2, 'Колыбелка, Воднап. башня'],
                [1, 2, 'Yii2, полный капец'],
                [2, 4, 'Заосер. сады, вышка Мегафон'],
                [3, 2, 'Поворино, вышка Мегафон'],
                [3, 2, 'Борисоглебск, вышка Мегафон']
            ]
            );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bs');
    }
}
