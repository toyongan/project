<x-guest-layout>
    <style>
        /* Brand */
        .brand-wrap {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: #7c5c4a;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 1.375rem;
            font-weight: 800;
            color: #3d3530;
            letter-spacing: -0.02em;
        }

        .brand-name span {
            color: #7c5c4a;
        }

        .brand-tagline {
            font-size: 0.75rem;
            color: #a09890;
            margin-top: 6px;
            letter-spacing: 0.03em;
        }

        /* Card */
        .ml-card {
            background: #faf8f5;
            border: 1px solid #e2ddd7;
            border-radius: 14px;
            overflow: hidden;
        }

        .ml-card-header {
            padding: 14px 22px;
            border-bottom: 1px solid #e8e3dd;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f5f2ee;
        }

        .card-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #ede8e0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 15px;
        }

        .section-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #3d3530;
        }

        .ml-card-body {
            padding: 22px 22px 24px;
        }

        /* Status */
        .status-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.8rem;
            color: #15803d;
            margin-bottom: 18px;
        }

        /* Form */
        .field-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: #a09890;
            margin-bottom: 6px;
        }

        .ml-input {
            display: block;
            width: 100%;
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 0.875rem;
            color: #3d3530;
            transition: border-color 0.15s, box-shadow 0.15s;
            box-sizing: border-box;
            font-family: inherit;
        }

        .ml-input:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160, 112, 96, 0.15);
        }

        .ml-input::placeholder {
            color: #c4bdb7;
        }

        .field-error {
            font-size: 0.72rem;
            color: #b91c1c;
            margin-top: 4px;
        }

        /* Checkbox */
        .remember-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
        }

        .ml-checkbox {
            width: 15px;
            height: 15px;
            border-radius: 4px;
            border: 1px solid #ddd8d2;
            accent-color: #7c5c4a;
            cursor: pointer;
        }

        .remember-label {
            font-size: 0.8rem;
            color: #a09890;
            cursor: pointer;
        }

        /* Footer row */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .forgot-link {
            font-size: 0.78rem;
            color: #a09890;
            text-decoration: none;
            transition: color 0.12s;
        }

        .forgot-link:hover {
            color: #5a5048;
            text-decoration: underline;
        }

        /* Button */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 22px;
            background: #7c5c4a;
            color: #fff;
            font-size: 0.82rem;
            font-weight: 700;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.02em;
            font-family: inherit;
        }

        .btn-primary:hover {
            background: #6a4d3e;
        }
    </style>

    {{-- Brand --}}
    <div class="brand-wrap">
        <div class="brand-logo">
            <div class="brand-icon">🔗</div>
            <span class="brand-name">Hiring<span>Link</span></span>
        </div>
        <p class="brand-tagline">Connect talent with opportunity</p>
    </div>

    {{-- Login Card --}}
    <div class="ml-card">
        <div class="ml-card-header">
            <div class="card-icon">🔑</div>
            <span class="section-title">Sign in to your account</span>
        </div>
        <div class="ml-card-body">

            {{-- Session Status --}}
            @if(session('status'))
            <div class="status-box">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="field-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="ml-input"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="username"
                        placeholder="you@example.com" />
                    @error('email')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="field-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="ml-input"
                        required autocomplete="current-password"
                        placeholder="••••••••" />
                    @error('password')
                    <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="remember-wrap">
                    <input id="remember_me" name="remember" type="checkbox" class="ml-checkbox" />
                    <label for="remember_me" class="remember-label">Remember me</label>
                </div>

                {{-- Footer --}}
                <div class="form-footer">
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Forgot your password?
                        </a>
                        @endif
                        @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="forgot-link">
                            Don't have an account? Register
                        </a>
                        @endif
                    </div>
                    <button type="submit" class="btn-primary">Log in →</button>
                </div>

            </form>
        </div>
    </div>

</x-guest-layout>