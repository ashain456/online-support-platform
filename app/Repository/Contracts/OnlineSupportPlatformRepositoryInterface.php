<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;


interface OnlineSupportPlatformRepositoryInterface
{

    /**
     * @return mixed
     */
    public function createTicket($reqData);

    public function listComplains($keyword);

    public function complainInfoById($id);

    public function complainAddComment($data, $id);

}
