<?php

/*
 *  Business logic handle here
 */

namespace App\Usecase;

use App\Repository\Contracts\LoginRepositoryInterface;
use App\Repository\Contracts\OnlineSupportPlatformRepositoryInterface;


class OnlineSupportPlatformUsecase
{

    /*
     * Interface binding with repository
     * @var OnlineSupportPlatformRepositoryInterface
     */
    private $OnlineSupportPlatformRepository;

    public function __construct(OnlineSupportPlatformRepositoryInterface $OnlineSupportPlatformRepository)
    {
        $this->OnlineSupportPlatformRepository = $OnlineSupportPlatformRepository;
    }


    /**
     * @param $reqData
     * @return mixed
     */
    public function createTicket($reqData)
    {
        return $this->OnlineSupportPlatformRepository->createTicket($reqData);
    }

    /**
     * @param $keyword
     * @return mixed
     */
    public function listComplains($keyword)
    {
        return $this->OnlineSupportPlatformRepository->listComplains($keyword);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function complainInfoById($id)
    {
        return $this->OnlineSupportPlatformRepository->complainInfoById($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function complainAddComment($data, $id)
    {
        return $this->OnlineSupportPlatformRepository->complainAddComment($data, $id);
    }

}
