<form method="POST" action="{{ route('set-database', ['db' => 'pgsql']) }}">
    @csrf
    <button type="submit">Use PostgreSQL</button>
</form>

<form method="POST" action="{{ route('set-database', ['db' => 'mysql']) }}">
    @csrf
    <button type="submit">Use MySQL</button>
</form>
