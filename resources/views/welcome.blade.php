<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="antialiased">
    <div class="container mt-4">
    <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add Person Details
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('save_person')}}">
       @csrf
        <div class="form-group">
          <label for="name">Person Name:</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="email">Person Email Id:</label>
          <input type="text" id="email" name="email" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="phone">Person Contact Number:</label>
          <input type="text" id="phonenumber" name="phonenumber" class="form-control" required="">
        </div>
        <div class="row">
            <div class="form-group col">
            <label for="address">Address:</label>
            <input name="address" class="form-control" required=""/>
            </div>
            <div class="form-group col">
            <label for="addresstype">Address Type:</label>
            <select name="addresstype" class="form-control">
                <option value="Permanent">Permanent</option>
                <option value="Temporary">Temporary</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
            <label for="addresstemp">Address:</label>
            <input name="addresstemp" class="form-control" required=""/>
            </div>
            <div class="form-group col">
            <label for="addresstypetemp">Address Type:</label>
            <select name="addresstypetemp" class="form-control">
                <option value="Permanent">Permanent</option>
                <option value="Temporary">Temporary</option>
            </select>
            </div>
        </div>
        <div class="form-group">
        <label for="subject">Subjects:</label>
            <select class="form-control" name="sub[]" multiple="" required>
            @foreach ($subjects as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
    </div>
    </body>
</html>
