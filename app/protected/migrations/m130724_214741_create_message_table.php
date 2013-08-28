<?php

class m130724_214741_create_message_table extends CDbMigration
  {
    protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
    public $tablePrefix;
    public $tableName;

    public function before() {
      $this->tablePrefix = Yii::app()->getDb()->tablePrefix;
      if ($this->tablePrefix <> '')
        $this->tableName = $this->tablePrefix.'message';
    }

  	public function safeUp()
  	{
  	  $this->before();
   $this->createTable($this->tableName, array(
              'id' => 'pk',
              'mglist_id' => 'integer default 0',
              'subject' => 'string NOT NULL',
              'body' => 'text',
              'status'=> 'TINYINT NOT NULL DEFAULT 0',
              'sent_at' => 'DATETIME NOT NULL DEFAULT 0',
              'created_at' => 'DATETIME NOT NULL DEFAULT 0',
              'modified_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                ), $this->MySqlOptions);
               $this->createIndex('member_id', $this->tableName , 'id', true);
               $this->addForeignKey('fk_message_list', $this->tableName, 'mglist_id', $this->tablePrefix.'mglist', 'id', 'CASCADE', 'CASCADE');
  	}

  	public function safeDown()
  	{
  	  	$this->before();
        $this->dropForeignKey('fk_message_list', $this->tableName);
        $this->dropIndex('member_id', $this->tableName);
  	    $this->dropTable($this->tableName);
  	}
}