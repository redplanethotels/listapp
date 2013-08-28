<?php

class m130828_010524_add_hash_to_request_table extends CDbMigration
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
    $this->addColumn($this->tableName,'hash','VARCHAR(255) DEFAULT NULL');
 	}

 	public function safeDown()
 	{
 	  	$this->before();
      $this->dropColumn($this->tableName,'hash');        
 	}
}