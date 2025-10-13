<?php
header("Content-Type: application/json");
session_start();

try {
    $kapcsolat = new PDO("mysql:host=localhost;dbname=calculator_app", "root", "");
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
            $jelszo = md5($adatok['password']);
            $full_name = $adatok['fullname'];
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $kapcsolat->prepare($query);
            $stmt->execute([$nev]);
            if ($stmt->fetch()) {
                echo json_encode(["msg" => "A megadott névvel már van az adatbázisban rekord!"]);
                exit();
            }
            $stmt = $kapcsolat->prepare("INSERT INTO users (username, password, full_name) VALUES (?, ?, ?)");
            $stmt->execute([$nev, $jelszo, $full_name]);
            echo json_encode(["success" => "Sikeres regisztráció!"]);
            exit();

        case "l":
            $username = $adatok['username'];
            $jelszo = md5($adatok['password']);
            $stmt = $kapcsolat->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->execute([$username, $jelszo]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                
                $stmt = $kapcsolat->prepare("SELECT * FROM roles WHERE id = ?");
                $stmt->execute([$user['role_id']]);
                $roles =$stmt->fetch(PDO::FETCH_ASSOC);
                if ($roles) {
                    $_SESSION['user'] = $user;
                    echo json_encode(["success" => "Sikeres bejelentkezés", "role" => $roles['role_name'], "username" => $user['username']]);
                    exit();
                }
            } else {
                echo json_encode(["msg" => "Hibás bejelentkezési adatok"]);
                exit();
            }

        case "listusers":
            
            $stmt = $kapcsolat->query("SELECT username, full_name, users.id, role_name FROM users, roles WHERE users.role_id = roles.id");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            exit();
        
        case "listformulas":
            $stmt = $kapcsolat->query("SELECT * FROM formulas");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            exit();
        case "newformula":
            $name = $adatok['name'];
            $formula = $adatok['formula'];
            $description = $adatok['description'];
            $stmt = $kapcsolat->prepare("INSERT INTO formulas (name, formula, description) VALUES(?, ?, ?)");
            $stmt->execute([$name, $formula, $description]);
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            exit();
        case "deleteuser": 
            
            $id = $adatok['id'];
            $stmt = $kapcsolat->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(["success" => "Felhasználó törölve"]);
            exit();
        

        case "deleteformula": 
            
            $id = $adatok['id'];
            $stmt = $kapcsolat->prepare("DELETE FROM formulas WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(["success" => "Képlet törölve"]);
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
