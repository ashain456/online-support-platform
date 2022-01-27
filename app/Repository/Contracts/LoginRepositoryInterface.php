<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;


interface LoginRepositoryInterface
{

    /**
     * @return mixed
     */
    public function login($reqData);

}
