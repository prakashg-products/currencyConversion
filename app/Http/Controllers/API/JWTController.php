<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use App\User;
use Tymon\JWTAuth\JWTAuth;

class JWTController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    private $jwt;

    /**
     * JWTController constructor.
     *
     * @param \Tymon\JWTAuth\JWTAuth $jwt
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * Get Token from the authenticated User.
     *
     * @return \Illuminate\Http\Response
     */
    public function getToken()
    {
        return response()->json(['token' => $this->jwt->fromUser(request()->user)]);
    }

    /**
     * @param \App\Http\Requests\Web\LoginRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function generateToken(LoginRequest $request)
    {
        // for our requirement with any email and password 'magic' the login should work
        if ($request->get('password') !== 'magic') {
            throw new \Exception("Credentials doesn't match.");
        }

        return response()->json(['token' => $this->jwt->fromUser(User::find(1))]);
    }
}
