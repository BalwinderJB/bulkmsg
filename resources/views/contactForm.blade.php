<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />


@include('flash-message')

<div class="container">
    <form class="form" action="{{ route('msg') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Mobile</label>
            <input type="number" name="phone" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
</div>