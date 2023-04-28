<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>

<style type="text/css">
  .tg {
    border-collapse: collapse;
    border-spacing: 0;
  }

  .tg td {
    border-color: black;
    border-style: solid;
    border-width: 1px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    overflow: hidden;
    padding: 30px 15px;
    word-break: normal;
  }

  .tg th {
    border-color: black;
    border-style: solid;
    border-width: 1px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    padding: 30px 15px;
    word-break: normal;
    width: 29%
  }

  .tg .tg-nrix {
    text-align: center;
    vertical-align: middle
  }
</style>


<table class="tg">
  <thead>
    <?php
    // Below is optional, remove if you have already connected to your database.
    $mysqli = mysqli_connect('localhost', 'root', '', 'inventorymanagement');

    // For extra protection these are the columns of which the user can sort by (in your database table).
    $columns = array('product_id');

    // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
    $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

    // Get the sort order for the column, ascending or descending, default is ascending.
    $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

    // Get the result...
    if ($result = $mysqli->query('SELECT * FROM products WHERE IsDeleted = 0 ORDER BY ' . $column . ' ' . $sort_order)) {
      // Some variables we need for the table.
      $add_class = ' class="highlight"';
      ?>
      <tr>
        <th class="tg-nrix" rowspan="2">PROJECT / IS</th>
        <th class="tg-nrix" colspan="2">DEVELOPMENT PLATFORM</th>
        <th class="tg-nrix" rowspan="2">SERVERHOST<br>(On-Prem/Cloud)/<br>IP ADDRESS/ URL / STATUS</th>
      </tr>
      <tr>
        <th class="tg-nrix">FRONT-END</th>
        <th class="tg-nrix">BACK-END</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-nrix" colspan="4"> &nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td class="tg-nrix"> </td>
        <td class="tg-nrix"> </td>
        <td class="tg-nrix"> </td>
        <td class="tg-nrix"> </td>
      </tr>

      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td class="tg-nrix">
            <?php echo $row["product_name"] ?>
          </td>

          <td class="tg-nrix">
            <?php echo $row["details"] ?>
          </td>
          <td>
            <?php echo $row["implementing_office"] ?>
          </td>
          <td>
            <?php echo $row["status"] ?>
          </td>
          <td> <a href="up" Edit</a><a style="color: black; " href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a>
              <a href="up" Edit</a><a onclick='javascipt:confirmationDelete($(this));return false;' style="color: black;"
                  href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a><a style="color: black;"
                  href="read.php?id=<?php echo $row["product_id"] ?>"> View</a></td>

        </tr>
      

  
      <?php endwhile; ?>
    </tbody>
  </table>
  <?php
  $result->free();
    }
    ?>