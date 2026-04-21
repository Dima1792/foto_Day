<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stand
 * @package App\Models
 *
 * @property integer id
 * @property string code
 * @property integer meeting_id
 * @property integer user_id
 * @property integer status
 * @property string info
 *
 *
 */
class Stand extends Model
{
    public $timestamps = false;

    const FIELD_ID = 'id';
    const FIELD_CODE = 'code';
    const FIELD_MEETING_ID = 'meeting_id';
    const FIELD_USER_ID = 'user_id';
    const FIELD_STATUS = 'status';
    const FIELD_INFO = 'info';

    const TABLE_NAME = 'stands';

    protected $table = self::TABLE_NAME;

    public function getRouteKeyName()
    {
        return 'code';
    }
}
