<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dboard".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 * @property string $colour
 * @property int $refresh_time
 *
 * @property Act[] $acts
 */
class Dboard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dboard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'colour'], 'string'],
            [['position', 'refresh_time'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'position' => 'Позиция',
            'colour' => 'Цвет',
            'refresh_time' => 'Обновление',
        ];
    }


    /**
     * Gets query for [[Acts]].
     *
     * @return \yii\db\ActiveQuery
     */
public function getAct()
{
    return $this->hasOne(Act::class, ['dboard_id' => 'id']);
}
}
