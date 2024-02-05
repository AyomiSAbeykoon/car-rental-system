@extends('layouts.backend.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="container-fluid p-0">

        <h1 class="mb-3 fw-900">Dashboard</h1>

        <div class=row>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- partial -->
                        <div class="main-panel p-0">
                            <div class="content-wrapper">
                                <div class="row">

                                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card" >
                                        <div class="card bg-success" style="height:120px">
                                            <div class="card-body d-flex justify-content-center" style="    flex-direction: column;align-items: center;">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center align-self-start">
                                                            <h1 class="mb-0 text-center text-dark">{{$customers}}</h1>
                                                        </div>
                                                    </div>

                                                </div>
                                                <h4 class=" font-weight-normal text-white">All Customers</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card" >
                                        <div class="card bg-danger" style="height:120px">
                                            <div class="card-body d-flex justify-content-center" style="    flex-direction: column;align-items: center;">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center align-self-start">
                                                            <h1 class="mb-0 text-center text-dark">{{$today_customer}}
                                                            </h1>
                                                        </div>
                                                    </div>

                                                </div>
                                                <h4 class="font-weight-normal text-white">New Customers</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card" >
                                        <div class="card bg-primary" style="height:120px">
                                            <div class="card-body d-flex justify-content-center" style="    flex-direction: column;align-items: center;">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center align-self-start">
                                                            <h1 class="mb-0 text-center text-dark">{{$month_customer}}
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="font-weight-normal text-white">This Month Customers</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
