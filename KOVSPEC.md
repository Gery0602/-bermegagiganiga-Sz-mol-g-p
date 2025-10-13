## 1. Áttekintés
A projekt ötlete egy  többfelhasználós tudományos számológép rendszert valósít meg. Az alkalmazás lehetővé teszi a felhasználók számára, hogy regisztrálás után hozzáférjenek a számológép funkciókhoz. A rendszer hierarchikus jogosultsági szintekkel rendelkezik: admin, moderátor és felhasználó. Az adatokat MySQL adatbázisban tároljuk. Az egész webalkalmazás React-Node.js és MySQL segítségével lesz létrehozva.
## 2. Jelenlegi helyzet
Jelenleg a piacon elérhető online számológép alkalmazások többsége nem biztosít megfelelő felhasználói élményt és funkcionalitást. A legtöbb alapvető számítási műveletekre korlátozódik, nem rendelkezik felhasználókezeléssel, történet mentéssel vagy megosztási lehetőségekkel. Hiányzik egy olyan komplex rendszer, amely egyesíti a tudományos számológép funkcióit egy modern, biztonságos és felhasználóbarát felülettel, miközben lehetővé teszi a számítások tárolását és adminisztrációját.
## 3. Vágyálom rendszer
Az ideális rendszerben a felhasználók gyorsan és egyszerűen regisztrálhatnak, majd azonnal belemerülhetnek az alkalmazás élményébe. A kezelőfelület tiszta és intuitív, így a felhasználó könnyedén megtalálja a számára lényeges funkciókat.
Felhasználói szerepkörök:
Felhasználó (User):

Alapvető és tudományos számítások elvégzése
Személyes profil kezelése

Moderátor:

Minden felhasználói funkció elérhető
Felhasználói műveletek moderálása

Admin:

Minden moderátori funkció elérhető
Teljes felhasználókezelés (létrehozás, módosítás, törlés, jogosultságok)
Rendszerbeállítások módosítása
Teljes adatbázis adminisztráció
Biztonsági beállítások kezelése

Tudományos számológép funkciók:
Alapműveletek:

Összeadás, kivonás, szorzás, osztás
Százalékszámítás
Négyzetre emelés, gyökvonás
Hatványozás

Tudományos műveletek:

Faktoriális
Abszolút érték


Speciális funkciók:

Statisztikai számítások (átlag, medián, szórás)




## 4. Funkcionális követelmények
## 4.1 Felhasználókezelés

Regisztráció/Bejelentkezés

Email és jelszó alapú regisztráció
Megerősítő email küldése
Jelszó visszaállítás funkció
Kétfaktoros hitelesítés (opcionális)


Szerepkörök kezelése

Felhasználó alapértelmezett szerepkör regisztrációkor
Admin által történő szerepkör módosítás
Jogosultság alapú funkció hozzáférés



## 4.2 Számológép funkciók

Számítások elvégzése

Alapvető aritmetikai műveletek
Tudományos függvények
Speciális matematikai műveletek
Valós idejű eredmény megjelenítés


Számítási előzmények

Automatikus mentés minden számítás után
Előzmények böngészése
Keresés az előzményekben
Számítások törlése



## 4.3 Adminisztrációs funkciók

Felhasználókezelés (Admin)

Felhasználók listázása és keresése
Felhasználói adatok módosítása
Szerepkörök hozzárendelése/módosítása
Felhasználók felfüggesztése/törlése
Aktivitás naplók megtekintése


Moderációs funkciók (Moderátor)

Felhasználói tevékenységek monitorozása
Számítási statisztikák
Jelentések kezelése
Rendszerhasználati jelentések


Rendszerbeállítások (Admin)

Számológép funkciók be/kikapcsolása
Maximális számítási komplexitás beállítása
Előzmények megőrzési idő beállítása
Biztonsági paraméterek



## 4.4 Megosztás és együttműködés

Számítások megosztása

Megosztási link generálása
Jogosultságok beállítása (csak olvasás/szerkesztés)
Megosztás visszavonása



## 5. Fogalomtár

