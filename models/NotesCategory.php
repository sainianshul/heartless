<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notes_categories".
 *
 * @property int $id
 * @property string $name
 * @property int $status_id
 * @property int $created_by_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $createdBy
 */
class NotesCategory extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notes_categories';
    }

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public static function getStatusOptions()
    {
        return [
            self::STATUS_DELETED => 'Deleted',
            self::STATUS_INACTIVE => 'Inactive',
            self::STATUS_ACTIVE => 'Active',
        ];
    }

    public function getStatusName()
    {
        return self::getStatusOptions()[$this->status] ?? '';
    }

    public function getStatusBadge()
    {
        $statusOptions = self::getStatusOptions();
        $status = $this->status_id;
        $class = 'badge badge-';
        if ($status == self::STATUS_ACTIVE) {
            $class .= 'success';
        } elseif ($status == self::STATUS_INACTIVE) {
            $class .= 'warning';
        } else {
            $class .= 'danger';
        }
        return "<span class='$class'>$statusOptions[$status]</span>";
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status_id', 'created_by_id', 'created_at', 'updated_at'], 'required'],
            [['status_id', 'created_by_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['created_by_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status_id' => 'Status',
            'created_by_id' => 'Created By ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by_id']);
    }
 
    

    public static function count()
    {
        return static::find()->count();
    }

    public static function countActive()
    {
        return static::find()->where(['status_id' => self::STATUS_ACTIVE])->count();
    }

    public static function countInactive()
    {
        return static::find()->where(['status_id' => self::STATUS_INACTIVE])->count();
    }




}
