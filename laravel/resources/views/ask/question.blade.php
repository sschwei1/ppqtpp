<x-page>

    <x-header :title="$presentationTitle" :link="route('view.ask.join')" />

    <x-form title='Ask your question' action='ask.question' submit='Ask' method='post' >
        <x-form-input id='presentationId' value='{{$id}}' :hidden="true" />
        <x-form-input id='sessionId' value='{{$sessionId}}' :hidden="true" />
        <x-form-input id='title' value='{{$presentationTitle}}' :hidden="true" />
        <x-form-input id='username' title='Username' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='question' title='Question' class='form-control' labelClass='textLabelSmaller' />
    </x-form>

    @if($successMessage)
        <div class="alert alert-success">
            The Question was sucessfully submited
        </div>
    @endif

</x-page>

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" />
    <script>

    </script>
@endpush
