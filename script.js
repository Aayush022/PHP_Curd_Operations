function openTab(evt, tabName) {
	console.log("Received Data", evt, tabName);

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("container");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tabs");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
function myFunction() {
  var txt;
  if (confirm()) {
    location.href = "/php/connection.php?delete=<?php echo $row['id'];?>";
  } else {

  }
}
