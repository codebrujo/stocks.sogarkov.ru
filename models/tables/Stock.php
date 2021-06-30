<?php

namespace app\models\tables;


/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property int $category_id
 * @property string $ticker
 * @property string $name
 * @property float $price
 * @property float $change
 * @property float $week_change
 * @property int $created_at
 * @property int $updated_at
 *
 */
class Stock extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'ticker', 'name', 'price', 'change', 'week_change'], 'required'],
            [['category_id'], 'integer'],
            [['ticker'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
            [['price', 'change', 'week_change'], 'number'],
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
            'ticker' => 'Ticker',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'change' => 'Price change',
            'week_change' => 'Price change (week)',
        ];
    }

    public static function getAll()
    {

        $val = static::find()
            ->all();

        return $val;
    }

    public static function getByCategory($categoryId)
    {

        $val = static::find()
            ->where(['category_id' => $categoryId])
            ->all();
        return $val;
    }

    public static function getByTicker($ticker)
    {

        $val = static::find()
            ->where(['ticker' => $ticker])->one();
        return $val;
    }

    public static function getByPk($id)
    {

        $val = static::find()
            ->where(['id' => $id])->one();
        return $val;
    }

}
