<?php

/**
 * This is the model class for table "{{request}}".
 *
 * The followings are the available columns in table '{{request}}':
 * @property integer $id
 * @property integer $mglist_id
 * @property string $name
 * @property string $address
 * @property integer $verified
 * @property string $created_at
 * @property string $modified_at
 */
class Request extends CActiveRecord
{
  public $list_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Request the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{request}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address', 'required'),
			array('mglist_id, verified', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>255),
			array('created_at', 'safe'),
			array('address', 'mailgunValidator'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mglist_id, name, address, verified, created_at, modified_at', 'safe', 'on'=>'search'),
		);
	}

  public function mailgunValidator($attribute,$params)
  {
        $yg = new Yiigun();
   	    $result = $yg->validate($this->$attribute);
   	    if ($result->is_valid)
   	      return false;
   	    else {
          $this->addError($attribute, 'There is a problem with your email address '.$result->address.'. Did you mean '.$result->did_you_mean.'?');   	      
   	    }
  }
  
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mglist_id' => 'List',
			'name' => 'Name',
			'address' => 'Address',
			'verified' => 'Verified',
			'created_at' => 'Created At',
			'modified_at' => 'Modified At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('mglist_id',$this->mglist_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('verified',$this->verified);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('modified_at',$this->modified_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function insertMember($name,$address) {
	  // create if new, otherwise update fields
	  $lookup_item=Member::model()->findByAttributes(array('address'=>$address));
	  if (!is_null($lookup_item)) {
	    $member_id = $lookup_item->id;
	  } else {
	    $m = new Member;
	    $m->name = $name;
	    $m->address = $address;
	    $m->status =1;
      $m->created_at =new CDbExpression('NOW()'); 
      $m->modified_at =new CDbExpression('NOW()');          	    
	    $m->save();
	    $member_id = $m->id;
	  }
	  return $member_id;
	}
	
}