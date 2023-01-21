<?php 

namespace App\Services;

use App\Mail\OtpCreated;
use Illuminate\Support\Facades\Mail;
use App\Repositories\OtpCodeRepositoryInterface;

class OtpCodeService{

  private $otpCodeRepository;

  public function __construct(OtpCodeRepositoryInterface $otpCodeRepository){
    $this->otpCodeRepository = $otpCodeRepository;
  }

  public function sendOtpCode($user_id , $email){
    //generate otp
    $otp = $this->generateOtpCode();

    //insert or update ke database
    $otpCode = $this->otpCodeRepository->updateOrCreate([
      'user_id' => $user_id,
      'otp' => $otp
    ]);

    //kirim otp ke email
    if($otpCode){
      Mail::to($email)->send(new OtpCreated($otp));

      return $otp;
    }else{
      return 'gagal';
    }
  }  

  private function generateOtpCode(){

    do {
      $otp = mt_rand(10000 , 99999);
      $check = $this->otpCodeRepository->findByOtp($otp);
    } while ($check);

    return $otp;
  }

}