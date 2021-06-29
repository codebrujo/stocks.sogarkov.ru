<?php

namespace app\models\tables;


/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property string $short_descr
 * @property string $image_name
 * @property int $access_level
 * @property int $created_at
 * @property int $updated_at
 *
 */
class Articles extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'access_level'], 'integer'],
            [['name', 'content', 'short_descr'], 'string'],
            [['image_name'], 'string', 'max' => 255],
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
            'category_id' => 'Category ID',
            'name' => 'Name',
            'content' => 'Content',
            'short_descr' => 'Short description',
            'image_name' => 'Image Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public static function getByCategory($categoryId)
    {

            $val = static::find()
                ->where(['category_id' => $categoryId])
                ->all();

            return $val;
        }

    }
