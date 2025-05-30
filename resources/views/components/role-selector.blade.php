<div>
    @props(['role'])
    <select name="role" class="w-40 border rounded p-1 text-sm bg-slate-800">
        <option value="user" @selected($role === 'user')>{{ __('app.user') }}</option>
        <option value="admin" @selected($role === 'admin')>{{ __('app.admin') }}</option>
    </select>
</div>
