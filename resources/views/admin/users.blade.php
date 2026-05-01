<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <style>
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
            padding: 20px 22px;
        }

        /* Alerts */
        .success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            color: #15803d;
        }

        .error-alert {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            color: #b91c1c;
        }

        /* Form */
        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 18px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
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

        .ml-select {
            display: block;
            width: 100%;
            background: #f0ede8;
            border: 1px solid #ddd8d2;
            border-radius: 8px;
            padding: 9px 36px 9px 12px;
            font-size: 0.875rem;
            color: #3d3530;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%23a09890' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
            background-color: #f0ede8;
            transition: border-color 0.15s;
            box-sizing: border-box;
            font-family: inherit;
        }

        .ml-select:focus {
            outline: none;
            border-color: #a07060;
            box-shadow: 0 0 0 3px rgba(160, 112, 96, 0.15);
        }

        .field-error {
            font-size: 0.72rem;
            color: #b91c1c;
            margin-top: 4px;
        }

        /* Buttons */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 20px;
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

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            padding: 10px 16px;
            background: transparent;
            color: #a09890;
            font-size: 0.78rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid #ddd8d2;
            text-decoration: none;
            transition: all 0.15s;
        }

        .btn-ghost:hover {
            background: #f0ede8;
            color: #5a5048;
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        /* Table */
        .table-count {
            font-size: 0.78rem;
            color: #a09890;
            margin-bottom: 14px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        thead tr {
            background: #f5f2ee;
        }

        th {
            padding: 10px 14px;
            text-align: left;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #a09890;
            border-bottom: 1px solid #e8e3dd;
        }

        td {
            padding: 11px 14px;
            border-bottom: 1px solid #edeae5;
            color: #5a5048;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: #f5f2ee;
        }

        .td-title {
            font-weight: 600;
            color: #3d3530;
        }

        .td-empty {
            text-align: center;
            padding: 28px 14px;
            color: #c4bdb7;
            font-size: 0.82rem;
        }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        .badge-hr {
            background: #ede9fe;
            color: #4f46e5;
        }

        .badge-default {
            background: #f0ede8;
            color: #a09890;
        }

        /* Delete action */
        .action-delete {
            font-size: 0.78rem;
            font-weight: 600;
            color: #c0392b;
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            padding: 0;
            transition: color 0.12s;
        }

        .action-delete:hover {
            color: #7f1d1d;
            text-decoration: underline;
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            {{-- Session Messages --}}
            @if(session('success'))
            <div class="success-box">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="error-alert">{{ session('error') }}</div>
            @endif

            {{-- Create User --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">➕</div>
                    <span class="section-title">Create New User</span>
                </div>
                <div class="ml-card-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="form-grid-2">
                            <div>
                                <label for="first_name" class="form-label">First Name</label>
                                <input id="first_name" name="first_name" type="text" class="ml-input"
                                    value="{{ old('first_name') }}" required />
                                @error('first_name')
                                <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name" class="form-label">Last Name</label>
                                <input id="last_name" name="last_name" type="text" class="ml-input"
                                    value="{{ old('last_name') }}" required />
                                @error('last_name')
                                <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="ml-input"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="ml-input" required />
                                @error('password')
                                <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="ml-input" required />
                            </div>
                            <div>
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="ml-select">
                                    <option value="hr_manager" {{ old('role') === 'hr_manager' ? 'selected' : '' }}>HR Manager</option>
                                    <option value="applicant" {{ old('role') === 'applicant'  ? 'selected' : '' }}>Applicant</option>
                                </select>
                                @error('role')
                                <p class="field-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn-primary">Create User</button>
                    </form>
                </div>
            </div>

            {{-- Search & Filter --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">🔍</div>
                    <span class="section-title">Search Users</span>
                </div>
                <div class="ml-card-body">
                    <form method="GET" action="{{ route('admin.users') }}">
                        <div class="filter-grid">
                            <div>
                                <label for="search" class="form-label">Search</label>
                                <input id="search" name="search" type="text" class="ml-input"
                                    placeholder="Name or email..."
                                    value="{{ request('search') }}" />
                            </div>
                            <div>
                                <label for="filter_role" class="form-label">Filter by Role</label>
                                <select id="filter_role" name="role" class="ml-select">
                                    <option value="">All</option>
                                    <option value="applicant" {{ request('role') === 'applicant'  ? 'selected' : '' }}>Applicant</option>
                                    <option value="hr_manager" {{ request('role') === 'hr_manager' ? 'selected' : '' }}>HR Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-actions">
                            <button type="submit" class="btn-primary">Search</button>
                            <a href="{{ route('admin.users') }}" class="btn-ghost">Clear</a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Users Table --}}
            <div class="ml-card">
                <div class="ml-card-header">
                    <div class="card-icon">👥</div>
                    <span class="section-title">All Users</span>
                </div>
                <div class="ml-card-body">
                    <p class="table-count">Showing {{ $users->total() }} user(s)</p>
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td class="td-title">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge {{ $user->role === 'hr_manager' ? 'badge-hr' : 'badge-default' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                            onsubmit="return confirm('Delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="td-empty">No users found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $users->withQueryString()->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>