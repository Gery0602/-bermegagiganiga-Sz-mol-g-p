<?php
header("Content-Type: application/json");
session_start();

try {
    $kapcsolat = new PDO("mysql:host=localhost;dbname=calculator_db", "root", "");
    $kapcsolat->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $adatok = json_decode(file_get_contents("php://input"), true);
    $muvelet = $adatok['muvelet'] ?? '';

    switch ($muvelet) {
        case "r":
            $nev = $adatok['name'];
            $email = $adatok['email'];
            $jelszo = md5($adatok['password']);
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $kapcsolat->prepare($query);
            $stmt->execute([$nev]);
            if ($stmt->fetch()) {
                echo json_encode(["msg" => "A megadott névvel már van az adatbázisban rekord!"]);
                exit();
            }
            $stmt = $kapcsolat->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $stmt->execute([$nev, $jelszo, $email]);
            echo json_encode(["success" => "Sikeres regisztráció!"]);
            exit();

        case "l":
            $email = $adatok['email'];
            $jelszo = md5($adatok['password']);
            $stmt = $kapcsolat->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stmt->execute([$email, $jelszo]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                $_SESSION['user'] = $user;
                echo json_encode(["success" => "Sikeres bejelentkezés"]);
                exit();
            } else {
                echo json_encode(["msg" => "Hibás bejelentkezési adatok"]);
                exit();
            }

        case "list":
            
            $stmt = $kapcsolat->query("SELECT id, username, email FROM users");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            exit();

        case "delete": 
            
            $id = $adatok['id'];
            $stmt = $kapcsolat->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(["success" => "Felhasználó törölve"]);
            exit();

        case "edit": 
            
            $id = $adatok['id'];
            $name = $adatok['name'];
            $email = $adatok['email'];
            $stmt = $kapcsolat->prepare("UPDATE users SET name=?, email=? WHERE id=?");
            $stmt->execute([$name, $email, $id]);
            echo json_encode(["success" => "Szerkesztés sikeres"]);
            exit();

          
        case "profile": 
            
            echo json_encode($_SESSION['user']);
            exit();
            
        default:
            echo json_encode(["error" => "Hibás művelet!"]);
            exit();
    }
} else {
    echo json_encode(["error" => "Hibás kérés!"]);
    exit();
}
?>
