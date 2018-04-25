<?php require_once 'header.php'; ?>

<div id="usersForm">
  <h1>Edit User</h1>
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
        <input type="hidden" name="userId" id="userId">
        <button onclick="editUser()">Save</button>
      </td>
    </tr>
  </table>
</div>

<?php require_once 'footer.php'; ?>