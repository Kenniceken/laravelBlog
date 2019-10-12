 @if(count($errors))
  <div class="alert alert-dismissible alert-danger" role="alert">
    @foreach($errors->all() as $error)
      <ul>
        <li style="list-style-type: none;">{{ $error }}</li>
      </ul>
    @endforeach
  </div>
@endif