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

                @if ($errors->has('client_id'))
                    <div class="col-sm-9">
                        @foreach ($errors->get('client_id') as $fullNameMessage)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ $fullNameMessage }}
                            </div>
                        @endforeach
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

                @if ($errors->has('period'))
                    <div class="col-sm-9">
                        @foreach ($errors->get('period') as $periodMessage)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ $periodMessage }}
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
                                <small>Кредит - добавяне</small>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post" action="client-credit-insert">
                                @csrf
                                <p>Кредит No: Credit-{{ $form_number }}</p>
                                <div class="form-group">
                                    <label for="inputClient">Клиент *</label>
                                    <select class="form-control" id="inputClient" name="client_id">
                                        @foreach ($clients as $clientItem)
                                            <option value="{{ $clientItem->id }}" >{{ $clientItem->full_name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="mainClientHelp" class="text-muted">Задължително поле</small>
                                </div>
                                <div class="form-group">
                                    <label for="input_amount">Сума в лв. *</label>
                                    <input type="text" class="form-control" id="input_amount" aria-describedby="inputAmount" placeholder="Въведете сума" name="amount" value="">
                                    <small id="inputAmountHelp" class="text-muted">Задължително поле</small>
                                </div>

                                <div class="form-group">
                                    <label for="input_period">Период от 3 до 120 месеца *</label>
                                    <input type="text" class="form-control" id="input_period" aria-describedby="inputPeriod" placeholder="Въведете период" name="period" value="">
                                    <small id="inputPeriodHelp" class="text-muted">Задължително поле</small>
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