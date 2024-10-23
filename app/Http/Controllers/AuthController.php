<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Libraries\WebApiResponse;

class AuthController extends Controller
{
    const HTTP_OK = Response::HTTP_OK;
    const HTTP_CREATED = Response::HTTP_CREATED;
    const HTTP_UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;


    /**
     * Login user and create token
     * @group  Authentication
     * @param Request $request
     * @bodyParam  phone string required The name of Phone Number. Example: 01960139091
     * @bodyParam  password string required The name of password <b>(min:5,max:10).</b> Example: 12345678
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"success","message":"Loggedin Successfully.","code":200,"data":{"id":1,"name":"kamal","email":"admin@gmail.com","email_verified_at":null,"created_at":"2023-06-20T07:00:09.000000Z","updated_at":"2023-06-20T07:00:09.000000Z","status":1,"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDBhYWQ2Y2JkYjVkYmU3MmVhZTFmNGMxMjlhZWM1Yjc1OTkyMDY3OTA2OGZhMWU3OTdjM2NjODZjM2IwNDQwMTQwMWE5YzBlMTNlNDIyN2YiLCJpYXQiOjE2ODcyNTU2ODMuMzk0NTQsIm5iZiI6MTY4NzI1NTY4My4zOTQ1NDIsImV4cCI6MTcxODg3ODA4My4zOTA4OTIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.k9pcFNg9PycATWHLHCs4yOV1_Z5nWnkhHYsRoSQ3yzezj5VjkkXx5Vr5tmqA6c43gM7DwghSelW2OIaMzUPXYDgNaHM06yDhNPhTjCubHW7mu-5U9LPRB8QPFUc7DbWvWgEBt7xJ0poh7v9esQV5_LJH-UFCKsBJ5KtUt6DQl5juA2NYca3kPzHTR13s4vWLgVJF-wIQdfX70Jr6TXcZBWbIHJdFkPlm8EnhlQ2fsYgwQ-WLX1pQWFegfxO9bhqhGlTvLb19Ku7uIrT0YVRHVjNSxWotRKrdcz0coeZwqiCh9eS2ZeoWAD-n748wAtdWkdOFdY7HHeYkpDUBeyFxl5gHKg3xDCRfaa7dIp3DQ_rEf3rKY0-cck3dx-559pIeMuVGhEMafIdHZEah2OrVp1CaZv_tN22wTwfgmw6ZNBSt_cXjNXK_ebws4oYTy3l5fedSDH0WnZegqxYsjO7dWpDlONNrHL1CrC3RGp-fQpTsuF76n6VXxD4ZOBDQl2yyHuvV44foTDHorB2t7ZFUg-OKqTfcpCX0L2-fikf5kdIjc--hh54fF6x7T89sD0785RrkTHkX6qYKyhXJhTdV0ICPAaOtpK67MPQN8egpzyppypt0qlyFpF9nyqlgfndPrXx9ItsX4J36GV6ez0UudjXizRftJLRe3P6mfG9b6Ec"}}
     */
    public function login(Request $request)
    {
        $customMessages = [
            'phone.required' => 'Enter valid Phone Number.',
            'password.required' => 'Enter valid Password.',
            'password.string' => 'Enter The Sting Type Password.',
            'password.min' =>  'The password must be at least 6 characters.',
            'password.max' =>  'The password may not be greater than 10 characters.',
        ];
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'string|required|min:6|max:10'
        ],$customMessages);
        if ($validator->fails()) {
            return WebApiResponse::validationError($validator, $request);
        }

        $user = User::where('phone', $request->phone)->first();
        /*if(!empty($user)){
            // return "if";
            $errors = [
                ['field' => '',
                    'value' => '',
                    'message' => [
                        trans('auth.account_deactive')
                    ]]
            ];
            return WebApiResponse::error(400, $errors , trans('auth.account_deactive'));
        }
        else*/ if(empty($user)){
            $errors = [
                ['field' => '',
                    'value' => '',
                    'message' => [
                        trans('auth.account_not_found')
                    ]]
            ];
            return WebApiResponse::error(400, $errors , trans('auth.account_not_found'));
        }
        else{
            if( $user && Auth::attempt(['phone' => $user->phone, 'password' => $request->password])){
                // Auth::loginUsingId($user->id);
                // Login and "remember" the given user...
                // Auth::loginUsingId(1, true);
                $userData = Auth::user();
                $userData->token = $this->get_user_token($userData,"userToken");
                $data  = $userData->toArray();
                $response = self::HTTP_OK;
                return WebApiResponse::success(200, $data, trans('auth.login_success'));
            }
            else{
                $errors = [
                    ['field' => '',
                        'value' => '',
                        'message' => [
                            trans('auth.login_fail')
                        ]]
                ];
                return WebApiResponse::error(400, $errors , trans('auth.login_fail'));
            }
        }
    }

    public function get_http_response(string $status = null, $data = null, $response)
    {

        return response()->json([

            'status' => $status,
            'data' => $data,

        ], $response);
    }

    public function get_user_token($user, string $token_name = null)
    {

        return $user->createToken($token_name)->accessToken;
    }

    /**
     * Logout user (Revoke the token)
     * @group  Authentication
     * @authenticated
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @response 200  {"status":"success","message":"Logout Success","code":200,"data":[[]]}
     */
    public function logout(Request $request)
    {

        $request->user()->token()->revoke();
        return WebApiResponse::success(200, [], trans('auth.logout_success'));
    }

    /**
     * Get Loggedin User Info
     * @group  Authentication
     * @header Content-Type application/json
     * @authenticated
     * @param Request $request
     * @response 200  {"status":"success","message":"User Information","code":200,"data":{"id":1,"name":"admin","email":"admin@gmail.com","email_verified_at":null,"created_at":"2023-06-20T07:00:09.000000Z","updated_at":"2023-06-20T07:00:09.000000Z","status":1}}
     */
    public function user(Request $request)
    {

        $userData = User::with(['country:id,country_name', 'district:id,district_name', 'role:id,name'])->find(Auth::id());
        $data  = $userData->toArray();

        return WebApiResponse::success(200, $data, 'User Information');
    }

}
