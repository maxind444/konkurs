<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  
  // Sprawdź, czy hasło i powtórzone hasło są identyczne
  if ($password !== $confirmPassword) {
    echo "Hasła nie są identyczne.";
    exit;
  }
  
  // Wyślij e-mail z danymi rejestracyjnymi
  $to = "twój_email@example.com";
  $subject = "Nowa rejestracja";
  $message = "E-mail: " . $email . "\n" . "Hasło: " . $password;
  $headers = "From: twój_email@example.com";
  
  if (mail($to, $subject, $message, $headers)) {
    header("Location: success.html"); // Przekierowanie po pomyślnej rejestracji
    exit;
  } else {
    echo "Wystąpił problem podczas wysyłania e-maila.";
  }
}
?>
