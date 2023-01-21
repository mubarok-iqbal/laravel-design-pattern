<?php 

namespace App\Repositories;

interface OtpCodeRepositoryInterface{
  public function updateOrCreate(array $attributes);
  public function findByOtp(int $otp);

}