<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>

  <h2>HTML Categories</h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>parent</th>
    </tr>

    @foreach ($categorie as $cat)
    <tr>
      <th>{{ $cat->name }}</th>
      <th>{{ $cat->description }}</th>
      <th>{{ $cat->parent }}</th>
    </tr>
    @endforeach

  </table>

</body>

</html>
