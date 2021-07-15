<?php

declare(strict_types=1);

namespace App\Constants;

/**
 * Class Setting
 *
 * @package App\Constants
 */
class Setting
{
    public const PAGE_SIZE = 5;
    public const COLUMNS = '*';
    public const DESC = 'DESC';
    public const ASC = 'ASC';
    public const DEFAULT_ORDER = 'created_at';
    public const DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    public const ORDERS = [
        self::DESC,
        self::ASC,
    ];
}
