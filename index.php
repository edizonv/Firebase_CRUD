<?php require_once 'header.php'; ?>

<div id="usersForm">
  <h1>Add User</h1>
  <table>
    <tr>
      <td><label for="firstname">Firstname</label></td>
      <td><input type="text" name="firstname" id="firstname"></td>
    </tr>
    <tr>
      <td><label for="lastname">Lastname</label></td>
      <td><input type="text" name="lastname" id="lastname"></td>
    </tr>
    <tr>
      <td>
          
        <button onclick="saveUser()">Save</button>
      </td>
    </tr>
  </table>
</div>

<h1>All Users</h1>
<table id="tableUsers">
<thead>
  <tr>
    <td colspan="2">Action</td>
    <td>ID</td>
    <td>Firstname</td>
    <td>Lastname</td>
  </tr>
</thead>
</table>

<?php require_once 'footer.php'; ?>