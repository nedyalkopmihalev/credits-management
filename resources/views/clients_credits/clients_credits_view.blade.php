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
                <div class="col-sm-9">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <small>Кредити - списък</small>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Клиент</th>
                                        <th>Кредит</th>
                                        <th>Сума</th>
                                        <th>Период</th>
                                        <th>Месечна вноска</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php  $count = 1; @endphp

                                    @if (count($clientsCredits) > 0)
                                        @foreach ($clientsCredits as $clientsCreditsItem)
                                            <tr>
                                                <td scope="row">@php echo $count @endphp</td>
                                                <td>{{ $clientsCreditsItem->full_name }}</td>
                                                <td>Credit-{{ $clientsCreditsItem->form_number }}</td>
                                                <td>{{ $clientsCreditsItem->amount }}</td>
                                                <td>{{ $clientsCreditsItem->period }}</td>
                                                <td></td>
                                            </tr>
                                            @php $count++; @endphp
                                        @endforeach
                                    @endif
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.row -->
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->
@endsection