<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Add Club Details</h2>
  <form action="">
  <table class="table-secondary">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Group Id</th> 
      <th scope="col">Business Name</th>
      <th scope="col">Club Name</th>
      <th scope="col">Type</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $p ) 
    <tr>
        <td>{{ $p->club_id}}</td>
        <td>{{ $p->title}}</td>
        <td>{{ $p->product_title}}</td>
        <td>{{ $p->type}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
  </form> 
</div>

</body>
</html>