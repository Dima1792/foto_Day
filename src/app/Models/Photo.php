<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 *
 * @property $id
 * @property $stand_id
 * @property $created_at
 * @property $updated_at
 * @property $user_name
 * @property $name_mini
 * @property $name_full
 * @property $real_name_full
 * @property $sum
 * @property $sum_for_client
 * @property $date_last_order
 */
class Photo extends Model
{
    const FIELD_ID = 'id';
    const FIELD_STAND_ID = 'stand_id';
    const FIELD_CREATED_AT = 'created_at';
    const FIELD_UPDATED_AT = 'updated_at';
    const FIELD_USER_NAME = 'user_name';
    const FIELD_NAME_MINI = 'name_mini';
    const FIELD_NAME_FULL = 'real_name_full';
    const FIELD_SUM = 'sum';
    const FIELD_DATE_LAST_ORDER = 'date_last_order';

    const TABLE_NAME = 'photos';

    const DEFAULT_DATE = '1990-06-14 00:00:00';

    protected $table = self::TABLE_NAME;

    public function getRouteKeyName()
    {
        return 'name_mini';
    }
}
