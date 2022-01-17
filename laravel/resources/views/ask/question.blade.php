<x-page>
    <div>
        Current presentation Id: {{ $id }}
    </div>

    <x-form title='Ask your question' action='ask.question' submit='Ask' method='post' >
        <x-form-input id='presentationId' value='{{$id}}' hidden />
        <x-form-input id='username' title='Username' class='form-control' labelClass='textLabelSmaller'/>
        <x-form-input id='question' title='Question' class='form-control' labelClass='textLabelSmaller' />
    </x-form>
</x-page>

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" />
    <script>

    </script>
@endpush
