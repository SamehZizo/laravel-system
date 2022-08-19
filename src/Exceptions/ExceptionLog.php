<?php

namespace Sameh\LaravelSystem\Exceptions;

use Sameh\LaravelSystem\Models\System\SystemModel;

/**
 * @property int|mixed|null $source_id
 * @property int|mixed|null $user_id
 * @property int|mixed|null $code
 * @property mixed|string|null $file
 * @property int|mixed|null $line
 * @property mixed|string|null $message
 * @property mixed|string|null $trace
 * @property array|mixed|null $body
 * @property mixed|string|null $url
 * @property mixed|string|null $agent
 * @property mixed|string|null $root
 * @property array|mixed|string|null $header
 * @property bool|mixed $is_json
 * @property bool|mixed $is_ajax
 */
class ExceptionLog extends SystemModel
{

}
