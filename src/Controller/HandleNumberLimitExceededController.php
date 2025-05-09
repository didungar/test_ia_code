<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class HandleNumberLimitExceededController extends AbstractController
{
    public function handleNumberLimitExceeded(Request $request): Response
    {
        // Check if the request exceeds the number limit
        if ($request->headers->get('x-ratelimit-remaining') <= 0) {
            throw new TooManyRequestsHttpException();
        }

        // If the request does not exceed the number limit, continue processing it normally
        return $this->handle($request);
    }
}