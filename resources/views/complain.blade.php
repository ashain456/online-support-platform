@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                            <h3 class="card-header text-center">Customer Complain Tickets</h3>
                            <div class="card-body">
                                <form action="{{ route('customer-complains') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search By Customer Name" name="q">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <button class="btn btn-dark" onClick="location.href='{{ route('customer-complains') }}'" type="button">Cancel</button>
                                    </div>
                                </form>
                                <hr />
                                <div style="overflow-x:auto;">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="tbl-header">
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Key</th>
                                        <th>Ticket Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resDta as $dta)
                                            <tr>
                                                <td>{{ $dta->id }}</td>
                                                <td>{{ $dta->customer_name }}</td>
                                                <td>{{ $dta->customer_email }}</td>
                                                <td>{{ $dta->customer_phone }}</td>
                                                <td>{{ $dta->customer_key }}</td>
                                                <td align="center">
                                                    @if( $dta->status == "PENDING")
                                                    <span class="badge bg-warning">{{ $dta->status }}</span>
                                                    @else
                                                    <span class="badge bg-success">{{ $dta->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $dta->created_at }}</td>
                                                <td align="center">
                                                    <a href="/customer/{{ $dta->id }}/complain" ><button data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-content="View Complain" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
