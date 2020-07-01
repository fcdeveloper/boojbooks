@extends('layouts.app')

@section('title', 'Books List')

@section('content')

  <h1>List</h1>
  <p>Click on title to sort columns</p>
  <table 
  id="table"
  class="table">
    <thead class="thead-dark">
      <tr>
        <th onclick="sortTable(0)" scope="col">ID</th>
        <th onclick="sortTable(1)" scope="col">Title</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($books['items'] as $book)
      <tr>
        <th scope="row">{{$book['id']}}</th>
        <td>{{$book['volumeInfo']['title']}}</td>
        <td>
          <a href="{{ route('delete_book', ['id' => $book['id']]) }}" class="btn btn-link"> <i class="fa fa-trash"></i></a>
          <a href="{{ route('details_book', ['id' => $book['id']]) }}"  class="btn btn-link"> <i class="fa fa-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <script type="application/javascript">
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("table");
      switching = true;
      // Set the sorting direction to ascending:
      dir = "asc";
      /* Make a loop that will continue until
      no switching has been done: */
      while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
          // Start by saying there should be no switching:
          shouldSwitch = false;
          /* Get the two elements you want to compare,
          one from current row and one from the next: */
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /* Check if the two rows should switch place,
          based on the direction, asc or desc: */
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          // Each time a switch is done, increase this count by 1:
          switchcount ++;
        } else {
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
    sortTable(0); //default order
  </script>

@endsection