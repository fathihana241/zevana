<php?
    use Illuminate\Support\Facades\Gate;

public function boot(): void
{
    Gate::define('isAdmin', function ($user) {
        return $user->user_type === 'admin';
    });
}