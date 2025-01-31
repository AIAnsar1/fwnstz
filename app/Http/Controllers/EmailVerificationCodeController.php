<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Services\EmailVerificationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreRequest\StoreEmailVerificationCodeRequest;
use App\Http\Requests\UpdateRequest\UpdateEmailVerificationCodeRequest;

/**
 * Class EmailVerificationCodeControllerController
 * @package  App\Http\Controllers
 */
class EmailVerificationCodeController extends Controller
{
    private EmailVerificationService $service;

    public function __construct(EmailVerificationService $service)
    {
        $this->service = $service;
    }

    public function sendEmailVerification(StoreEmailVerificationCodeRequest $request): array|Builder|Collection|EmailVerification
    {
        return $this->service->createModel($request->validated());
    }

    public function checkEmailVerification(UpdateEmailVerificationCodeRequest $request)
    {
        return $this->service->checkVerificationCode($request->validated());

    }
}
