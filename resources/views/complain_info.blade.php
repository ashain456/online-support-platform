@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                            <h3 class="card-header text-center">Customer Complain Information</h3>
                            <div class="card-body">

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
                                            <td>{{ $resDta->status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $resDta->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">

                                                <form action="{{ route('customer-comment', $resDta->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <textarea placeholder="Add comment here...." id="problem" class="form-control" name="agent_comment"></textarea>
                                                        @if ($errors->has('agent_comment'))
                                                            <span class="text-danger">{{ $errors->first('agent_comment') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="d-grid mx-auto">
                                                        <div class="btn-group special" role="group" aria-label="...">
                                                            <a href="/complain" class="btn btn-dark m-2 btn-block">Back</a>
                                                            <button type="submit" class="btn btn-success m-2 btn-block">Add Comment</button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
