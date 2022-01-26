<x-page>
    <x-header :link="route('view.session.overview', ['id' => $id])" title="Add Session" />
    <x-form title='' action='session.add' submit='Start Session' method='post' >
        <x-form-input id='id' :value='$id' :hidden='true' />
        <x-form-input id='title' title='Title' placeholder='Title' class='form-control' labelClass='textLabelSmaller' />
    </x-form>
</x-page>
