<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Predefined error codes.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
enum ErrorCodes: int
{
    case PARSE_ERROR = -32700;
    case INVALID_REQUEST = -32600;
    case METHOD_NOT_FOUND = -32601;
    case INVALID_PARAMS = -32602;
    case INTERNAL_ERROR = -32603;

    /**
     * Error code indicating that a server received a notification or request
     * before the server has received the {@see $initialize} request.
     */
    case SERVER_NOT_INITIALIZED = -32002;
    case UNKNOWN_ERROR_CODE = -32001;
}
