<?php

namespace app\models\tables;


/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $chapter_id
 * @property string $name
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 */
class Categories extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chapter_id'], 'integer'],
            [['name', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chapter_id' => 'Chapter ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    public static function getByChapterID($chapter_id)
    {

        return static::find()
            ->where(['chapter_id' => $chapter_id])
            ->all();

    }

}
