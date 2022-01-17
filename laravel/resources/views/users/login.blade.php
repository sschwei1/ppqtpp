<x-page>
    <x-header />

    <x-form title='Login' action='user.login' submit='Login' method='post' >
        <x-form-input id='username' title='Username' placeholder='Username' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='password' title='Password' type='password'  placeholder='Password' class='form-control' labelClass='textLabelSmaller'/>
    </x-form>
</x-page>
