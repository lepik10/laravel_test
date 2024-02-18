<div class="container border-bottom">
    <header class="d-flex py-3">
        <div class="col-md-6">
            <nav class="navbar justify-content-start">
                <a class="nav-link px-3" href="{{ route('cabinet.balance') }}">Баланс</a>
                <a class="nav-link px-3" href="{{ route('cabinet.operations') }}">История операций</a>
            </nav>
        </div>
        <div class="col-md-6 text-end">
            <span class="px-4">{{ Auth::user()->email }}</span>
            <form method="POST" action="{{ route('auth.logout') }}" class="ib">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">Выход</button>
            </form>
        </div>
    </header>
</div>
