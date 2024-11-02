<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function clientInsert(Request $request)
    {
        $successMessage = '';
        $customErrors = [];
        $clientsModel = new Clients();

        //request data
        if ($request->isMethod('post')) {
            $request->validate([
                'full_name' => 'required|min:2',
            ], [
                'full_name.required' => 'Въведете име на клиент.',
                'full_name.min' => 'Въведете валидно име на клиент.',
            ]);

            $data['full_name'] = trim($request->full_name);

            try {
                $clientsModel->insertClient($data);
                $successMessage = 'Информацията е добавена успешно.';
            } catch (\Exception $e) {
                $customErrors['exceptionMessage'] = $e->getMessage();
            }
        }

        return view('clients.client_insert', [
            'successMessage' => $successMessage,
            'customErrors' => $customErrors
        ]);
    }
}
