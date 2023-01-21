<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OtpCodeService;

class SendOtpCodeController extends Controller
{
    private $otpCodeService;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(OtpCodeService $otpCodeService){
      $this->otpCodeService = $otpCodeService;
    }

    public function __invoke(Request $request)
    {
        $response = $this->otpCodeService->sendOtpCode(
                                              $request->user_id,
                                              $request->email
                                            );
        
        return response()->json($response);
    }
}
