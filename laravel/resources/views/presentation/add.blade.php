<x-page>
    <x-header :link="route('view.presentation.overview')" title="Add Presentation" />
    <x-form title='newPres' action='presentation.add' submit='Save' method='post' >
        <x-form-input id='name' title='Name' placeholder='Name' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='theme' title='Theme' placeholder='Theme' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='description' title='Description' placeholder='Description' class='form-control' labelClass='textLabelSmaller'/>
    </x-form>
</x-page>
