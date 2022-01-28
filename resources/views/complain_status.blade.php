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
                                <div style="overflow-x:auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30%">Your Id</th>
                                            <td>{{ $resDta->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Your Name</th>
                                            <td>{{ $resDta->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Your Email</th>
                                            <td>{{ $resDta->customer_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Your Phone</th>
                                            <td>{{ $resDta->customer_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Your Ticket Status</th>
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
                                        <tr style="background: #fdf596;">
                                            <th valign="top">Your Complain</th>
                                            <td>{{ $resDta->customer_problem }}</td>
                                        </tr>
                                        <tr style="background: #bdfaa6;">
                                            <th valign="top">Agent Feedback</th>
                                            <td>{{ $resDta->agent_comment }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
