<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m250221_113928_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(255)->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // Create indexes for better performance
        $this->createIndex('idx-user-username', 'user', 'username');
        $this->createIndex('idx-user-email', 'user', 'email');
        $this->createIndex('idx-user-status', 'user', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}

// //DROP TABLE IF EXISTS user;
// DROP TABLE IF EXISTS migration;

// php yii migrate/to m250221_113928_create_user_table
// php yii migrate/to m250526_000001_initial_setup

// php yii migrate