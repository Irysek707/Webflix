<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>My Page</title>
  <script>
    function openTab(tabName) {
      var i;
      var x = document.getElementsByClassName("tab");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";
    }
    document.addEventListener("DOMContentLoaded", function(event) {
      openTab('account-details');
    });
  </script>
  <style>
    .tab {
      display: none;
    }
  </style>
</head>
<body>
  <button onclick="openTab('account-details')">Account Details</button>
  <button onclick="openTab('my-list')">My List</button>
  <button onclick="openTab('my-reviews')">My Reviews</button>
  
  <div id="account-details" class="tab">
    <h1>Account Details</h1>
    <p>Here's your account details.</p>
  </div>
  
  <div id="my-list" class="tab">
    <h1>My List</h1>
    <p>Here's your list.</p>
  </div>
  
  <div id="my-reviews" class="tab">
    <h1>My Reviews</h1>
    <p>Here are your reviews.</p>
  </div>
</body>
</html>