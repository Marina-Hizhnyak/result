<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    echo "Имя: " . $nom . "<br>";
    echo "Фамилия: " . $prenom;
}

// $formData = array(
//     'nom' => '',
//     'prenom' => '',
//     'email' => '',
//     'message' => '',
//     'erreur' => ''
// );

// // Проверка отправки формы
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Получение значений полей формы
//     foreach ($formData as $key => $value) {
//         if (isset($_POST[$key])) {
//             $formData[$key] = test_input($_POST[$key]);
//         }
//     }

//     // Проверка обязательных полей на заполнение
//     foreach (array('nom', 'email', 'message') as $requiredField) {
//         if (empty($formData[$requiredField])) {
//             $formData['erreur'] = "Tous les champs obligatoires doivent être remplis.";
//             break;
//         }
//     }

//     // Проверка адреса электронной почты
//     if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
//         $formData['erreur'] = "L'adresse e-mail n'est pas valide.";
//     }

//     // Если ошибок нет, обработка успешной отправки формы
//     if (empty($formData['erreur'])) {
//         // Обработка успешной отправки формы
//         echo "<p class='success'>Le formulaire a bien été envoyé!</p>";
//         // Сброс значений полей формы
//         foreach (array('nom', 'prenom', 'email', 'message') as $field) {
//             $formData[$field] = '';
//         }
//     }
// }

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     echo $data;
//     return $data;
// }