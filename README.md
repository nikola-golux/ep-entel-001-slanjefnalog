001 zadatak za ENTEL u Yii 2 
============================

Projekat podrazumeva formu za unos veceg fajla koji treba nekome poslati, pri cemu se 
generise link ka tom fajlu.

Struktura direktorijuma
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



Zahtevi
------------

PROBLEM koji je inicijator nastanka ovog modul: Kada se zeli poslati mejlom veliki fajl, a mejl server odbija da ga posalje
MANUALNO RESENJE: korisnici u dogovorom sa MIS sluzbom posalju DVD, flash disk ili spuste na entelftp.
Administrator ga smesti preko ftp naloga na server i link prema tom fajlu (koji je spoljno vidljiva web adresa) i polje mejlu korisniku koji je to tarzio.
Korisnik ga dalje distribuira gde zeli
SCENARIO APLIKACIJE: 
AKCIJA 1.
```
OTVARANJE NALOGA: prvo otvoriti nalog za aplikaciju u koji ce upisati napomenu tj. objasnjenje fajla i koje ce da se ugradi u sadrzaj mejl i definise zastitu fajla.
Default dana za brisanje fajla sa servera je 5 dana, ali može da se postavi i vise.
Zavrsetak akcije je ubacivanje naloga u bazu tj. upis rekorda u tabelu slanjefnalog osim polja datvrem_mejl
Napomena: Nalog može da se menja ili obrise sve dok polje datvrem_mejl nije definisano (ovo polje se definiše u akciji 3)
```
AKCIJA 2.
```
Spuštanje fajlova na server. Biranje jednog ili više fajlova i njihovo ubacivanje u tabelu slanjefajlovi
Popunjava sva polja osim polja datvrem_del koje se popunjava kada se fajl obrise sa servera (AKCIJA 4)
```
AKCIJA 3
```
Akcija OVEARA tj. GENERISI MEJL - Generise se mejl. 
U mejlu se ispisuje slanjefnalog.napomena i upozorenje do kada se može preuzeti fajl, jer se iz bezbednosnih razloga brise.
ispsuju se link tj. linkovi ako ima više fajlova (hesovan) prema fajlu 
Gojko treba da definise Izjavu o bezbednosti, koju takodje treba ugraditi u mejl.
Obavezno korisnik vidi preview mejla i ima za potvrdu dugme SLANJE MEJLA.
Klik na dugme SLANJE salje mejl na adresu korisnika koji je napravio nalog ( $_SESSION[korisnik_k]@ep-entel.com )
Istovremeno se upisuje datum i vreme u polje salnjefnalog.datvrem_mejl
Mejl ide nalogodavcu sa mejl adrese sistemske (dobicemo je od Gojka). On ga forward-uje dalje gde zeli 
Napomena 1: u prvoj verziji aplikacije slanje mejla ide samo na standardan način
Kasnije cemo probati varijante sa vecim nivoom tajnosti- sa zipovanjem i postavljanjem pasvorda ili sms kodom i slicno 
Napomena 2: Mejl moze vise puta da se salje dok god fajl tj. fajlovi nisu obrisani, ali se ne radi update datvrem_mejl
Tj. ako datvrem_mejl postoji definisan a pokrenuta je akcija GENERISI MEJL, treba napraviti kontrolu da li je fajl aktivan ( u odnosu na datvrem_mejl + dmn_cuvaj_dana ), i ako je aktivno moze da se ponovo generise mejl.
```
AKCIJA 4 
```
II Faza aplikacije- Krteirati aplikaciju koja jednom dnevno proverava da li ima sta za brisanje od fajlova prema podacima slanjefajlova.datvrem i slanjefnalog.dmn_cuvaj_dana
Napomena: jedan nalog moze da sadrzi jedan ili vise fajlova, mada korisnicima treba preporuciti da urade kompresiju fajlova u jedan ZIP fajl.
```

TABELE
------------

TABELA 1.
EDNEV.SLANJEFNALOG   
```
    id,dmn_zemlja,id_entel,dmn_nivo_zastita,dmn_cuvaj_dana,napomena,datvrem_mejl, file_route
    dmn_zemlja=$_SESSION[loginCountry]
    id_entel se postavlja iz tabele entel 
    id_entel <= entel.id 
    spajanje : entel.username = $_SESSION[korisnik_k]
```
TABELA 2.
EDNEV.SLANJEFAJLOVI
```
    id,id_slanjefnalog,ime_fajla,mesto,size_MB,datvrem,datvrem_del
    SISTEMSKE TABELA 
    PRACENJE
    VIEW NA POSTOJECE TABELE
    entel
    entel.id = id_entel 
    mejl adresa na koju se mejl salje je  entel.username@ep-entel.com 
    username= $_SESSION[korisnik_k];
    ili
    $dobav[id_entel] = $GLOBALS[aId]
    sifarnik
    domen='zemlja' / dmn_zemlja ne postavlja se cita se
    domen= 'cuvaj_dana' sifranik.vrednost se upisuje u polje dmn_cuvaj_dana
    domen='nivo_zastita' -II- , prazno je standardno - sada samo ovo i radimo
```