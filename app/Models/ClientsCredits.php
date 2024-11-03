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
     * @var string
     */
    protected $clientsTable = 'clients';

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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllClientsCredits()
    {
        return DB::table($this->clientsCreditsTable)
            ->join($this->clientsTable, $this->clientsCreditsTable . '.client_id', '=', $this->clientsTable . '.id')
            ->select($this->clientsCreditsTable . '.id', $this->clientsCreditsTable . '.form_number', $this->clientsCreditsTable . '.amount', $this->clientsCreditsTable . '.period', $this->clientsCreditsTable . '.monthly_interest', $this->clientsTable . '.full_name')
            ->orderBy($this->clientsCreditsTable . '.id')
            ->get();
    }

    /**
     * @param int $id
     * @return Model|null|object|static
     */
    public function getCreditAmountLoan(int $id)
    {
        return DB::table($this->clientsCreditsTable)
            ->select('credit_amount_loan')
            ->where('id', $id)
            ->first();
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function updateCreditAmountLoan(int $id, array $data)
    {
        DB::table($this->clientsCreditsTable)
            ->where('id', $id)
            ->update($data);
    }
}
