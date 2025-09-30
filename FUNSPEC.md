# 1. Bevezetés

## 1.1 Cél
Ezen dokumentásió célja, hogy ismertesse a projekthez szügséges funkcionális követelményeket.
  
## 1.2 Hatály
A dokumentum az "Übermegagiganiga számológép" webalkalmazás fejlesztési projektjére vonatkozik.
	
# 2. Rendszerleírás

## 2.1 A rendszer célja
Lehetőséget nyújt a felhasználóknak, hogy kényelmesen böngészőből végezhesenek egyszerűbb/bonyolultabb számításokat.
	
## 2.2. Felhasználói esetek (Use-case)
Felhasználó regisztrálása/bejelentkezése.
Felhasználói szintől fügően létrehozhatnak vagy törölhatnek bizonyos képleteket.

# 3. Követelmények

## 3.1 Funkcionális követelmények
	
Vendég számológép használat: Bejelentkezés nélkül használható egy egyszerübb számólógép.
Regisztráció/Bejelentkezés: A felhasználók létrehozhatnak egy fiókot, és bejelentkezhetnek a rendszerbe.
Bejelentkezet felhasználó számólógép használat: A bejelentkezett felhasználó elér egy közel teljes értékü tudományos számológépet és mind emelet számolási előzményeket és egy képlet listát.  

## 3.2. Nem-funkcionális követelmény

Reszponzivitás: A webalkalmazás minden eszközön (desktop, tablet, mobil) jól használható.


# 4. Felhasználói szintek
|           |                                                  |
| --- | --- |
| `guest` | -a számológép használata képletek nélkül |
| `user` | -képletek használata az adatbázisból |
| `moderator` | -képletek szerkesztése az adatbázisban |
| `admin` | -képletek hozzáadása és törlése az adtbázisól <br> -felhasználók kezelése |
