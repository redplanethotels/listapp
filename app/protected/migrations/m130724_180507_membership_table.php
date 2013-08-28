<?php

class m130724_180507_membership_table extends CDbMigration
  {
    protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
    public $tablePrefix;
    public $tableName;

    public function before() {
      $this->tablePrefix = Yii::app()->getDb()->tablePrefix;
      if ($this->tablePrefix <> '')
        $this->tableName = $this->tablePrefix.'membership';
    }

  	public function safeUp()
  	{
  	  $this->before();
   $this->createTable($this->tableName, array(
              'id' => 'pk',
              'mglist_id'=> 'INTEGER DEFAULT 0',
              'member_id'=> 'INTEGER DEFAULT 0',
              'created_at' => 'DATETIME NOT NULL DEFAULT 0',
              'modified_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                ), $this->MySqlOptions);
               $this->createIndex('membership_id', $this->tableName , 'id', true);
               $this->addForeignKey('fk_mglist', $this->tableName, 'mglist_id', $this->tablePrefix.'mglist', 'id', 'CASCADE', 'CASCADE');
               $this->addForeignKey('fk_member', $this->tableName, 'member_id', $this->tablePrefix.'member', 'id', 'CASCADE', 'CASCADE');
  	}

  	public function safeDown()
  	{
  	  	$this->before();
        $this->dropForeignKey('fk_mglist', $this->tableName);
        $this->dropForeignKey('fk_member', $this->tableName);  	  	
        $this->dropIndex('membership_id', $this->tableName);
  	    $this->dropTable($this->tableName);
  	}
}