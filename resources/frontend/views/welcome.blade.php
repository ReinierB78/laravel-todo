@if(Auth::user())
    {{-- You are a logged in user! --}}
@else
    {{-- You are new here! --}}
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="d-flex bg-light align-items-center" style="height: 100vh;">
    <div class="container px-5 my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>The ultimate to-do app!</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam quod quisquam nisi ullam neque dolorem, et ad id nesciunt, a temporibus animi omnis, praesentium impedit? Ipsa assumenda expedita facilis vel!</p>
                <ul class="list-style-none">
                    <li class="list-style-none">Benefit of so</li>
                    <li class="list-style-none">Easy to use</li>
                    <li class="list-style-none">Effective sleep</li>
                </ul>
                <figure>
                    <blockquote class="blockquote">
                      <p>A well-known quote, contained in a blockquote element.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                      Someone famous in <cite title="Source Title">Source Title</cite>
                    </figcaption>
                  </figure>
            </div>
            <div class="col-md-4 offset-md-1">
                <h5 class="mb-3">Please login</h5>
                <form id="contactForm" action="{{ url('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" name="email" id="email" type="text" placeholder="Email" />
                        <label for="username">email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="password" id="password" type="text" placeholder="Password"/>
                        <label for="password">Password</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>

