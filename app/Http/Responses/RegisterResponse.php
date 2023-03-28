<?php


namespace App\Http\Responses;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as Response;

class RegisterResponse implements Response
{
    public function toResponse($request)
    {
        return $request->wantsJson()
            ? new JsonResponse(auth()->user(), 201)
            : redirect(config('fortify.user'));
    }
}
