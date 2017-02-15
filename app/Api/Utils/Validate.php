<?php
/**
 * Created by PhpStorm.
 * User: zhangzhiqiang
 * Date: 17-2-7
 * Time: 下午3:15
 */

namespace App\Api\Utils;

use JWTAuth;

class Validate
{
    public function validate(){
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error'=>'user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['error'=>'token_expired'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['error'=>'token_invalid'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['error'=>'token_absent'], $e->getStatusCode());

        }

    }
}