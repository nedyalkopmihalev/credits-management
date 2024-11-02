<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClientsCredits extends Model
{
    /**
     * @var string
     */
    protected $clientsCreditsTable = 'clients_credits';

    /**
     * @param array $data
     * @return mixed
     */
    public function insertClientCredit(array $data)
    {
        return DB::table($this->clientsCreditsTable)
            ->insertGetId($data);
    }

    /**
     * @return Model|null|object|static
     */
    public function getMaxFormNumber()
    {
        return DB::table($this->clientsCreditsTable)
            ->select('id', 'form_number')
            ->orderByDesc('id')
            ->first();
    }

    /**
     * @param int $clientId
     * @return mixed
     */
    public function getTotalSumByClientId(int $clientId)
    {
        return DB::table($this->clientsCreditsTable)
            ->select('id')
            ->where('client_id', $clientId)
            ->sum('amount');
    }
}
