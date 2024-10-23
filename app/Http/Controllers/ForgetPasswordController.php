<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\OtpRequest;
use App\Libraries\WebApiResponse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{

    /**
     * Forgot Password
     * @group  Authentication
     * @param Request $request
     * @bodyParam  email string required The name of email of number.
     * @return \Illuminate\Http\Response
     */

    public function checkData(ForgetPasswordRequest $request)
    {
        $email = $request->get('email');

        $otp = randomOtpDigit('6');
        $bodyData = "MOCAT User Password Reset OTP is : $otp";

        if(is_numeric($email)){
            $user = User::where('phone', $request->email)->first();
            if($user){
                if(sendSms($user->phone, $bodyData, $otp) == 'success'){
                    DB::table('password_resets')->insert(
                        [
                            'email' => $user->phone,
                            'token' => $otp,
                            'created_at' => now()
                        ]
                    );
                }else{
                    DB::table('password_resets')->insert(
                        [
                            'email' => $user->phone,
                            'token' => $otp,
                            'created_at' => now()
                        ]
                    );
//                    return 'number_invalid';
                }
                $emailData['userName'] = $user->first_name;
                $emailData['userEmail'] = $user->email;
                $emailData['userOtp'] = $otp;
                sendEmail($emailData['userName'], $emailData['userEmail'], 'email.sendEmailForgotPasswordContent', 'Forgot Password', $emailData);

                return WebApiResponse::success(200, ['otp' => $bodyData, 'info' => $user->phone, 'info_type' => 'mobile'], trans('messages.success_show'));
            }else{
                $errors = [
                    ['field' => '',
                        'value' => '',
                        'message' => [
                            trans('auth.user_does_not_exists')
                        ]]
                ];
                return WebApiResponse::error(400, $errors, trans('auth.user_does_not_exists'));
            }

        }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
            if($user){
                if(sendSms($user->phone, $bodyData, $otp) == 'success'){
                    DB::table('password_resets')->insert(
                        [
                            'email' => $user->email,
                            'token' => $otp,
                            'created_at' => now()
                        ]
                    );
                }else{
                    DB::table('password_resets')->insert(
                        [
                            'email' => $user->email,
                            'token' => $otp,
                            'created_at' => now()
                        ]
                    );
//                    return 'number_invalid';
                }
                $emailData['userName'] = $user->first_name;
                $emailData['userEmail'] = $user->email;
                $emailData['userOtp'] = $otp;
                sendEmail($emailData['userName'], $emailData['userEmail'], 'email.sendEmailForgotPasswordContent', 'Forgot Password', $emailData);

                return WebApiResponse::success(200, ['otp' => $bodyData, 'info' => $user->email, 'info_type' => 'mail'], trans('messages.success_show'));
            }else{
                $errors = [
                    ['field' => '',
                        'value' => '',
                        'message' => [
                            trans('auth.user_does_not_exists')
                        ]]
                ];
                return WebApiResponse::error(400, $errors, trans('auth.user_does_not_exists'));
            }
        }else{
            $errors = [
                ['field' => '',
                    'value' => '',
                    'message' => [
                        trans('auth.user_does_not_exists')
                    ]]
            ];
            return WebApiResponse::error(400, $errors, trans('auth.user_does_not_exists'));
        }
    }

    /**
     * OTP CrossMatch
     * @group  Authentication
     * @param Request $request
     * @bodyParam  request_otp_code integer required The Request OTP Code Min 6.
     * @bodyParam  info string required The Previous Request Sending Info.
     * @bodyParam  info_type string required The Previous Request Sending Info Type.
     * @return \Illuminate\Http\Response
     */
    public function otpCrossMatch(OtpRequest $request)
    {
        try{
            if($request->info == '' || $request->info_type == ''){
                return WebApiResponse::error(404, $errors = ['' => 'Information Not Send'], trans('messages.some_thing_went_wrong'));
            }else{
                if($request->info_type != '' && $request->info_type != ''){
                    if($this->loginOtpCodeCheck($request) == 'success'){
                        return WebApiResponse::success(200, ['info' => $request->info], trans('messages.success_show_all'));
                    }else{
                        return WebApiResponse::error(404, $errors = ['request_otp_code' => $this->loginOtpCodeCheck($request)], trans('messages.some_thing_went_wrong'));
                    }
                }else{
                    $this->loginOtpCodeCheck($request);
                }
            }
            return WebApiResponse::success(200, $data, trans('messages.success_show_all'));
        }catch (\Exception $e){
            return WebApiResponse::error(404, $errors = [$e], trans('messages.some_thing_went_wrong'));
        }

    }

    /**
     * New Password
     * @group  Authentication
     * @param Request $request
     * @bodyParam  info string required The Previous Request Sending Info.
     * @bodyParam  password string required The name of password <b>(min:8,max:10).</b> Example: 12345678
     * @return \Illuminate\Http\Response
     */
    public function reTypePassword(Request $request)
    {
        try{
            if(is_numeric($request->get('info'))){
                $user = User::where('phone', $request->get('info'))->first();
            }elseif (filter_var($request->get('info'), FILTER_VALIDATE_EMAIL)) {
                $user = User::where('email', $request->get('info'))->first();
            }else{
                $errors = [
                    ['field' => '',
                        'value' => '',
                        'message' => [
                            trans('auth.user_does_not_exists')
                        ]]
                ];
                return WebApiResponse::error(404, $errors, trans('messages.some_thing_went_wrong'));
            }
            $user->update(
                ['password' => Hash::make($request->get('password'))]
            );
            return WebApiResponse::success(200, [], trans('messages.success_show_all'));
        }catch (\Exception $e){
            return WebApiResponse::error(404, $errors = [$e], trans('messages.some_thing_went_wrong'));
        }
    }

    private function loginOtpCodeCheck($payload){
        try{
            $currentTime = Carbon::now();
            $userData = DB::table('password_resets')->where('email', $payload->info)->latest()->first();
            if(Carbon::parse($userData->created_at)->addMinutes(90)->gt($currentTime)){
                if((int)$userData->token == $payload->request_otp_code){
                    DB::table('password_resets')->where('email', $payload->info)->delete();
                    return 'success';
                }else{
                    return 'otp_not_matched';
                }
            }else{
                return 'time_expired_please_resend_otp';
            }
        }catch(\Exception $e){
            return WebApiResponse::error(404, $errors = [$e], trans('messages.data_not_found'));
        }
    }
}
