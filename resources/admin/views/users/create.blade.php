@extends('layout.frontend')

@section('content')
<div class="bg-light">
  <div class="col-6">
    <div class="p-4">
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-floating mb-3">
          <input name="name" placeholder="name" type="text" class="form-control" id="name" aria-describedby="name">
          <label for="name" class="form-label">Name</label>
        </div>
        <div class="form-floating mb-3">
          <input name="email" placeholder="email" type="email" class="form-control" id="email" aria-describedby="email">
          <label for="email" class="form-label">e-mail</label>
        </div>
        <div class="form-floating mb-3">
          <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
      <a href="/">Home</a>
    </div>
  </div>
</div>
@endsection
