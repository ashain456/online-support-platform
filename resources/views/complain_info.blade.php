@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                            <h3 class="card-header text-center">Customer Complain Information</h3>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
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
                                            <th>Key</th>
                                            <td>{{ $resDta->customer_key }}</td>
                                        </tr>
                                        <tr>
                                            <th valign="top">Complain</th>
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
                                        <tr>
                                            <th colspan="2">

                                                <form action="{{ route('customer-comment', $resDta->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <input style="visibility: hidden;" type="text" value="{{ $resDta->customer_name }}" id="customer_name" name="customer_name">
                                                        <input style="visibility: hidden;" type="text" value="{{ $resDta->customer_email }}" id="customer_email" name="customer_email">
                                                        <input style="visibility: hidden;" type="text" value="{{ $resDta->customer_key }}" id="customer_key" name="customer_key">

                                                        <textarea placeholder="Add comment here...." id="problem" class="form-control" name="agent_comment"></textarea>
                                                        <div class="notes">Max 400 charters long</div>
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
            </div>
        </main>
    @endsection
