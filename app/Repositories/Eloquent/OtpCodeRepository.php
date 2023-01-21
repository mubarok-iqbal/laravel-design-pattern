<?php 

namespace App\Repositories\Eloquent;

use App\OtpCode;
use App\Repositories\OtpCodeRepositoryInterface;


class OtpCodeRepository implements OtpCodeRepositoryInterface{

  private $model;

  public function __construct(OtpCode $model){
    $this->model = $model;
  }

  public function updateOrCreate(array $attributes){
    return $this->model->updateOrCreate(
      [ 'user_id' => $attributes['user_id'] ],
      [ 'otp' => $attributes['otp'] ]
    );
  }

  public function findByOtp(int $otp){
    return $this->model->where('otp' , $otp)->first();
  }
  
}