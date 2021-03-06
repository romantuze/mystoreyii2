<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property int $viewed
 * @property int $user_id
 * @property int $status
 * @property int $category_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','content'], 'required'],
            [['title','description','content'], 'string'],
            [['date'],'date','format'=>'php:Y-m-d'],
            [['date'],'default','value'=>date('Y-m-d')],
            [['title'],'string','max'=>255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }


    public function getCategory()
    {
        return $this->hasOne(Categoryarticle::className(),['id'=>'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category = Categoryarticle::findOne($category_id);
        if ($category != null) {
            $this->link('category',$category);    
            return true; 
        }       
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save();
    }


    public function saveImage($filename) 
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        if ($this->image)
        {
            return '/uploads/' . $this->image;
        } else {
            return '/images/no-image.png';
        }
       
    }


}
