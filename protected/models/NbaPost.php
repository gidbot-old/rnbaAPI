<?php


class NbaPost extends EMongoDocument
{
    public $linkAddress;
    public $text;
    public $postNumber;


    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Nba Post|Nba Posts', $n);
    }

    public function rules()
    {
        return [
            ['linkAddress, text', 'required'],
            ['postNumber', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'linkAddress' => Yii::t('app', 'Link Address'),
            'text' => Yii::t('app', 'Text')
        ];
    }

    public function getCollectionName()
    {
        return 'nba_posts';
    }

    public function afterFind()
    {
        $this->linkAddress = (string)$this->linkAddress;
        return parent::afterFind();
    }
}