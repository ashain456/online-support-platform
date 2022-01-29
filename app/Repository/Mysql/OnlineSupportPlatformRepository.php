<?php

namespace App\Repository\Mysql;

use App\Models\Tickets;
use App\Repository\Contracts\OnlineSupportPlatformRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OnlineSupportPlatformRepository implements OnlineSupportPlatformRepositoryInterface
{


    /**
     * @param $reqData
     * @return bool|mixed
     * @throws \Exception
     */
    public function createTicket($reqData)
    {
        try{

            $tickets = new Tickets();

            $tickets->customer_name = $reqData['customer_name'];
            $tickets->customer_email = $reqData['customer_email'];
            $tickets->customer_phone = $reqData['customer_phone'];
            $tickets->customer_problem = $reqData['customer_problem'];
            $tickets->customer_key = $reqData['complain_key'];
            $tickets->created_at = Carbon::now()->format('Y-m-d H:i:s');

            return $tickets->save();

        }catch (\Exception $ex) {
            Log::error("Error in query: ", (array)$ex);
            throw $ex;
        }
    }

    /**
     * @param $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws \Exception
     */
    public function listComplains($keyword)
    {
        try{

            $query = DB::table(Tickets::TABLE)
                ->select('*');
                if(!empty($keyword)){
                   $query->where('customer_name', 'like', '%' . $keyword . '%');
                }
             return $query->paginate(20);

        }catch (\Exception $ex) {
            Log::error("Error in query: ", (array)$ex);
            throw $ex;
        }
    }

    /**
     * @param $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     * @throws \Exception
     */
    public function complainStatus($keyword)
    {
        try{

            $query = DB::table(Tickets::TABLE)
                ->select('*');
            if(!empty($keyword)){
                $query->where('customer_key', '=', trim($keyword));
            }
            return $query->get()->first();

        }catch (\Exception $ex) {
            Log::error("Error in query: ", (array)$ex);
            throw $ex;
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function complainInfoById($id)
    {
        try{

            return DB::table(Tickets::TABLE)
                ->select('*')
                ->where('id', '=', $id)
                ->get()->first();

        }catch (\Exception $ex) {
            Log::error("Error in query: ", (array)$ex);
            throw $ex;
        }
    }

    /**
     * @param $data
     * @param $id
     * @return int
     * @throws \Exception
     */
    public function complainAddComment($data, $id)
    {
        try{

            return DB::table(Tickets::TABLE)
            ->where("id", "=", $id)
            ->update([
                "agent_comment" => $data['agent_comment'],
                "status" => "OPEN"
            ]);

        }catch (\Exception $ex) {
            Log::error("Error in query: ", (array)$ex);
            throw $ex;
        }
    }
}
