<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "act".
 *
 * @property int $id
 * @property string $cmd
 * @property int $dboard_id
 * @property string $type
 *
 * @property Dboard $dboard
 */
class Act extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'act';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cmd'], 'required'],
            [['cmd', 'type'], 'string'],
            [['dboard_id'], 'integer'],
            [['dboard_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dboard::class, 'targetAttribute' => ['dboard_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cmd' => 'Комманда',
            'dboard_id' => 'Dboard ID',
            'type' => 'Тип',
        ];
    }

public static function getTypeOptions()
{
    return [
        'cmd' => 'Открытый',
        'btn' => 'Скрытый',
    ];
}
public static function getColourOptions()
{
    return [
        'card-header-primary' => 'Системный',
        'card-header-success' => 'Незначительно',
        'card-header-info' => 'Скрытый',
        'card-header-warning' => 'Важно',
        'card-header-danger' => 'Опасно',
    ];
}
    /**
     * Gets query for [[Dboard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDboard()
    {
        return $this->hasOne(Dboard::class, ['id' => 'dboard_id']);
    }
}
