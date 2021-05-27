<div class="container pt-4">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">
            <img src="/images/logo.png" alt="logo" style="width: 50px; height: 60px;">
            <img src="/images/home/logo.svg" alt="logo" class="navbar-brand-title">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav justify-content-between">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Acasă <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/institution">Instituții</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/documents">Proces birocratic</a>
                </li>
                @if(empty(\Illuminate\Support\Facades\Session::get('user')))
                <li class="nav-item">
                    <a class="btn button-accent-secondary mr-0" href="/login">Logare</a>
                </li>
                @else
                    <li class="nav-item only-large">
{{--                        <a class="nav-link text-bold" href="/logout">{{json_decode(session()->get('user'))->name}}</a>--}}
                        <div class="dropright  sm-hidden">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{session()->get('user')->name}}
                            </button>
                            <div class="dropdown-menu user-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/user/settings">Setări</a>
                                @if(session()->get('user')->is_admin)
                                    <a class="dropdown-item" href="/admin/dashboard">Setări administrator</a>
                                @endif
                                <a class="dropdown-item" href="/logout">Delogare</a>
                            </div>
                        </div>
                    </li>


                        <li class="nav-item hidden-lg">
                            <a class="nav-link" href="/user/settings">Setări</a>
                        </li>
                        <li class="nav-item hidden-lg">
                            <a class="nav-link" href="/admin/dashboard">Setări administrator</a>
                        </li>
                        <li class="nav-item hidden-lg">
                            <a class="nav-link" href="/logout">Delogare</a>
                        </li>

                @endif
            </ul>
        </div>
    </nav>
</div>
