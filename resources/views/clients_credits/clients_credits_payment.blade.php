@extends('layouts.layout')
@section('content')
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
            </div>
            <div class="header-title">
                <ol class="breadcrumb">
                    <li>Кредит</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @if (!empty($successMessage))
                    <div class="col-sm-9">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ $successMessage }}
                        </div>
                    </div>
                @endif

                @if ($errors->has('amount'))
                    <div class="col-sm-9">
                        @foreach ($errors->get('amount') as $amountMessage)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ $amountMessage }}
                            </div>
                        @endforeach
                    </div>
                @endif

                @if (!empty($customErrors))
                    <div class="col-sm-9">
                        @foreach ($customErrors as $customMessage)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ $customMessage }}
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="col-sm-9">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <small>Кредит - плащане</small>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post" action="clients-credits-payment">
                                @csrf
                                <div class="form-group">
                                    <label for="inputCredit">Кредит *</label>
                                    <select class="form-control" id="inputCredit" name="credit_id">
                                        @foreach ($clientsCredits as $clientsCreditsItem)
                                            <option value="{{ $clientsCreditsItem->id }}" >Credit-{{ $clientsCreditsItem->form_number }} {{ $clientsCreditsItem->full_name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="mainCreditHelp" class="text-muted">Задължително поле</small>
                                </div>
                                <div class="form-group">
                                    <label for="input_amount">Сума в лв. *</label>
                                    <input type="text" class="form-control" id="input_amount" aria-describedby="inputAmount" placeholder="Въведете сума" name="amount" value="">
                                    <small id="inputAmountHelp" class="text-muted">Задължително поле</small>
                                </div>

                                <div class="margin_bottom_css"></div>
                                <input type="submit" name="save" value="запис" class="btn btn-primary w-md m-b-5" />
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->
@endsection