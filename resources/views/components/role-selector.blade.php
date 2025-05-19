<div>
    @props(['role'])
    <select name="role" class="border rounded p-1 text-sm">
        <option value="user" @selected($role === 'user')>{{ __('app.user') }}</option>
        <option value="admin" @selected($role === 'admin')>{{ __('app.admin') }}</option>
    </select>
</div>
