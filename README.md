
# Progetto ReST
Autenticazione utente da app attraverso webservice.
Il progetto prevede l'utilizzo di un unico webservice per due applicazioni: una Web App ed una Appliazione Android.
Il webservice utilizza PHP per la gestione delle richisete e MYSQL per la gestione del database.

L'appicazione è accessibile tramite il link: http://vedovati.altervista.org

### Organizzazione del DataBase
Il database dell'applicazione è composto da soltanto due tabelle:
- Users (id, username, password): Tabella per la gestione degli utenti di cui l'username è univoco, non sarà quindi possibile creare un account con un username già usato.
- Img (id, path, id_user, description, likes, time): Tabella per la gestione delle immagini uploudate dagli utenti. Path contiene al suo interno il percorso relativo per l'immagine (quando un immagine vine uploudata al nome viene aggiunto il numero TIMESTAMP(Anno Mese Giorno Ora Minuti Secondi) attuale per identificare univocamente e vine salvata nella cartella /img). id_user è la foreign key relativa alla tabella Users.

L'appicazione Android utilizzerà però solo la tabella Users.


## ImageBook
Progetto di una WebApp ReSTful programmata in HTML, CSS e JS lato Client e PHP lato Server.
La pagina iniziale dell'applicazione è il main.php.

### Analisi
Per accedere all'applicazione bisogna per prima cosa creare un proprio account, se non se ne ha già uno, e loggare con esso inserendo username e password nella pagina dedicata. Dopo essere loggati l'applicazione porterà alla home dove sarà possibile guardare tutte le immagini postate, sia dal proprio account che dagli altri, in ordine cronologico e mettere like a quelle piaciute. Sarà ovviamente possibile postare immagini con possibilità di aggiungerci una descrizione nella pagina apposita.

**Considerazioni aggiuntive:**
 - Il numero dei like per ogni rispettiva immagine è soltanto un contatore, è quindi possibile ,per uno stesso utente, mettere più volte like ad una stessa foto.
- L'username di chi ha postato una determinata immagine sarà disponibile sopra la stessa, sarà quindi sempre possibile sapere di qualunque foto l'utente che l'ha pubblicata.

## AndroidAPP
Progetto di un applicazione Android ReSTful programmata in Java lato client e le chiamate al server vengono eseguite tramite delle API PHP.
### Analisi
Questa applicazione è molto più semplice della prima dato che ti permette solo di eseguire Login e di registrarsi. La logica di quest'ultime azioni è però sempre la stessa.
