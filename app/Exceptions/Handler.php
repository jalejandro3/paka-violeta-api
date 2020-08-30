<?php

namespace App\Exceptions;

use App\Exceptions\Service\ServiceException;
use Carbon\Carbon;
use Cassandra\Exception\UnauthorizedException;
use GuzzleHttp\Exception\ClientException;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Throwable;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Errors list.
     *
     * @var array
     */
    private $errors = [
        [
            'class' => ApplicationException::class,
            'error_message' => 'Bad Request.',
            'response_code' => ResponseCode::HTTP_BAD_REQUEST
        ],
        [
            'class' => UnauthorizedException::class,
            'error_message' => 'Access Denied.',
            'response_code' => ResponseCode::HTTP_UNAUTHORIZED
        ],
        [
            'class' => ServiceException::class,
            'error_message' => 'Internal System Error.',
            'response_code' => ResponseCode::HTTP_INTERNAL_SERVER_ERROR
        ],
        [
            'class' => ClientException::class,
            'error_message' => 'Internal System Error.',
            'response_code' => ResponseCode::HTTP_INTERNAL_SERVER_ERROR
        ],
        [
            'class' => ProcessFailedException::class,
            'error_message' => 'Internal System Error.',
            'response_code' => ResponseCode::HTTP_INTERNAL_SERVER_ERROR
        ],
        [
            'class' => ResourceNotFoundException::class,
            'error_message' => 'Resource not found.',
            'response_code' => ResponseCode::HTTP_NOT_FOUND
        ]
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Throwable $exception
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($error = $this->exceptionExists($exception)) {
            return $this->getResponse($exception, $error);
        }

        return $this->getResponse($exception);
    }

    /**
     * Check if error exists in error array
     *
     * @param Throwable $exception Exception to find into errors array.
     * @return Exception|bool
     */
    private function exceptionExists(Throwable $exception)
    {
        foreach ($this->errors as $error) {
            if ($exception instanceof $error['class']) {
                return $error;
            }
        }

        return false;
    }

    /**
     * Configura el mensaje de error a devolver.
     *
     * @param Throwable $exception
     * @param null $error
     * @return JsonResponse
     */
    private function getResponse(Throwable $exception, $error = null)
    {
        if (! is_null($error)) {
            $errorMessage = $this->getMessageError($exception, $error);
            $responseCode = $this->getResponseCode($exception, $error);
            $response = $this->getErrorResponse($errorMessage, $exception, $responseCode);
        } else {
            $response = $this->getErrorResponse('Ha ocurrido un error!', $exception, 500);
        }

        return $response;
    }

    /**
     * Return error response.
     *
     * @param string $message
     * @param int $code
     * @param Throwable $exception
     * @return JsonResponse
     */
    protected function getErrorResponse(string $message, Throwable $exception, int $code)
    {
        return response()->json([
            'timestamp' => Carbon::now(),
            'error' => $exception->getMessage(),
            'message' => $message
        ], $code);
    }

    /**
     * Return error message.
     *
     * @param Throwable $exception
     * @param $error
     * @return string
     */
    private function getMessageError(Throwable $exception, $error): string
    {
        return ($exception->getMessage() === ''
            && isset($error['error_message'])) ? $error['error_message'] : $exception->getMessage();
    }

    /**
     * Return response code.
     *
     * @param Throwable $exception
     * @param $error
     * @return int|mixed
     */
    private function getResponseCode(Throwable $exception, $error)
    {
        return ($exception->getCode() === 0 &&
            isset($error['response_code'])) ? $error['response_code'] : $exception->getCode();
    }
}
