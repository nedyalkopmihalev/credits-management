<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clients extends Model
{
    /**
     * @var string
     */
    protected $clientsTable = 'clients';

    /**
     * @param array $data
     * @return mixed
     */
    public function insertClient(array $data)
    {
        return DB::table($this->clientsTable)
            ->insertGetId($data);
    }
}