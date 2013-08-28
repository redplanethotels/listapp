<?php

class m130809_205324_create_request_table extends CDbMigration
{
   protected $MySqlOptions = 'ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_unicode_ci';
   public $tablePrefix;
   public $tableName;

   public function before() {
     $this->tablePrefix = Yii::app()->getDb()->tablePrefix;
     if ($this->tablePrefix <> '')
       $this->tableName = $this->tablePrefix.'request';
   }

 	public function safeUp()
 	{
 	  $this->before();
  $this->createTable($this->tableName, array(
             'id' => 'pk',
             'mglist_id' => 'INTEGER DEFAULT 0',
             'name' => 'string NOT NULL',
             'address' => 'string NOT NULL',
             'checksum'=>'INTEGER DEFAULT 0',
             'verified'=> 'TINYINT NOT NULL DEFAULT 0',
             'created_at' => 'DATETIME NOT NULL DEFAULT 0',
             'modified_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
               ), $this->MySqlOptions);
              $this->createIndex('request_id', $this->tableName , 'id', true);
 	}

 	public function safeDown()
 	{
 	  	$this->before();
       $this->dropIndex('request_id', $this->tableName);
 	    $this->dropTable($this->tableName);
 	}
}