# 1. A rendszer célja
Az elsődleges cél, hogy egy alap számológépként működjön, lehetőségek szerint minél több elemet tartalmazva egy tudományos számológépből. Az egész lényege, hogy egy olyan számológépet hozzunk létre, amely a lehető legkényelmesebb használatot biztosítja, és a gyakran felmerükő problémákra fókuszál.

## Ideális működés 
Ideális esetben a rendszer tartalmaz minden problémára megoldást, és segítséget nyújt a gyakorlati helyzetek kivitelezésében.

## 2. Projekt terv

| Funkció                     | Feladat                                   |
| ----------------------------| ------------------------------------------|
| Köv. spec                   | A megrendelő dokumentációja               |       
| Funk. spec                  | A fejlesztő csapat dokumentációja         |       
| Rendszerterv                | A rendszer átfogó dokumentációja          |      
| Adattárolás                 | Adatbázis megvalósítása                   |      
| Regisztrációs felület       | Regisztráció frontend/backend             |      
| Bejelentkezési felület      | Bejelentkezés frontend/backend            |       
| Főoldal                     |                                           |
| Design                      | css/javascript                            |



## 3.Rendszer architektúra
A számológép alkalmazás háromrétegű modell alapján épül fel, amely biztosítja az átláthatóságot és a bővíthetőséget.
Az első réteg a prezentációs réteg (UI), amely felelős a felhasználói interakcióért. Ide tartozik a gombok elrendezése, a kijelző, valamint a vizuális megjelenés, amit HTML és CSS valósít meg.

A második réteg a logikai réteg (számítások). Ez a rész kezeli a felhasználó által bevitt adatok feldolgozását, a műveletek elvégzését, valamint az eredmények előállítását. Itt JavaScript függvények végzik a számításokat.

A harmadik réteg az adatkezelési réteg, amely az előzmények kezelésére szolgál. Ez a böngésző LocalStorage funkcióját használja, így a műveletek és eredmények ideiglenesen megőrizhetők.
Ez a rétegelt felépítés biztosítja, hogy a felhasználói felület független legyen a számítási logikától, és az adatkezelés külön kezelhető legyen. A struktúra előnye, hogy a rendszer egyszerűen karbantartható, és a jövőben könnyen bővíthető további funkciókkal.

## 4. Felhasználói felület
A számológép felülete letisztult és könnyen használható, a felhasználóbarát működést tartja szem előtt.

Számgombok (0–9)
A fő számbevitel a gombok megnyomásával történik. Ezeket rácsszerűen helyezzük el (3×3 + 0).

Műveleti gombok (+, −, ×, ÷)
Külön oszlopban kapnak helyet, hogy jól elkülönüljenek a számoktól.

Speciális gombok

% → százalékszámításhoz

√ → négyzetgyök

x² → négyzetre emelés

Törlő gombok

C → az aktuális bevitt szám törlése

AC → minden adat törlése (kijelző + előzmények)

Nagy kijelzőmező
A legfelső részen található, ide kerül az aktuálisan bevitt szám és a művelet jele.
Példa: 23 + vagy 12 ÷ 3 = 4.

Másodlagos kijelző az előzményekhez
A fő kijelző alatt jelennek meg az utolsó műveletek.
Példa:
5 + 7 = 12
12 × 3 = 36

Felhasználói felület vázlat:
 ----------------------------
|           123 + 5          |  <-- Nagy kijelző
|   5 + 7 = 12               |  <-- Előzmények (másodlagos kijelző)
 ----------------------------
|  7  |  8  |  9  |   ÷   |
|  4  |  5  |  6  |   ×   |
|  1  |  2  |  3  |   −   |
|  0  |  .  |  =  |   +   |
|  C  |  AC |  %  |  √ x² |
 ----------------------------
