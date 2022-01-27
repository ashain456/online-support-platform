<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Model;


interface OnlineSupportPlatformRepositoryInterface
{

    /**
     * @param $reqData
     * @return mixed
     */
    public function createTicket($reqData);

    /**
     * @param $keyword
     * @return mixed
     */
    public function listComplains($keyword);

    /**
     * @param $keyword
     * @return mixed
     */
    public function complainStatus($keyword);

    /**
     * @param $id
     * @return mixed
     */
    public function complainInfoById($id);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function complainAddComment($data, $id);

}
