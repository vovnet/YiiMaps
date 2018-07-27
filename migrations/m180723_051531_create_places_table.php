<?php

use yii\db\Migration;

/**
 * Handles the creation of table `places`.
 */
class m180723_051531_create_places_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('places', [
            'id' => $this->primaryKey(),
            'address' => $this->string()->notNull(),
            'lat' => $this->string()->notNull(),
            'lng' => $this->string()->notNull(),
        ]);

        $areas = require('./data/areas.php');

        foreach ($areas as $key => $value) {
            $this->insert('places', [
                'address' => $key,
                'lat' => $value['lat'],
                'lng' => $value['long'],
            ]);
        }
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('places');
    }
}