MySQL:
Nyílt forráskódú relációs adatbázis-kezelő rendszer. Strukturált adatok tárolására és kezelésére szolgál.
Admin (Adminisztrátor):
A legmagasabb jogosultsági szinttel rendelkező felhasználó, aki teljes hozzáféréssel rendelkezik a rendszer minden funkciójához és beállításához.
Moderátor:
Köztes jogosultsági szinttel rendelkező felhasználó, aki felügyelheti a felhasználókat és moderálhatja a tartalmat, de nem rendelkezik teljes rendszeradminisztrációs jogokkal.
Tudományos számológép:
Olyan számológép, amely az alapvető aritmetikai műveleteken túl képes komplex matematikai függvények (trigonometrikus, logaritmikus, exponenciális) és műveletek elvégzésére.
Számítási előzmények:
A felhasználó által korábban elvégzett számítások listája, amely lehetővé teszi a korábbi eredmények megtekintését és újrafelhasználását.
## 6. Rendszerre vonatkozó törvények, szabványok, ajánlások
Törvények


Rendszerszabványok, ajánlások

Fejlesztői eszközök:

Trello (projekt menedzsment)
Discord (csapatkommunikáció)
GitHub (verziókezelés)
Visual Studio Code (fejlesztői környezet)


Technológiai stack:



MySQL (Adatbázis)
XAMPP (Helyi fejlesztői környezet)


## 7. Nem-funkcionális követelmények
## 7.1 Teljesítmény

Számítások eredményének megjelenítése 100ms alatt
Oldal betöltési idő maximum 2 másodperc
1000 egyidejű felhasználó kiszolgálása

## 7.2 Biztonság

Adatbázis kapcsolat titkosítása

## 7.3 Használhatóság

Reszponzív design (mobil, tablet, desktop)
Intuitív felhasználói felület
Billentyűzet támogatás


## 7.4 Karbantarthatóság

Részletes dokumentáció
Verziókezelés (Git)

## 8. Riportok (Interjúkérdések)
Q: Milyen weboldalt képzelt el?
A: Egy többfelhasználós tudományos számológép alkalmazást, amely egyesíti a modern számológép funkciókat egy biztonságos, felhasználóbarát környezetben. Az oldal funkciói:

Fejlett számítási műveletek (alapvető és tudományos)
Felhasználói szerepkörök (Admin, Moderátor, Felhasználó)
Számítási előzmények mentése és megosztása
Teljes adminisztrációs felület
Reszponzív design

Q: Miért van szükség több felhasználói szintre?
A: A hierarchikus jogosultsági rendszer biztosítja a megfelelő hozzáférés-kezelést és biztonságot. Az admin teljes kontrollal rendelkezik a rendszer felett, a moderátor felügyelheti a felhasználókat, míg a felhasználók biztonságosan használhatják a számológép funkciókat. Ez lehetővé teszi a hatékony rendszeradminisztrációt és a visszaélések megelőzését.
Q: Miért nem elég egy egyszerű számológép alkalmazás?
A: Egy sima számológép alkalmazás nem biztosít történet mentést, felhasználói fiókokat, vagy megosztási lehetőségeket. Az általunk tervezett rendszer egy komplex matematikai eszköz, amely lehetővé teszi a számítások tárolását, későbbi felhasználását, valamint csapatmunkát és oktatási célokat is támogat. Az adminisztrációs funkciók pedig lehetővé teszik a rendszer hatékony üzemeltetését és karbantartását.
Q: Tervez az oldalnak asztali vagy telefonos alkalmazást?
A: Nem, hiszen az oldal reszponzív, tehát telefonon, tableten és számítógépen is egyszerűen kezelhető. A webalapú megoldás platform-független és nem igényel külön telepítést.
Q: Hogyan különbözik ez más online számológépektől?
A: A rendszer több mint egy egyszerű számológép:

Teljes felhasználókezelési rendszer
Adminisztrációs és moderációs funkciók
Professzionális tudományos műveletek

## 9. Fejlesztési ütemterv (javasolt)
1. Fázis: Tervezés (2 hét)

Részletes rendszerterv elkészítése
Adatbázis séma tervezése

2. Fázis: Backend fejlesztés (4 hét)

Felhasználókezelés implementálása
Adatbázis integráció

3. Fázis: Frontend fejlesztés (4 hét)

Admin és moderátor felületek
Reszponzív design

4. Fázis: Tesztelés és finomítás (2 hét)

Integrációs tesztek
Felhasználói tesztelés
Hibajavítások

5. Fázis: Deployment (1 hét)

Éles környezet beállítása
Adatbázis migráció
Dokumentáció véglegesítése
Élesítés

