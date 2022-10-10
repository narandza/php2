@props([ 'name', 'placeholder' , 'value'])

<textarea  required rows="5" id="{{$name}}" name="{{$name}}" class="form-control" placeholder="{{$placeholder}}">{{$value}}</textarea>

@error($name)
<small class="text-danger">{{$message}}</small>
@enderror
