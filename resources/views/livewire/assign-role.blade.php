<style>
    .roles-wrapper 
{
    max-width: 420px;
    margin: 0 auto;
    padding: 24px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.roles-title 
{
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 18px;
}

.alert 
{
    padding: 10px 14px;
    border-radius: 6px;
    margin-bottom: 16px;
    font-size: 0.95rem;
}

.alert-success 
{
    background: #e6f7e6;
    color: #1c7d1c;
}

.alert-error 
{
    background: #ffe6e6;
    color: #b30000;
}

.roles-form .form-group 
{
    margin-bottom: 16px;
}

.form-label 
{
    display: block;
    font-size: 0.9rem;
    margin-bottom: 6px;
    color: #444;
}

.form-input 
{
    width: 100%;
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 0.95rem;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
}

.form-input:focus 
{
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px rgba(59,130,246,0.2);
}

.form-error 
{
    color: #d00;
    font-size: 0.8rem;
}

.btn-primary 
{
    width: 100%;
    background: #3b82f6;
    color: #fff;
    padding: 10px;
    font-size: 1rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.2s;
}

.btn-primary:hover 
{
    background: #2563eb;
}

.btn-primary:focus 
{
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
}
</style>


<div class="roles-wrapper">
    <h2 class="roles-title">Назначение ролей пользователям</h2>

    <!-- Сообщения -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit="assignRole" class="roles-form">

        <!-- Пользователь -->
        <div class="form-group">
            <label for="selectedUser" class="form-label">Пользователь</label>
            <select id="selectedUser" wire:model="selectedUser" class="form-input">
                <option value="">Выберите пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @error('selectedUser')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Роль -->
        <div class="form-group">
            <label for="selectedRole" class="form-label">Роль</label>
            <select id="selectedRole" wire:model="selectedRole" class="form-input">
                <option value="">Выберите роль</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('selectedRole')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-primary">Добавить</button>
    </form>
</div>