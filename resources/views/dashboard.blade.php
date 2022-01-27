<!DOCTYPE html>
<html>
<head>
    <title>Online Support Platform</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
</head>

<body>

<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="/">Online Support Platform</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-end navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">

                @if(!session()->exists('token-key'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket') }}">Create Support Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer-complains-status') }}">Complain Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover" data-bs-content="Agent Login" style="color: #b1f59a!important;" class="nav-link logout" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                    </li>
                @endif

                @if(session()->exists('token-key'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer-complains') }}">Customer Complains</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="hover" data-bs-content="Logout" style="color: #f59a9a!important;" class="nav-link logout" href="{{ route('agent-logout') }}"><i class="fa fa-sign-out"></i></a>
                    </li>
                @endif

            </ul>

        </div>
    </div>
</nav>

@if(Route::currentRouteName() == "dashboard")
    <div class="jumbotron">
        <div class="container">
            <div class="mt-4 p-5 bg-primary text-white rounded">
                <h1>Online Support Platform</h1>
                <p>Welcome to the Online Support Platform Admin Panel</p>
                <a href="{{ route('customer-complains') }}" class="btn btn-dark btn-lg">View Customer Complains</a>
            </div>
        </div>
    </div>
@endif

@yield('content')


<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>

</body>

</html>
