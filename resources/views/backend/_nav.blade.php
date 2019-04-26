<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link{{ $page === '' ? ' active' : '' }}" href="{{ route('backend.home') }}">Dashboard</a></li>
    @can ('manage-users')
        <li class="nav-item"><a class="nav-link{{ $page === 'users' ? ' active' : '' }}" href="{{ route('backend.users.index') }}">Users</a></li>
    @endcan
</ul>