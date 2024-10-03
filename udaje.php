<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Overenie údajov</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      float: right;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<?php
session_start(); // Start the session

// Check if the user ID is set in the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //echo "User ID: " . $user_id;
} else {
    echo "User ID not found.";
}

?>

   <div class="container">
    <h1>Chceme si overiť, že ste to vy. Zadajte Vaše údaje</h1>
    <form action="proces_udaje.php" method="post">

     <!-- Add form field for hiden input of user_id-->
      <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
      
      <label for="street">Ulica:</label>
      <input type="text" id="street" name="street" autocomplete="address-level1" required>

      <label for="city">Mesto:</label>
      <input type="text" id="city" name="city" autocomplete="address-level2" required>

      <label for="state">Štát:</label>
      <input type="text" id="state" name="state" autocomplete="address-level1" required>

      <label for="name">Meno:</label>
      <input type="text" id="name" name="name" autocomplete="name" required>

      <label for="surname">Priezvisko:</label>
      <input type="text" id="surname" name="surname" autocomplete="family-name" required>

      <label for="phone">Telefónne číslo:</label>
      <input type="tel" id="phone" name="phone" autocomplete="tel" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" autocomplete="email" required>

      <input type="submit" value="Odoslať">
    </form>
  </div>
  <script>
    showAlert();
    function showAlert(){
      alert("Tato stránka je na edukačné účeli iba. Nezadávajte skutočné meno heslo!!!");
      alert("This webpage is for educational purposes only. Do not enter real name or email address, password etc!!!");
  }
  </script>
</body>
</html>
