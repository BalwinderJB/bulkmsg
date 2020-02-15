<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

@include('flash-message')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
      Export Excel to database
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('contact.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Mobile Data</button>
                {{--<a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>--}}
            </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{$contact->id}}</th>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                    </tr>
                    @endforeach

                    <tr>

                        <td>{{ $contacts->links() }}</td>
                    </tr>
                    </tbody>
                </table>


        </div>
    </div>
</div>

</body>
</html>
