<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agency
 * @package App\Models
 *
 * @property $id
 * @property $name
 * @property $type [to_mySelf|group]
 * @property $percentage
 * @property $logo
 * @property $url Домен
 * @property $tel
 * @property $inn
 *
 */
class Agency extends Model
{
    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
    const FIELD_TYPE = 'type';
    const FIELD_PERCENTAGE = 'percentage';
    const FIELD_LOGO = 'logo';
    const FIELD_URL = 'url';
    const FIELD_TEL = 'tel';
    const FIELD_INN = 'inn';

    const TABLE_NAME = 'agencies';

    const TYPE_TO_MYSELF = 'to_mySelf';
    const TYPE_GROUP = 'group';

    const TYPES = [
        self::TYPE_TO_MYSELF,
        self::TYPE_GROUP,
    ];

    public $timestamps = false;

    protected $table = self::TABLE_NAME;
}
