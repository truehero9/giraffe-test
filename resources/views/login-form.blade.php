<div class="dropdown-menu" style="display: inline-block; top: 0">
    <form class="px-4 py-3" method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="username" class="form-control form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="Username" placeholder="Username" value="{{ old('username') }}" required>

            @if ($errors->has('username'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">
                Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
</div>
