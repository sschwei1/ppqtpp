<x-header />

<div>Login</div>
<form action='/users/login' method='post'>
    @csrf
    <x-form-input id='email' title='Email' />
    <x-form-input id='password' title='Password' type='password' />
    <div class='row'>
        <button type='submit'>Login</button>
    </div>
</form>
