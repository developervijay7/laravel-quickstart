<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

/**
 * Class ReportableException.
 */
class ReportableExceptions extends Exception
{
    /**
     * @var
     */
    public $message;

    /**
     * ReportableException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Report the exception.
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param Request $request
     * @return Response
     */
    public function render(Request $request): Response
    {
        // All instances of ReportableException redirect back with a flash message to show an error
        return redirect()
            ->back()
            ->withInput()
            ->withFlashError($this->message);
    }
}
