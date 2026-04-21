<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Meeting
 * @package App\Models
 *
 * @property $id
 * @property $user_id
 * @property $agency_id
 * @property $date_start
 * @property $date_end
 * @property $name
 * @property $link
 * @property $sum_default
 * @property $first_date_activate
 */
class Meeting extends Model
{
    const FIELD_ID = 'id';
    const FIELD_USER_ID = 'user_id';
    const FIELD_AGENCY_ID = 'agency_id';
    const FIELD_DATE_START = 'date_start';
    const FIELD_DATE_END = 'date_end';
    const FIELD_NAME = 'name';
    const FIELD_LINK = 'link';
    const FIELD_SUM_DEFAULT = 'sum_default';
    const FIELD_FIRST_DATE_ACTIVATE = 'first_date_activate';

    const TABLE_NAME = 'meetings';

    protected $table = self::TABLE_NAME;
    public $timestamps = false;
}
