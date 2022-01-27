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


    public function createTicket($reqData)
    {
        return $this->OnlineSupportPlatformRepository->createTicket($reqData);
    }

    public function listComplains($keyword)
    {
        return $this->OnlineSupportPlatformRepository->listComplains($keyword);
    }

    public function complainInfoById($id)
    {
        return $this->OnlineSupportPlatformRepository->complainInfoById($id);
    }

    public function complainAddComment($data, $id)
    {
        return $this->OnlineSupportPlatformRepository->complainAddComment($data, $id);
    }

}
