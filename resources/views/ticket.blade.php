@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Support Ticket</h3>
                        <div class="card-body">
                            @if (isset($resDta))
                                @if ($resDta)
                                    <div class="alert alert-success" role="alert">
                                        Ticket Submitted Successfully
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        Oops!! Some problem, Try again later
                                    </div>
                                @endif
                            @endif
                                <form action="{{ route('create-ticket') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Full Name" id="name" class="form-control" name="customer_name">
                                        @if ($errors->has('customer_name'))
                                            <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Email Address" id="email" class="form-control" name="customer_email">
                                        @if ($errors->has('customer_email'))
                                            <span class="text-danger">{{ $errors->first('customer_email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Phone Number" id="phone" class="form-control" name="customer_phone">
                                        @if ($errors->has('customer_phone'))
                                            <span class="text-danger">{{ $errors->first('customer_phone') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        <textarea placeholder="Your Problem Description" id="problem" class="form-control" name="customer_problem"></textarea>
                                        @if ($errors->has('customer_problem'))
                                            <span class="text-danger">{{ $errors->first('customer_problem') }}</span>
                                        @endif
                                    </div>

                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
