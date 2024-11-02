<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\ClientsCredits;

class ClientsCreditsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function clientCreditInsert(Request $request)
    {
        $successMessage = '';
        $customErrors = [];
        $formNumber = 1;
        $clientsModel = new Clients();
        $clientsCreditsModel = new ClientsCredits();
        $clients = $clientsModel->getClients();
        $maxFormNumber = $clientsCreditsModel->getMaxFormNumber();

        if (!empty($maxFormNumber)) {
            $formNumber = $maxFormNumber->form_number + 1;
        }

        //request data
        if ($request->isMethod('post')) {
            $request->validate([
                'client_id' => 'required',
                'amount' => 'required',
                'period' => 'required',
            ], [
                'client_id.required' => 'Изберете клиент.',
                'amount.required' => 'Въведете сума.',
                'period.required' => 'Въведете период.',
            ]);

            $period = trim($request->period);

            if ($period < 3 || $period > 120) {
                $customErrors['invalid_period'] = 'Въведете валиден период.';
            }

            $data = [
                'client_id' => (int) $request->client_id,
                'amount' => trim($request->amount),
                'period' => trim($request->period)
            ];

            if (empty($customErrors)) {
                try {
                    $clientsCreditsModel->insertClientCredit($data);
                    $successMessage = 'Информацията е добавена успешно.';
                } catch (\Exception $e) {
                    $customErrors['exceptionMessage'] = $e->getMessage();
                }
            }
        }

        return view('clients_credits.client_credit_insert', [
            'clients' => $clients,
            'form_number' => $formNumber,
            'successMessage' => $successMessage,
            'customErrors' => $customErrors
        ]);
    }
}