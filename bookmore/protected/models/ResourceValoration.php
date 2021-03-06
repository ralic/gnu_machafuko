<?php

/**
 * This is the model class for table "ResourceValoration".
 *
 * The followings are the available columns in table 'ResourceValoration':
 * @property integer $id
 * @property integer $res
 * @property integer $val
 *
 * The followings are the available model relations:
 * @property Resource $res0
 * @property Valoration $val0
 */
class ResourceValoration extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param  string             $className active record class name.
     * @return ResourceValoration the static model class
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
        return 'ResourceValoration';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('res, val', 'required'),
            array('res, val', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, res, val', 'safe', 'on'=>'search'),
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
            'res0' => array(self::BELONGS_TO, 'Resource', 'res'),
            'val0' => array(self::BELONGS_TO, 'Valoration', 'val'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'res' => 'Resource ID',
            'val' => 'Valoration ID',
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
        $criteria->compare('res',$this->res);
        $criteria->compare('val',$this->val);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
