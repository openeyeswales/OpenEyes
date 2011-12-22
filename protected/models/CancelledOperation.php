<?php
/*
_____________________________________________________________________________
(C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
(C) OpenEyes Foundation, 2011
This file is part of OpenEyes.
OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
_____________________________________________________________________________
http://www.openeyes.org.uk   info@openeyes.org.uk
--
*/

/**
 * This is the model class for table "cancelled_operation".
 *
 * The followings are the available columns in table 'cancelled_operation':
 * @property string $element_operation_id
 * @property string $cancelled_date
 * @property string $user_id
 * @property string $cancelled_reason_id
 * @property string $cancellation_comment
 *
 * The followings are the available model relations:
 * @property ElementOperation $elementOperation
 * @property CancellationReason $cancelledReason
 */
class CancelledOperation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CancelledOperation the static model class
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
		return 'cancelled_operation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('element_operation_id, cancelled_reason_id', 'required'),
			array('element_operation_id, cancelled_reason_id', 'length', 'max'=>10),
			array('cancelled_date', 'safe'),
			array('cancellation_comment', 'length', 'max' => 200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('element_operation_id, cancelled_date, cancelled_reason_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'elementOperation' => array(self::BELONGS_TO, 'ElementOperation', 'element_operation_id'),
			'cancelledReason' => array(self::BELONGS_TO, 'CancellationReason', 'cancelled_reason_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'element_operation_id' => 'Element Operation',
			'cancelled_date' => 'Cancelled Date',
			'created_user_id' => 'User',
			'cancelled_reason_id' => 'Cancelled Reason',
			'cancellation_comment' => 'Cancellation comment'
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

		$criteria->compare('element_operation_id',$this->element_operation_id,true);
		$criteria->compare('cancelled_date',$this->cancelled_date,true);
		$criteria->compare('created_user_id',$this->created_user_id,true);
		$criteria->compare('cancelled_reason_id',$this->cancelled_reason_id,true);
		$criteria->compare('cancellation_comment',$this->cancellation_comment,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
