<script>
//get id from url.
var getQueryString = function ( field, url ) {
  var href = url ? url : window.location.href;
  var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
  var string = reg.exec(href);
  return string ? string[1] : null;
};

var id = getQueryString('editId');


var tr = document.getElementsByClassName('current');
  for (var i = 0; i < tr.length; i++) {
    tr[i].parentNode.removeChild(tr[i]);
  }
  
//ID is only use for updating info.
if (!id) {
  var initialDataLoaded = false;
  var dbRef = firebase.database().ref('users');
  var startListening = function() {
    dbRef.on('child_added', function(snapshot) {
      var data = snapshot.val();

      var $childData = document.createElement("tr");
      $childData.id = data.userId;
      $childData.innerHTML = "<td><a href=action.php?editId="+data.userId+">edit</a></td>";
      $childData.innerHTML += '<td><a href="#" onclick="deleteUser(\''+data.userId+ '\')">delete</a></td>';
      $childData.innerHTML += "<td>"+data.userId+"</td>";
      $childData.innerHTML += "<td>"+data.firstname+"</td>";
      $childData.innerHTML += "<td>"+data.lastname+"</td>";
      document.getElementById("tableUsers").append($childData);
      
    });
 }
startListening();
} else {
  firebase.database().ref('users/').orderByChild('userId').equalTo(id).once('value', function(snapshot) {
    snapshot.forEach(function(childSnapshot) {
      var childData = childSnapshot.val();
      document.getElementById('userId').value = childData.userId;
      document.getElementById('firstname').value = childData.firstname;
      document.getElementById('lastname').value = childData.lastname;
    });
  })
}

//insert user
function saveUser() {
  
  var uid = firebase.database().ref().child('users').push().key,
    firstName = document.getElementById('firstname').value,
    lastName = document.getElementById('lastname').value,
    data = {
      userId : uid,
      firstname : firstName,
      lastname : lastName
    },
    updates = {};
    updates['/users/' + uid] = data;
    firebase.database().ref().update(updates);
    //reloadPage();
}

//edit user
function editUser() {
  if(id == document.getElementById('userId').value ) {
    var uid = document.getElementById('userId').value,
      firstName = document.getElementById('firstname').value,
      lastName = document.getElementById('lastname').value,
      data = {
        userId : uid,
        firstname : firstName,
        lastname : lastName
      },
      updates = {};
      updates['/users/' + uid] = data;
      firebase.database().ref().update(updates);
  } 
  //reloadPage();
}

//delete user
function deleteUser(val) {
  firebase.database().ref().child('/users/' + val).remove();

  var elem = document.getElementById(val);
  elem.parentNode.removeChild(elem);

  //reloadPage();
}

//reload page every form submit.
function reloadPage() {
  window.location.reload();
}
</script>
</body>
</html>