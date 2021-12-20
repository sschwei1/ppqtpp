<div class='row'>
    <label for='{{$id}}'>{{$title}}</label>
    <input id='{{$id}}' name='{{$id}}' type='{{$type}}' placeholder='{{$placeholder}}' />
    <br />
    <span style='color:red'>@error($id){{$message}}@enderror</span>
    <br />
</div>
