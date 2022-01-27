<?php

/*
 *  Business logic handle here
 */

namespace App\Usecase;

use App\Repository\Contracts\LoginRepositoryInterface;


class LoginUsecase
{

    /**
     * @var LoginRepositoryInterface
     */
    private $loginRepository;

    /*
     *  Interface binding with repository
     */
    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    /*
     * check user login is valid
     */
    public function login($reqData)
    {
        $loginOk = false;

        $loginData = $this->loginRepository->login($reqData);

        if(!empty($loginData) && $loginData->password == md5($reqData['password'])){
            $loginOk = true;
        }

        return [
            "status" => $loginOk,
            "id" => isset($loginData->id)?$loginData->id:0,
        ];

    }

}
