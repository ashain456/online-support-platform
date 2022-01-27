@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                            <h3 class="card-header text-center">Check Complain Feedback</h3>
                            <div class="card-body">

                                @if(empty($resDta) && $isSearch)

                                    <div class="alert alert-danger" role="alert">
                                        Result not found. Invalid key
                                    </div>

                                @endif

                                <form action="{{ route('customer-complains-status') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter your complain key" name="q">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <button class="btn btn-dark" onClick="location.href='{{ route('customer-complains-status') }}'" type="button">Cancel</button>
                                    </div>
                                </form>

                                <hr />

                                @if(isset($resDta) && !empty($resDta) && $isSearch)

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30%">Id</th>
                                            <td>{{ $resDta->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $resDta->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $resDta->customer_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $resDta->customer_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>complain</th>
                                            <td>{{ $resDta->customer_problem }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ticket Status</th>
                                            <td>
                                                @if( $resDta->status == "PENDING")
                                                    <span class="badge bg-warning">{{ $resDta->status }}</span>
                                                @else
                                                    <span class="badge bg-success">{{ $resDta->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $resDta->created_at }}</td>
                                        </tr>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
