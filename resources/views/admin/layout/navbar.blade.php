<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">meta</a>
{{--    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('admin.user.index')}}">{{auth()->user()->name}}</a>--}}
    <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name??null}}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a href="http://localhost">Logout</a>
                <form id="logout-form" action="logout" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
