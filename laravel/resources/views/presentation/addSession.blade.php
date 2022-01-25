<x-page>
    <x-header :link="route('view.presentation.overview')" title="Add Session" />
    <x-form title='newPres' :action='route("")' submit='Save' method='post' >
        <x-form-input id='Title' title='Title' placeholder='Title' class='form-control' labelClass='textLabelSmaller'/>
    </x-form>
</x-page>
