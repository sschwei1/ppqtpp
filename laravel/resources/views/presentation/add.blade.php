<x-page>
    <x-header :link="route('view.presentation.overview')" title="Add Presentation" />
    <x-form title='newPres' :action='route("")' submit='Save' method='post' >
        <x-form-input id='Name' title='Name' placeholder='Name' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='Theme' title='Theme' placeholder='Theme' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='Description' title='Description' placeholder='Description' class='form-control' labelClass='textLabelSmaller'/>
    </x-form>
</x-page>
