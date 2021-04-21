<div class="container pt-4">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">
            <img src="/images/logo.png" alt="logo" style="width: 50px; height: 60px;">
            <img src="/images/home/logo.svg" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav justify-content-between">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/institution">Institutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/documents">Bureaucratic Process</a>
                </li>
                @if(empty(\Illuminate\Support\Facades\Session::get('user')))
                <li class="nav-item">
                    <a class="btn button-accent-secondary mr-0" href="/login">Log In</a>
                </li>
                @else
                    <li class="nav-item">
{{--                        <a class="nav-link text-bold" href="/logout">{{json_decode(session()->get('user'))->name}}</a>--}}
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{session()->get('user')->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/user/settings">Settings</a>
                                @if(session()->get('user')->is_admin)
                                    <a class="dropdown-item" href="/admin/dashboard">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
