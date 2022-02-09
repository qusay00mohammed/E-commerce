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

  <h2>HTML Users</h2>

  <table>
    <tr>
      <th>Number</th>
      <th>Name</th>
      <th>Email</th>
      <th>Full Name</th>
    </tr>

    @foreach ($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <th>{{ $user->username }}</th>
      <th>{{ $user->email }}</th>
      <th>{{ $user->fullname }}</th>
    </tr>
    @endforeach

  </table>

</body>

</html>
