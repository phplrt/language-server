<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

enum ErrorCode: int
{
    /**
     * Invalid JSON was received by the server. An error occurred on the server
     * while parsing the JSON text.
     *
     * @package JSON-RPC
     */
    case PARSE_ERROR = -32700;

    /**
     * The JSON sent is not a valid Request object.
     *
     * @package JSON-RPC
     */
    case INVALID_REQUEST = -32600;

    /**
     * The method does not exist / is not available.
     *
     * @package JSON-RPC
     */
    case METHOD_NOT_FOUND = -32601;

    /**
     * Invalid method parameter(s).
     *
     * @package JSON-RPC
     */
    case INVALID_PARAMS = -32602;

    /**
     * Internal JSON-RPC error.
     *
     * @package JSON-RPC
     */
    case INTERNAL_ERROR = -32603;

    /**
     * This is the start range of JSON-RPC reserved error codes.
     * It doesn't denote a real error code. No LSP error codes should
     * be defined between the start and end range. For backwards
     * compatibility the `ServerNotInitialized` and the `UnknownErrorCode`
     * are left in the range.
     *
     * @since 3.16.0
     */
    case JSON_RPC_RESERVED_ERROR_RANGE_START = -32099;

    /**
     * @deprecated use {@see ErrorCode::JSON_RPC_RESERVED_ERROR_RANGE_START}
     */
    final public const SERVER_ERROR_START = self::JSON_RPC_RESERVED_ERROR_RANGE_START;

    /**
     * Error code indicating that a server received a notification or
     * request before the server has received the `initialize` request.
     */
    case SERVER_NOT_INITIALIZED = -32002;

    /**
     * An unknown error.
     */
    case UNKNOWN_ERROR_CODE = -32001;

    /**
     * This is the end range of JSON-RPC reserved error codes.
     * It doesn't denote a real error code.
     *
     * @since 3.16.0
     */
    case JSON_RPC_RESERVED_ERROR_RANGE_END = -32000;

    /**
     * @deprecated use {@see ErrorCode::JSON_RPC_RESERVED_ERROR_RANGE_END}
     */
    final public const  SERVER_ERROR_END = self::JSON_RPC_RESERVED_ERROR_RANGE_END;

    /**
     * This is the start range of LSP reserved error codes.
     * It doesn't denote a real error code.
     *
     * @since 3.16.0
     */
    case LSP_RESERVED_ERROR_RANGE_START = -32899;

    /**
     * A request failed but it was syntactically correct, e.g the
     * method name was known and the parameters were valid. The error
     * message should contain human readable information about why
     * the request failed.
     *
     * @since 3.17.0
     */
    case REQUEST_FAILED = -32803;

    /**
     * The server cancelled the request. This error code should
     * only be used for requests that explicitly support being
     * server cancellable.
     *
     * @since 3.17.0
     */
    case SERVER_CANCELLED = -32802;

    /**
     * The server detected that the content of a document got
     * modified outside normal conditions. A server should
     * NOT send this error code if it detects a content change
     * in it unprocessed messages. The result even computed
     * on an older state might still be useful for the client.
     *
     * If a client decides that a result is not of any use anymore
     * the client should cancel the request.
     */
    case CONTENT_MODIFIED = -32801;

    /**
     * The client has canceled a request and a server as detected
     * the cancel.
     */
    case REQUEST_CANCELLED = -32800;

    /**
     * This is the end range of LSP reserved error codes.
     * It doesn't denote a real error code.
     *
     * @since 3.16.0
     */
    final public const LSP_RESERVED_ERROR_RANGE_END = self::REQUEST_CANCELLED;
}
