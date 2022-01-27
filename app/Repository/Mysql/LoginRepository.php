<?php

namespace App\Repository\Mysql;

use App\Models\Users;
use App\Repository\Contracts\LoginRepositoryInterface;
use Illuminate\Support\Facades\DB;


class LoginRepository implements LoginRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function login($reqData)
    {
        $username = $reqData['username'];

        return DB::table(Users::TABLE)
            ->select('*')
            ->where('email', '=', $username)
            ->get()->first();
    }

}
