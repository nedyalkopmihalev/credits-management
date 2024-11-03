<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\ClientsCredits;
use App\Helpers\ClientsCreditsHelper;

class ClientsCreditsController extends Controller
{
    const YEAR_MONTHS = 12;
    const ANNUAL_INTEREST_RATE = 7.9;
    const MAX_CREDIT  = 80000;

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

            $totalAmount = $clientsCreditsModel->getTotalSumByClientId((int) $request->client_id);

            if (!empty($totalAmount)) {
                $totalAmountFormatted = sprintf('%0.2f', $totalAmount);

                if (($totalAmountFormatted + trim($request->amount)) > self::MAX_CREDIT) {
                    $customErrors['invalid_amount'] = 'Сумата по кредитите не трябва да е повече от 80000 лв.';
                }
            }

            $clientCreditMonthlyInterest = ClientsCreditsHelper::clientCreditMonthlyLoan(trim($request->amount), trim($request->period), self::ANNUAL_INTEREST_RATE);

            $data = [
                'client_id' => (int) $request->client_id,
                'amount' => trim($request->amount),
                'period' => trim($request->period),
                'form_number' => $formNumber,
                'monthly_interest' => $clientCreditMonthlyInterest
            ];

            if (empty($customErrors)) {
                try {
                    $clientsCreditsModel->insertClientCredit($data);
                    $successMessage = 'Информацията е добавена успешно.';
                } catch (\Exception $e) {
                    $customErrors['exceptionMessage'] = $e->getMessage();
                }
            }

            $maxFormNumber = $clientsCreditsModel->getMaxFormNumber();

            if (!empty($maxFormNumber)) {
                $formNumber = $maxFormNumber->form_number + 1;
            }
        }

        return view('clients_credits.client_credit_insert', [
            'clients' => $clients,
            'form_number' => $formNumber,
            'successMessage' => $successMessage,
            'customErrors' => $customErrors
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAllClientsCredits()
    {
        $clientsCreditsModel = new ClientsCredits();
        $getAllClientsCredits = $clientsCreditsModel->getAllClientsCredits();

        return view('clients_credits.clients_credits_view', [
            'clientsCredits' => $getAllClientsCredits
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function clientsCreditsPayment(Request $request)
    {
        $successMessage = '';
        $customErrors = [];
        $clientsCreditsModel = new ClientsCredits();
        $getAllClientsCredits = $clientsCreditsModel->getAllClientsCredits();

        //request data
        if ($request->isMethod('post')) {
            $request->validate([
                'credit_id' => 'required',
                'amount' => 'required',
            ], [
                'credit_id.required' => 'Изберете клиент.',
                'amount.required' => 'Въведете сума.',
            ]);

            $data = [
                'id' => (int) $request->credit_id,
                'amount' => trim($request->amount),
            ];

            if (empty($customErrors)) {
                try {

                    $successMessage = 'Плащането е извършено успешно.';
                } catch (\Exception $e) {
                    $customErrors['exceptionMessage'] = $e->getMessage();
                }
            }
        }

        return view('clients_credits.clients_credits_payment', [
            'clientsCredits' => $getAllClientsCredits,
            'successMessage' => $successMessage,
            'customErrors' => $customErrors
        ]);
    }
}
