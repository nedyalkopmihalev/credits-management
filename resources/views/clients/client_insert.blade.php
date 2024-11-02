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
                    <li>Клиент</li>
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

                @if ($errors->has('full_name'))
                    <div class="col-sm-9">
                        @foreach ($errors->get('full_name') as $fullNameMessage)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ $fullNameMessage }}
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
                                <small>Клиент</small>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form name="form" method="post" action="client-insert" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="input_full_name">Име на клиент *</label>
                                    <input type="text" class="form-control" id="input_full_name" aria-describedby="inputFullName" placeholder="Въведете име на клиент" name="full_name" value="">
                                    <small id="inputFullNameNHelp" class="text-muted">Задължително поле</small>
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