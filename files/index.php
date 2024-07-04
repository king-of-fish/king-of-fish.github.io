<?php
/***************************************************************************
 *
 * Encode Explorer
 *
 * Author : Marek Rei (marek ät marekrei dot com)
 * Version : 6.4.2
 * Homepage : encode-explorer.siineiolekala.net
 *
 *
 * NB!:If you change anything, save with UTF-8! Otherwise you may
 *     encounter problems, especially when displaying images.
 *
 ***************************************************************************/

/***************************************************************************/
/*   HERE ARE THE SETTINGS FOR CONFIGURATION                               */
/***************************************************************************/

//
// Initialising variables. Don't change these.
//

$_CONFIG = array();
$_ERROR = "";
$_START_TIME = microtime(TRUE);

/*
 * GENERAL SETTINGS
 */

//
// Choose a language. See below in the language section for options.
// Default: $_CONFIG['lang'] = "en";
//
$_CONFIG['lang'] = "en";

//
// Display thumbnails when hovering over image entries in the list.
// Common image types are supported (jpeg, png, gif).
// Pdf files are also supported but require ImageMagick to be installed.
// Default: $_CONFIG['thumbnails'] = true;
//
$_CONFIG['thumbnails'] = false;

//
// Maximum sizes of the thumbnails.
// Default: $_CONFIG['thumbnails_width'] = 200;
// Default: $_CONFIG['thumbnails_height'] = 200;
//
$_CONFIG['thumbnails_width'] = 300;
$_CONFIG['thumbnails_height'] = 300;

//
// Mobile interface enabled. true/false
// Default: $_CONFIG['mobile_enabled'] = true;
//
$_CONFIG['mobile_enabled'] = true;

//
// Mobile interface as the default setting. true/false
// Default: $_CONFIG['mobile_default'] = false;
//
$_CONFIG['mobile_default'] = false;

/*
 * USER INTERFACE
 */

//
// Will the files be opened in a new window? true/false
// Default: $_CONFIG['open_in_new_window'] = false;
//
$_CONFIG['open_in_new_window'] = false;

//
// When clicking on files, will the files be downloaded rather than opened? true/false
// Default: $_CONFIG['force_download'] = false;
//
$_CONFIG['force_download'] = false;

//
// How deep in subfolders will the script search for files?
// Set it larger than 0 to display the total used space.
// Default: $_CONFIG['calculate_space_level'] = 0;
//
$_CONFIG['calculate_space_level'] = 0;

//
// Will the page header be displayed? 0=no, 1=yes.
// Default: $_CONFIG['show_top'] = true;
//
$_CONFIG['show_top'] = true;

//
// The title for the page
// Default: $_CONFIG['main_title'] = "Encode Explorer";
//
$_CONFIG['main_title'] = "WASFDDDDD Public Files";

//
// The secondary page titles, randomly selected and displayed under the main header.
// For example: $_CONFIG['secondary_titles'] = array("Secondary title", "&ldquo;Secondary title with quotes&rdquo;");
// Default: $_CONFIG['secondary_titles'] = array();
//
$_CONFIG['secondary_titles'] = array();

//
// Display breadcrumbs (relative path of the location).
// Default: $_CONFIG['show_path'] = true;
//
$_CONFIG['show_path'] = true;

//
// Display the time it took to load the page.
// Default: $_CONFIG['show_load_time'] = true;
//
$_CONFIG['show_load_time'] = true;

//
// The time format for the "last changed" column.
// Default: $_CONFIG['time_format'] = "d.m.y H:i:s";
//
$_CONFIG['time_format'] = "d.m.y H:i:s";

//
// Charset. Use the one that suits for you.
// Default: $_CONFIG['charset'] = "UTF-8";
//
$_CONFIG['charset'] = "UTF-8";

/*
* PERMISSIONS
*/

//
// The array of folder names that will be hidden from the list.
// Default: $_CONFIG['hidden_dirs'] = array();
//
$_CONFIG['hidden_dirs'] = array();

//
// Filenames that will be hidden from the list.
// Default: $_CONFIG['hidden_files'] = array(".ftpquota", "index.php", "index.php~", ".htaccess", ".htpasswd");
//
$_CONFIG['hidden_files'] = array(".ftpquota", "index.php", "index.php~", ".htaccess", ".htpasswd");

//
// Whether authentication is required to see the contents of the page.
// If set to false, the page is public.
// If set to true, you should specify some users as well (see below).
// Important: This only prevents people from seeing the list.
// They will still be able to access the files with a direct link.
// Default: $_CONFIG['require_login'] = false;
//
$_CONFIG['require_login'] = false;

//
// Usernames and passwords for restricting access to the page.
// The format is: array(username, password, status)
// Status can be either "user" or "admin". User can read the page, admin can upload and delete.
// For example: $_CONFIG['users'] = array(array("username1", "password1", "user"), array("username2", "password2", "admin"));
// You can also keep require_login=false and specify an admin.
// That way everyone can see the page but username and password are needed for uploading.
// For example: $_CONFIG['users'] = array(array("username", "password", "admin"));
// Default: $_CONFIG['users'] = array();
//
$_CONFIG['users'] = array();

//
// Permissions for uploading, creating new directories and deleting.
// They only apply to admin accounts, regular users can never perform these operations.
// Default:
// $_CONFIG['upload_enable'] = true;
// $_CONFIG['newdir_enable'] = true;
// $_CONFIG['delete_enable'] = false;
//
$_CONFIG['upload_enable'] = true;
$_CONFIG['newdir_enable'] = true;
$_CONFIG['delete_enable'] = false;

/*
 * UPLOADING
 */

//
// List of directories where users are allowed to upload.
// For example: $_CONFIG['upload_dirs'] = array("./myuploaddir1/", "./mydir/upload2/");
// The path should be relative to the main directory, start with "./" and end with "/".
// All the directories below the marked ones are automatically included as well.
// If the list is empty (default), all directories are open for uploads, given that the password has been set.
// Default: $_CONFIG['upload_dirs'] = array();
//
$_CONFIG['upload_dirs'] = array();

//
// MIME type that are allowed to be uploaded.
// For example, to only allow uploading of common image types, you could use:
// $_CONFIG['upload_allow_type'] = array("image/png", "image/gif", "image/jpeg");
// Default: $_CONFIG['upload_allow_type'] = array();
//
$_CONFIG['upload_allow_type'] = array();

//
// File extensions that are not allowed for uploading.
// For example: $_CONFIG['upload_reject_extension'] = array("php", "html", "htm");
// Default: $_CONFIG['upload_reject_extension'] = array();
//
$_CONFIG['upload_reject_extension'] = array("php", "php2", "php3", "php4", "php5", "phtml");

//
// By default, apply 0755 permissions to new directories
//
// The mode parameter consists of three octal number components specifying
// access restrictions for the owner, the user group in which the owner is
// in, and to everybody else in this order.
//
// See: https://php.net/manual/en/function.chmod.php
//
// Default: $_CONFIG['new_dir_mode'] = 0755;
//
$_CONFIG['new_dir_mode'] = 0755;

//
// By default, apply 0644 permissions to uploaded files
//
// The mode parameter consists of three octal number components specifying
// access restrictions for the owner, the user group in which the owner is
// in, and to everybody else in this order.
//
// See: https://php.net/manual/en/function.chmod.php
//
// Default: $_CONFIG['upload_file_mode'] = 0644;
//
$_CONFIG['upload_file_mode'] = 0644;

/*
 * LOGGING
 */

//
// Upload notification e-mail.
// If set, an e-mail will be sent every time someone uploads a file or creates a new dirctory.
// Default: $_CONFIG['upload_email'] = "";
//
$_CONFIG['upload_email'] = "";

//
// Logfile name. If set, a log line will be written there whenever a directory or file is accessed.
// For example: $_CONFIG['log_file'] = ".log.txt";
// Default: $_CONFIG['log_file'] = "";
//
$_CONFIG['log_file'] = "";

/*
 * SYSTEM
 */


//
// The starting directory. Normally no need to change this.
// Use only relative subdirectories!
// For example: $_CONFIG['starting_dir'] = "./mysubdir/";
// Default: $_CONFIG['starting_dir'] = ".";
//
$_CONFIG['starting_dir'] = ".";

//
// Location in the server. Usually this does not have to be set manually.
// Default: $_CONFIG['basedir'] = "";
//
$_CONFIG['basedir'] = "";

//
// Big files. If you have some very big files (>4GB), enable this for correct
// file size calculation.
// Default: $_CONFIG['large_files'] = false;
//
$_CONFIG['large_files'] = false;

//
// The session name, which is used as a cookie name.
// Change this to something original if you have multiple copies in the same space
// and wish to keep their authentication separate.
// The value can contain only letters and numbers. For example: MYSESSION1
// More info at: http://www.php.net/manual/en/function.session-name.php
// Default: $_CONFIG['session_name'] = "";
//
$_CONFIG['session_name'] = "";

/***************************************************************************/
/*   TÕLKED                                                                */
/*                                                                         */
/*   TRANSLATIONS.                                                         */
/***************************************************************************/

$_TRANSLATIONS = array();

// Albanian
$_TRANSLATIONS["al"] = array(
	"file_name" => "Emri Skedarit",
	"size" => "Madhësia",
	"last_changed" => "Ndryshuar",
	"total_used_space" => "Memorija e përdorur total",
	"free_space" => "Memorija e lirë",
	"password" => "Fjalëkalimi",
	"upload" => "Ngarko skedarë",
	"failed_upload" => "Ngarkimi i skedarit dështoi!",
	"failed_move" => "Lëvizja e skedarit në udhëzuesin e saktë deshtoi!",
	"wrong_password" => "Fjalëkalimi i Gabuar!!",
	"make_directory" => "New dir",
	"new_dir_failed" => "Failed to create directory",
	"chmod_dir_failed" => "Failed to change directory rights",
	"unable_to_read_dir" => "Unable to read directory",
	"location" => "Location",
	"root" => "Root"
);

// Bulgarian
$_TRANSLATIONS["bg"] = array(
	"file_name" => "Име",
	"size" => "Размер",
	"last_changed" => "Последна промяна",
	"total_used_space" => "Общо използвано",
	"free_space" => "Свободно място",
	"password" => "Парола",
	"upload" => "Качване",
	"failed_upload" => "Неуспешно качване на файла!",
	"failed_move" => "Неуспешно преместване на файла в правилната директория!",
	"wrong_password" => "Грешна парола",
	"make_directory" => "Нова директория",
	"new_dir_failed" => "Грешка при създаване на директорията",
	"chmod_dir_failed" => "Грешка при смяна на правата до директорията",
	"unable_to_read_dir" => "Директорията не може да бъде прочетена",
	"location" => "Път",
	"root" => "Корен",
	"log_file_permission_error" => "Скриптът няма права за запис в лог файла.",
	"upload_not_allowed" => "Настройките на скрипта не позволяват качване в тази директория.",
	"upload_dir_not_writable" => "Нямате право за запис в тази директория.",
	"mobile_version" => "Мобилна версия",
	"standard_version" => "Стандартен изглед",
	"page_load_time" => "Страницата е генерирана за %.2f мс",
	"wrong_pass" => "Грешен потребител или парола",
	"username" => "Потребител",
	"log_in" => "Вход",
	"upload_type_not_allowed" => "Този файлов формат е забранен за качване.",
	"del" => "Изтриване",
	"log_out" => "Изход"
);
//Catalan
$_TRANSLATIONS["ca"] = array(
        "file_name" => "Nom d'arxiu",
        "size" => "Mida",
        "last_changed" => "Última modificació",
        "total_used_space" => "Total espai emprat",
        "free_space" => "Espai lliure",
        "password" => "Paraula de pass",
        "upload" => "Pujar arxiu",
        "failed_upload" => "Error al pujar l'arxiu!",
        "failed_move" => "Error al moure l'arxiu al directori seleccionat!",
        "wrong_password" => "Paraula de pas incorrecta",
        "make_directory" => "Crear directori",
        "new_dir_failed" => "Error al crear el directori",
        "chmod_dir_failed" => "Error al canviar els permisos del directori",
        "unable_to_read_dir" => "No es possible llegir el directori",
        "location" => "Traducció",
        "root" => "Arrel"
);

// Czech
$_TRANSLATIONS["cz"] = array(
	"file_name" => "Název souboru",
	"size" => "Velikost",
	"last_changed" => "Změněno",
	"total_used_space" => "Obsazený prostor",
	"free_space" => "Volný prostor",
	"password" => "Heslo",
	"upload" => "Nahrát",
	"failed_upload" => "Nahrávání se nezdařilo!",
	"failed_move" => "Přesun souboru do určeného adresáře se nezdařil!",
	"wrong_password" => "Chybné heslo",
	"make_directory" => "Nový adresář",
	"new_dir_failed" => "Vytvoření adresáře se nezdařilo",
	"chmod_dir_failed" => "Změna práv adresáře se nezdařila",
	"unable_to_read_dir" => "Chyba při čtení adresáře",
	"location" => "Umístění",
	"root" => "Kořenový adresář",
	"log_file_permission_error" => "Skript nemá oprávnění k zápisu do souboru protokolu.",
	"upload_not_allowed" => "Konfigurační skript neumožňuje nahrávání v tomto adresáři.",
	"upload_dir_not_writable" => "Tento adresář nemá oprávnění k zápisu.",
	"mobile_version" => "Zobrazení pro mobil",
	"standard_version" => "Standardní zobrazení",
	"page_load_time" => "Stránka nahrána za %.2f ms",
	"wrong_pass" => "Špatné uživatelské jméno nebo heslo",
	"username" => "Uživatelské jméno",
	"log_in" => "Přihlásit se",
	"upload_type_not_allowed" => "Tento typ souboru není povolen pro nahrávání.",
	"del" => "Smazat",
	"log_out" => "Odhlásit se"
);

// Dutch
$_TRANSLATIONS["nl"] = array(
	"file_name" => "Bestandsnaam",
	"size" => "Omvang",
	"last_changed" => "Laatst gewijzigd",
	"total_used_space" => "Totaal gebruikte ruimte",
	"free_space" => "Beschikbaar",
	"password" => "Wachtwoord",
	"upload" => "Upload",
	"failed_upload" => "Fout bij uploaden van bestand!",
	"failed_move" => "Fout bij het verplaatsen van tijdelijk uploadbestand!",
	"wrong_password" => "Fout wachtwoord!",
	"make_directory" => "Nieuwe folder",
	"new_dir_failed" => "Fout bij aanmaken folder!",
	"chmod_dir_failed" => "Rechten konden niet gewijzigd worden!",
	"unable_to_read_dir" => "Niet mogelijk om directorie te lezen",
	"location" => "Locatie",
	"root" => "Root",
	"log_file_permission_error" => "Script heeft geen toegang tot het logbestand.",
	"upload_not_allowed" => "Uploaden van bestanden is niet toegestaan.",
	"upload_dir_not_writable" => "Het is niet toegestaan in deze directorie bestanden te plaatsen.",
	"mobile_version" => "Mobiele weergave",
	"standard_version" => "Standaard weergave",
	"page_load_time" => "Pagina geladen in %.2f ms",
	"wrong_pass" => "Foutieve gebruikersnaam of wachtwoord",
	"username" => "Gebruikersnaam",
	"log_in" => "Inloggen",
	"upload_type_not_allowed" => "Dit type bestand is niet toegestaan.",
	"del" => "Verwijder", // short for Delete
	"log_out" => "Uitloggen"
);

// English
$_TRANSLATIONS["en"] = array(
	"file_name" => "File name",
	"size" => "Size",
	"last_changed" => "Last updated",
	"total_used_space" => "Total space used",
	"free_space" => "Free space",
	"password" => "Password",
	"upload" => "Upload",
	"failed_upload" => "Failed to upload the file!",
	"failed_move" => "Failed to move the file into the right directory!",
	"wrong_password" => "Wrong password",
	"make_directory" => "New directory",
	"new_dir_failed" => "Failed to create directory",
	"chmod_dir_failed" => "Failed to change directory rights",
	"unable_to_read_dir" => "Unable to read directory",
	"location" => "Location",
	"root" => "Root",
	"log_file_permission_error" => "The script does not have permissions to write the log file.",
	"upload_not_allowed" => "The script configuration does not allow uploading in this directory.",
	"upload_dir_not_writable" => "This directory does not have write permissions.",
	"mobile_version" => "Mobile view",
	"standard_version" => "Standard view",
	"page_load_time" => "Page loaded in %.2f ms",
	"wrong_pass" => "Wrong username or password",
	"username" => "Username",
	"log_in" => "Log in",
	"upload_type_not_allowed" => "This file type is not allowed for uploading.",
	"del" => "Delete",
	"log_out" => "Log out"
);

// Estonian
$_TRANSLATIONS["et"] = array(
	"file_name" => "Faili nimi",
	"size" => "Suurus",
	"last_changed" => "Viimati muudetud",
	"total_used_space" => "Kokku kasutatud",
	"free_space" => "Vaba ruumi",
	"password" => "Parool",
	"upload" => "Uploadi",
	"failed_upload" => "Faili ei &otilde;nnestunud serverisse laadida!",
	"failed_move" => "Faili ei &otilde;nnestunud &otilde;igesse kausta liigutada!",
	"wrong_password" => "Vale parool",
	"make_directory" => "Uus kaust",
	"new_dir_failed" => "Kausta loomine ebaõnnestus",
	"chmod_dir_failed" => "Kausta õiguste muutmine ebaõnnestus",
	"unable_to_read_dir" => "Unable to read directory",
	"location" => "Asukoht",
	"root" => "Peakaust"
);

// Finnish
$_TRANSLATIONS["fi"] = array(
	"file_name" => "Tiedoston nimi",
	"size" => "Koko",
	"last_changed" => "Muokattu",
	"total_used_space" => "Yhteenlaskettu koko",
	"free_space" => "Vapaa tila",
	"password" => "Salasana",
	"upload" => "Lisää tiedosto",
	"failed_upload" => "Tiedoston lisäys epäonnistui!",
	"failed_move" => "Tiedoston siirto kansioon epäonnistui!",
	"wrong_password" => "Väärä salasana",
	"make_directory" => "Uusi kansio",
	"new_dir_failed" => "Uuden kansion luonti epäonnistui!",
	"chmod_dir_failed" => "Kansion käyttäjäoikeuksien muuttaminen epäonnistui!",
	"unable_to_read_dir" => "Kansion sisältöä ei voi lukea.",
	"location" => "Paikka",
	"root" => "Juurihakemisto",
	"log_file_permission_error" => "Ohjelman ei ole sallittu kirjoittaa lokiin.",
	"upload_not_allowed" => "Ohjelman asetukset eivät salli tiedoston lisäämistä tähän kansioon.",
	"upload_dir_not_writable" => "Kansioon tallentaminen epäonnistui.",
	"mobile_version" => "Mobiilinäkymä",
	"standard_version" => "Tavallinen näkymä",
	"page_load_time" => "Sivu ladattu %.2f ms:ssa",
	"wrong_pass" => "Väärä käyttäjätunnus tai salasana",
	"username" => "Käyttäjätunnus",
	"log_in" => "Kirjaudu sisään",
	"log_out" => "Kirjaudu ulos",
	"upload_type_not_allowed" => "Tämän tiedostotyypin lisääminen on estetty.",
	"del" => "Poista"
);

// French
$_TRANSLATIONS["fr"] = array(
	"file_name" => "Nom de fichier",
	"size" => "Taille",
	"last_changed" => "Modifi&eacute; le",
	"total_used_space" => "Espace total utilis&eacute;",
	"free_space" => "Espace libre",
	"password" => "Mot de passe",
	"upload" => "Ajouter",
	"failed_upload" => "Erreur lors de l'envoi",
	"failed_move" => "Erreur lors du d&eacute;placement",
	"wrong_password" => "Identifiant ou mot de passe incorrect",
	"make_directory" => "Nouveau dossier",
	"new_dir_failed" => "Erreur lors de la cr&eacute;ation du dossier",
	"chmod_dir_failed" => "Impossible de changer les permissions du dossier",
	"unable_to_read_dir" => "Impossible de lire le dossier",
	"location" => "Localisation",
	"root" => "Racine",
	"log_file_permission_error" => "Le script n'a pas la permission d'&eacute;crire dans le fichier de logs.",
	"upload_not_allowed" => "La configuration du script ne permet pas d'ajouter un fichier ici.",
	"upload_dir_not_writable" => "Ce dossier ne possède pas de permission en &eacute;criture.",
	"mobile_version" => "Version mobile",
	"standard_version" => "Version standard",
	"page_load_time" => "Page chargée en %.2f ms",
	"wrong_pass" => "Identifiant ou mot de passe incorrect",
	"username" => "Identifiant",
	"log_in" => "Connexion",
	"upload_type_not_allowed" => "L'envoi de ce type de fichier n'est pas permis.",
	"del" => "Supprimer",
	"log_out" => "D&eacute;connexion"
);

// German
$_TRANSLATIONS["de"] = array(
	"file_name" => "Dateiname",
	"size" => "Gr&ouml;&szlig;e",
	"last_changed" => "Letzte &Auml;nderung",
	"total_used_space" => "Benutzter Speicherplatz",
	"free_space" => "Freier Speicherplatz",
	"password" => "Passwort",
	"upload" => "Upload",
	"failed_upload" => "Upload ist fehlgeschlagen!",
	"failed_move" => "Verschieben der Datei ist fehlgeschlagen!",
	"wrong_password" => "Falsches Passwort",
	"make_directory" => "Neuer Ordner",
	"new_dir_failed" => "Erstellen des Ordners fehlgeschlagen",
	"chmod_dir_failed" => "Ver&auml;nderung der Zugriffsrechte des Ordners fehlgeschlagen",
	"unable_to_read_dir" => "Ordner konnte nicht gelesen werden",
	"location" => "Ort",
	"root" => "Wurzelverzeichnis",
	"log_file_permission_error" => "Das Script kann wegen fehlenden Berechtigungen keine Log Datei schreiben.",
	"upload_not_allowed" => "Die Scriptkonfiguration erlaubt kein Hochladen in dieses Verzeichnis.",
	"upload_dir_not_writable" => "Dieser Ordner besitzt keine Schreibrechte.",
	"mobile_version" => "Mobile Ansicht",
	"standard_version" => "Normale Ansicht",
	"page_load_time" => "Die Seite wurde in %.2f ms geladen",
	"wrong_pass" => "Benutzername oder Kennwort falsch",
	"username" => "Benutzername",
	"log_in" => "Einloggen",
	"upload_type_not_allowed" => "Dieser Dateityp darf nicht hochgeladen werden.",
	"del" => "Entfernen",
	"log_out" => "Ausloggen"
);

// Greek
$_TRANSLATIONS["el"] = array(
	"file_name" => "Όνομα αρχείου",
	"size" => "Μέγεθος",
	"last_changed" => "Τελευταία τροποποίηση",
	"total_used_space" => "Χρησιμοποιημένος χώρος",
	"free_space" => "Ελεύθερος χώρος",
	"password" => "Κωδικός",
	"upload" => "Φόρτωση",
	"failed_upload" => "Αποτυχία φόρτωσης αρχείου!",
	"failed_move" => "Αποτυχία μεταφοράς αρχείου στον κατάλληλο φάκελο!",
	"wrong_password" => "Λάθος κωδικός",
	"make_directory" => "Νέος Φάκελος",
	"new_dir_failed" => "Αποτυχία δημιουργίας φακέλου",
	"chmod_dir_failed" => "Αποτυχία τροποποίησης δικαιωμάτων φακέλου",
	"unable_to_read_dir" => "Αδυναμία ανάγνωσης φακέλου",
	"location" => "Τοποθεσία",
	"root" => "Ριζικός φάκελος",
	"log_file_permission_error" => "Το πρόγραμμα δεν έχει δικαιώματα εγγραφής στο αρχείο καταγραφής.",
	"upload_not_allowed" => "Οι ρυθμίσεις του προγράμματος δεν επιτρέπουν φόρτωση αρχείων σε αυτό τον φάκελο.",
	"upload_dir_not_writable" => "Αυτός ο φάκελος δεν έχει δικαιώματα για εγγραφή.",
	"mobile_version" => "Φορητή προβολή",
	"standard_version" => "Τυπική προβολή",
	"page_load_time" => "Η σελίδα φορτώθηκε σε %.2f ms",
	"wrong_pass" => "Λάθος όνομα χρήστη ή κωδικός πρόσβασης",
	"username" => "Όνομα χρήστη",
	"log_in" => "Σύνδεση",
	"upload_type_not_allowed" => "Αυτός ο τύπος αρχείου δεν επιτρέπεται να φορτωθεί.",
	"del" => "Διαγραφή",
	"log_out" => "Αποσύνδεση"
	
);

// Spanish
$_TRANSLATIONS["es"] = array(
	"file_name" => "Nombre del archivo",
	"size" => "Tamaño",
	"last_changed" => "Último cambio",
	"total_used_space" => "Espacio total usado",
	"free_space" => "Espacio libre",
	"password" => "Contraseña",
	"upload" => "Subir el archivo",
	"failed_upload" => "¡Error al subir el archivo!",
	"failed_move" => "¡Error al mover el archivo al directorio seleccionado!",
	"wrong_password" => "Contraseña incorrecta",
	"make_directory" => "Crear directorio",
	"new_dir_failed" => "Error al crear el directorio",
	"chmod_dir_failed" => "Error al cambiar los permisos del directorio",
	"unable_to_read_dir" => "No es posible leer el directorio",
	"location" => "Localización",
	"root" => "Raíz",
	"log_file_permission_error" => "El script no tiene permisos para escribir en el archivo de registro.",
	"upload_not_allowed" => "La configuración del script no permite subir archivos en este directorio.",
	"upload_dir_not_writable" => "Este directorio no tiene permisos de escritura.",
	"mobile_version" => "Vista móvil",
	"standard_version" => "Vista estándar",
	"page_load_time" => "Página cargada en %.2f ms",
	"wrong_pass" => "Nombre de usuario o contraseña incorrectos",
	"username" => "Usuario",
	"log_in" => "Iniciar sesión",
	"upload_type_not_allowed" => "Este tipo de archivo no está permitido para la subida.",
	"del" => "Eliminar",
	"log_out" => "Cerrar sesión"
);

// Esperanto
$_TRANSLATIONS["eo"] = array(
	"file_name" => "Dosiernomo",
	"size" => "Grando",
	"last_changed" => "Lasta ŝanĝo",
	"total_used_space" => "Uzata spaco",
	"free_space" => "Disponebla spaco",
	"password" => "pasvorto",
	"upload" => "Alŝuto",
	"failed_upload" => "Alŝuto malsukcesis!",
	"failed_move" => "Movo de la dosiero malsukcesis!",
	"wrong_password" => "Malĝusta pasvorto",
	"make_directory" => "Nova dosierujo",
	"new_dir_failed" => "Kreado de dosierujo malsukcesis",
	"chmod_dir_failed" => "Ŝanĝo de dosierujaj rajtoj malsukcesis",
	"unable_to_read_dir" => "Dosierujo ne estas legebla",
	"location" => "Loko",
	"root" => "Radiko",
	"log_file_permission_error" => "La skripto ne rajtas skribi la protokolan dosieron.",
	"upload_not_allowed" => "La skripto malpermesas alŝuti en ĉi tiun dosierujon.",
	"upload_dir_not_writable" => "Ĉi tiu dosierujo ne rajtigas skribadon.",
	"mobile_version" => "Vido por mobilaj iloj",
	"standard_version" => "Defaŭlta vido",
	"page_load_time" => "Paĝo ŝarĝita en %.2f ms",
	"wrong_pass" => "Malĝusta salutnomo aŭ pasvorto",
	"username" => "Salutnomo",
	"log_in" => "Ensaluto",
	"upload_type_not_allowed" => "Alŝuto estas malpermesita por ĉi tiu dosiertipo.",
	"del" => "For", // short for Delete
	"log_out" => "Adiaŭo"
);

// Hungarian
$_TRANSLATIONS["hu"] = array(
	"file_name" => "Fájl név",
	"size" => "Méret",
	"last_changed" => "Utolsó módosítás",
	"total_used_space" => "Összes elfoglalt terület",
	"free_space" => "Szabad terület",
	"password" => "Jelszó",
	"upload" => "Feltöltés",
	"failed_upload" => "A fájl feltöltése nem sikerült!",
	"failed_move" => "A fájl mozgatása nem sikerült!",
	"wrong_password" => "Hibás jelszó",
	"make_directory" => "Új mappa",
	"new_dir_failed" => "A mappa létrehozása nem sikerült",
	"chmod_dir_failed" => "A mappa jogainak megváltoztatása nem sikerült",
	"unable_to_read_dir" => "A mappa nem olvasható",
	"location" => "Hely",
	"root" => "Gyökér",
	"log_file_permission_error" => "A log fájl írása jogosultsági okok miatt nem sikerült.",
	"upload_not_allowed" => "Ebbe a mappába a feltöltés nem engedélyezett.",
	"upload_dir_not_writable" => "A mappa nem írható.",
	"mobile_version" => "Mobil nézet",
	"standard_version" => "Web nézet",
	"page_load_time" => "Letöltési id? %.2f ms",
	"wrong_pass" => "Rossz felhasználónév vagy jelszó",
	"username" => "Felhasználónév",
	"log_in" => "Belépés",
	"upload_type_not_allowed" => "A fájltípus feltöltése tiltott."
);

// Italian
$_TRANSLATIONS["it"] = array(
	"file_name" => "Nome file",
	"size" => "Dimensione",
	"last_changed" => "Ultima modifica",
	"total_used_space" => "Totale spazio usato",
	"free_space" => "Spazio disponibile",
	"password" => "Parola chiave",
	"upload" => "Caricamento file",
	"failed_upload" => "Caricamento del file fallito!",
	"failed_move" => "Spostamento del file nella cartella fallito!",
	"wrong_password" => "Password sbagliata",
	"make_directory" => "Nuova cartella",
	"new_dir_failed" => "Creazione cartella fallita!",
	"chmod_dir_failed" => "Modifica dei permessi della cartella fallita!",
	"unable_to_read_dir" => "Non abilitato a leggere la cartella",
	"location" => "Posizione",
	"root" => "Indice",
	"log_file_permission_error" => "Lo script non ha i permessi per scrivere il file di log.",
	"upload_not_allowed" => "La configurazione dello script non permette l'upload in questa cartella.",
	"upload_dir_not_writable" => "Questa cartella non ha i permessi di scrittura.",
	"mobile_version" => "Visualizzazione Mobile",
	"standard_version" => "Visualizzazione Standard",
	"page_load_time" => "Page aperta in %.2f min",
	"wrong_pass" => "Username o password errati",
	"username" => "Username",
	"log_in" => "Log in",
	"upload_type_not_allowed" => "Questo formato di file non è abilitato per l'upload.",
	"del" => "Cancella", // short for Delete
	"log_out" => "Esci"
);

// Korean
$_TRANSLATIONS["ko"] = array(
	"file_name" => "이름",
	"size" => "크기",
	"last_changed" => "마지막 수정",
	"total_used_space" => "사용한 공간",
	"free_space" => "남은 공간",
	"password" => "비밀번호",
	"upload" => "올리기",
	"failed_upload" => "파일을 올릴 수 없습니다.",
	"failed_move" => "파일을 옮길 수 없습니다.",
	"wrong_password" => "비밀번호가 올바르지 않습니다.",
	"make_directory" => "만들기",
	"new_dir_failed" => "폴더를 만들 수 없습니다.",
	"chmod_dir_failed" => "권한 설정을 할 수 없습니다.",
	"unable_to_read_dir" => "폴더를 읽을 수 없습니다.",
	"location" => "위치",
	"root" => "최상위 폴더",
	"log_file_permission_error" => "로그 파일의 위치에 쓰기 권한을 가지고 있지 않습니다.",
	"upload_not_allowed" => "이 위치에 올릴 수 없습니다.",
	"upload_dir_not_writable" => "이 위치에 쓰기 권한을 가지고 있지 않습니다.",
	"mobile_version" => "모바일 버전으로 보기",
	"standard_version" => "표준 화면으로 보기",
	"page_load_time" => "페이지 로드 %.2f ms",
	"wrong_pass" => "사용자 이름 또는 비밀번호가 올바르지 않습니다.",
	"username" => "사용자 이름",
	"log_in" => "로그인",
	"upload_type_not_allowed" => "이 종류의 파일은 올릴 수 없습니다.",
	"del" => "삭제",
	"log_out" => "로그아웃"
); 

// Lithuanian
$_TRANSLATIONS["lt"] = array(
        "file_name" => "Pavadinimas",
        "size" => "Dydis",
        "last_changed" => "Paskutiniai pakeitimai",
        "total_used_space" => "Visa naudojama vieta",
        "free_space" => "Laisva vieta",
        "password" => "Slaptažodis",
        "upload" => "Įkelti",
        "failed_upload" => "Įkėlimas nepavyko",
        "failed_move" => "Failo perkėlimas nepavyko",
        "wrong_password" => "Klaidingas slaptažodis",
        "make_directory" => "Kurti aplanką",
        "new_dir_failed" => "Aplanko sukurti nepavyko",
        "chmod_dir_failed" => "Privilegijų keitimas nepavyko",
        "unable_to_read_dir" => "Nepavyko atverti aplanko",
        "location" => "Vieta",
        "root" => "Šakninis",
	"log_file_permission_error" => "Šis skriptas neturi teisių rašyti log failo.",
        "upload_not_allowed" => "Šis skriptas neleidžia failų įklimo į šį aplanką.",
        "upload_dir_not_writable" => "Neturite teisių rašyti į šį aplanką.",
        "mobile_version" => "Versija mobiliesiems",
        "standard_version" => "Paprasta versija",
        "page_load_time" => "Puslapis įkeltas per %.2f ms",
        "wrong_pass" => "Klaidingas vartotojo vardas ar slaptažodis",
        "username" => "Vartotojo vardas",
        "log_in" => "Prisijungti",
        "upload_type_not_allowed" => "Šio tipo failų įkelti negalima.",
        "del" => "Trinti", // short for Delete
        "log_out" => "Atsijungti"
);

// Norwegian
$_TRANSLATIONS["no"] = array(
	"file_name" => "Navn",
	"size" => "Størrelse",
	"last_changed" => "Endret",
	"total_used_space" => "Brukt plass",
	"free_space" => "Resterende plass",
	"password" => "Passord",
	"upload" => "Last opp",
	"failed_upload" => "Opplasting gikk galt",
	"failed_move" => "Kunne ikke flytte objektet",
	"wrong_password" => "Feil passord",
	"make_directory" => "Ny mappe",
	"new_dir_failed" => "Kunne ikke lage ny mappe",
	"chmod_dir_failed" => "Kunne ikke endre rettigheter",
	"unable_to_read_dir" => "Kunne ikke lese mappen",
	"location" => "Område",
	"root" => "Rot"
);

//Polish
$_TRANSLATIONS["pl"] = array(
  "file_name" => "Nazwa pliku",
  "size" => "Rozmiar",
  "last_changed" => "Data zmiany",
  "total_used_space" => "Cała przestrzeń",
  "free_space" => "Wolna przestrzeń",
  "password" => "Hasło",
  "upload" => "Prześlij",
  "failed_upload" => "Przesłanie pliku nie powiodło się",
  "failed_move" => "Przenoszenie pliku nie powiodło się!",
  "wrong_password" => "Niepoprawne hasło",
  "make_directory" => "Nowy folder",
  "new_dir_failed" => "Błąd podczas tworzenia nowego folderu",
  "chmod_dir_failed" => "Błąd podczas zmiany uprawnień folderu",
  "unable_to_read_dir" => "Odczytanie folderu nie powiodło się",
  "location" => "Miejsce",
  "root" => "Start",
  "log_file_permission_error" => "Brak uprawnień aby utworzyć dziennik działań.",
  "upload_not_allowed" => "Konfiguracja zabrania przesłania pliku do tego folderu.",
  "upload_dir_not_writable" => "Nie można zapisać pliku do tego folderu.",
  "mobile_version" => "Wersja mobilna",
  "standard_version" => "Widok standardowy",
  "page_load_time" => "Załadowano w %.2f ms",
  "wrong_pass" => "Niepoprawna nazwa użytkownika lub złe hasło",
  "username" => "Użytkownik",
  "log_in" => "Zaloguj się",
  "upload_type_not_allowed" => "Ten rodzaj pliku jest zabroniony.",
  "del" => "Kasuj",
  "log_out" => "Wyloguj się"
);

// Portuguese (Brazil)
$_TRANSLATIONS["pt_BR"] = array(
	"file_name" => "Nome do arquivo",
	"size" => "Tamanho",
	"last_changed" => "Modificado em",
	"total_used_space" => "Total de espaço utilizado",
	"free_space" => "Espaço livre",
	"password" => "Senha",
	"upload" => "Enviar",
	"failed_upload" => "Falha ao enviar o arquivo!",
	"failed_move" => "Falha ao mover o arquivo para o diretório correto!",
	"wrong_password" => "Senha errada",
	"make_directory" => "Nova pasta",
	"new_dir_failed" => "Falha ao criar diretório",
	"chmod_dir_failed" => "Falha ao mudar os privilégios do diretório",
	"unable_to_read_dir" => "Não foi possível ler o diretório",
	"location" => "Localização",
	"root" => "Raíz",
	"log_file_permission_error" => "O script não tem permissão para escrever o arquivo de log.",
	"upload_not_allowed" => "A configuração do script não permite envios neste diretório.",
	"upload_dir_not_writable" => "Não há permissão para escrita neste diretório.",
	"mobile_version" => "Versão Móvel",
	"standard_version" => "Versão Padrão",
	"page_load_time" => "Página carregada em %.2f ms",
	"wrong_pass" => "Nome de usuário ou senha errados",
	"username" => "Nome de Usuário",
	"log_in" => "Log in",
	"upload_type_not_allowed" => "Não é permitido envio de arquivos deste tipo.",
	"del" => "Deletar",
	"log_out" => "Log out"
);

// Portuguese (Portugal)
$_TRANSLATIONS["pt_PT"] = array(
	"file_name" => "Nome do ficheiro",
	"size" => "Tamanho",
	"last_changed" => "Modificado em",
	"total_used_space" => "Total de espaço utilizado",
	"free_space" => "Espaço livre",
	"password" => "Palavra-passe",
	"upload" => "Enviar",
	"failed_upload" => "Falha ao enviar o ficheiro!",
	"failed_move" => "Falha ao mover o ficheiro para a pasta correcta!",
	"wrong_password" => "Palavra-passe errada",
	"make_directory" => "Nova pasta",
	"new_dir_failed" => "Falha ao criar pasta",
	"chmod_dir_failed" => "Falha ao mudar os privilégios da pasta",
	"unable_to_read_dir" => "Não foi possível ler a pasta",
	"location" => "Localização",
	"root" => "Raíz",
	"log_file_permission_error" => "O script não tem permissão para escrever o ficheiro de log.",
	"upload_not_allowed" => "A configuração do script não permite envios para esta pasta.",
	"upload_dir_not_writable" => "Não há permissão para escrita nesta pasta.",
	"mobile_version" => "Versão Móvel",
	"standard_version" => "Versão Padrão",
	"page_load_time" => "Página carregada em %.2f ms",
	"wrong_pass" => "Nome de utilizador ou palavra-passe incorrectos",
	"username" => "Nome de utilizador",
	"log_in" => "Entrar",
	"upload_type_not_allowed" => "Não é permitido o envio de ficheiros deste tipo.",
	"del" => "Apagar",
	"log_out" => "Sair"
);

// Romanian
$_TRANSLATIONS["ro"] = array(
	"file_name" => "Nume fisier",
	"size" => "Marime",
	"last_changed" => "Ultima modificare",
	"total_used_space" => "Spatiu total utilizat",
	"free_space" => "Spatiu disponibil",
	"password" => "Parola",
	"upload" => "Incarcare fisier",
	"failed_upload" => "Incarcarea fisierului a esuat!",
	"failed_move" => "Mutarea fisierului in alt director a esuat!",
	"wrong_password" => "Parol gresita!",
	"make_directory" => "Director nou",
	"new_dir_failed" => "Eroare la crearea directorului",
	"chmod_dir_failed" => "Eroare la modificarea drepturilor pe director",
	"unable_to_read_dir" => "Nu s-a putut citi directorul",
	"location" => "Locatie",
	"root" => "Root"
);

// Russian
$_TRANSLATIONS["ru"] = array(
	"file_name" => "Имя файла",
	"size" => "Размер",
	"last_changed" => "Последнее изменение",
	"total_used_space" => "Всего использовано",
	"free_space" => "Свободно",
	"password" => "Пароль",
	"upload" => "Загрузка",
	"failed_upload" => "Не удалось загрузить файл!",
	"failed_move" => "Не удалось переместить файл в нужную папку!",
	"wrong_password" => "Неверный пароль",
	"make_directory" => "Новая папка",
	"new_dir_failed" => "Не удалось создать папку",
	"chmod_dir_failed" => "Не удалось изменить права доступа к папке",
	"unable_to_read_dir" => "Не возможно прочитать папку",
	"location" => "Расположение",
	"root" => "Корневая папка",
	"log_file_permission_error" => "Скрипт не имеет прав для записи лога файла.",
	"upload_not_allowed" => "Загрузка в эту папку запрещена в настройках скрипта",
	"upload_dir_not_writable" => "В эту папку запрещена запись",
	"mobile_version" => "Мобильный вид",
	"standard_version" => "Обычный вид",
	"page_load_time" => "Страница загружена за %.2f мс.",
	"wrong_pass" => "Неверное имя пользователя или пароль",
	"username" => "Имя пользователя",
	"log_in" => "Войти",
	"upload_type_not_allowed" => "Этот тип файла запрещено загружать",
	"del" => "удалить",
	"log_out" => "выйти"
);

// Slovensky
$_TRANSLATIONS["sk"] = array(
	"file_name" => "Meno súboru",
	"size" => "Veľkosť",
	"last_changed" => "Posledná zmena",
	"total_used_space" => "Použité miesto celkom",
	"free_space" => "Voľné miesto",
	"password" => "Heslo",
	"upload" => "Nahranie súborov",
	"failed_upload" => "Chyba nahrávania súboru!",
	"failed_move" => "Nepodarilo sa presunúť súbor do vybraného adresára!",
	"wrong_password" => "Neplatné heslo!",
	"make_directory" => "Nový priečinok",
	"new_dir_failed" => "Nepodarilo sa vytvoriť adresár!",
	"chmod_dir_failed" => "Nepodarilo sa zmeniť práva adresára!",
	"unable_to_read_dir" => "Nemôžem čítať adresár",
	"location" => "Umiestnenie",
	"root" => "Domov"
);

// Swedish
$_TRANSLATIONS["sv"] = array(
	"file_name" => "Filnamn",
	"size" => "Storlek",
	"last_changed" => "Senast ändrad",
	"total_used_space" => "Totalt upptaget utrymme",
	"free_space" => "Ledigt utrymme",
	"password" => "Lösenord",
	"upload" => "Ladda upp",
	"failed_upload" => "Fel vid uppladdning av fil!",
	"failed_move" => "Fel vid flytt av fil till mapp!",
	"wrong_password" => "Fel lösenord",
	"make_directory" => "Ny mapp",
	"new_dir_failed" => "Fel vid skapande av mapp",
	"chmod_dir_failed" => "Fel vid ändring av mappens egenskaper",
	"unable_to_read_dir" => "Kan inte lasa den filen",
	"location" => "Plats",
	"root" => "Hem",
	"log_file_permission_error" => "Scriptet har inte behörighet att skriva till loggfilen.",
	"upload_not_allowed" => "Skriptets konfiguration tillåter inte uppladdning till denna katalog.",
	"upload_dir_not_writable" => "Denna katalog har inte behörigheter för att skriva.",
	"mobile_version" => "Mobilvisning",
	"standard_version" => "Standardvisning",
	"page_load_time" => "Sidan laddades på %.2f ms",
	"wrong_pass" => "Fel användarnamn eller lösenord",
	"username" => "Användarnamn",
	"log_in" => "Logga in",
	"upload_type_not_allowed" => "Denna filtyp är det inte tillåtet att ladda upp.",
	"del" => "Ta bort",
	"log_out" => "Logga ut"
);


// Turkish
$_TRANSLATIONS["tr"] = array(
	"file_name" => "Dosya Adı",
	"size" => "Boyut",
	"last_changed" => "Son Değişiklik",
	"total_used_space" => "Toplam Kullanılan Alan",
	"free_space" => "Boş Alan",
	"password" => "Parola",
	"upload" => "Yükle",
	"failed_upload" => "Dosya yüklemesi başarısız!",
	"failed_move" => "Dosyanın doğru klasöre taşınması başarısız!",
	"wrong_password" => "Hatalı Parola",
	"make_directory" => "Yeni Klasör",
	"new_dir_failed" => "Klasör oluşturma başarısız",
	"chmod_dir_failed" => "Klasör izinleri değiştirme başarısız",
	"unable_to_read_dir" => "Klasör okunamadı",
	"location" => "Konum",
	"root" => "Ana Klasör",
	"log_file_permission_error" => "Log dosyası oluşturulurken yetersiz izin hatası.",
	"upload_not_allowed" => "Konfigürasyon bu klasöre dosya yüklemeye izin vermiyor.",
	"upload_dir_not_writable" => "Bu klasör yazma izinlerine sahip değil.",
	"mobile_version" => "Mobil Görünüm",
	"standard_version" => "Standart Görünüm",
	"page_load_time" => "Sayfa yükleme süresi %.2f ms",
	"wrong_pass" => "Hatalı kullanıcı adı veya parola",
	"username" => "Kullanıcı Adı",
	"log_in" => "Giriş Yap",
	"upload_type_not_allowed" => "Bu dosya türünün yüklenmesine izin verilmiyor.",
	"del" => "Sil",
	"log_out" => "Çıkış Yap"
);

// 简体中文(Simplified Chinese)
$_TRANSLATIONS["zh_CN"] = array(
	"file_name" => "文件名",
	"size" => "大小",
	"last_changed" => "最后修改",
	"total_used_space" => "总计使用空间",
	"free_space" => "剩余空间",
	"password" => "密码",
	"upload" => "上传",
	"failed_upload" => "上传失败",
	"failed_move" => "移动失败",
	"wrong_password" => "密码错误",
	"make_directory" => "创建目录",
	"new_dir_failed" => "创建目录失败",
	"chmod_dir_failed" => "修改目录权限失败",
	"unable_to_read_dir" => "无法读取目录",
	"location" => "路径",
	"root" => "根目录",
	"log_file_permission_error" => "日志文件权限错误",
	"upload_not_allowed" => "禁止上传",
	"upload_dir_not_writable" => "上传目录不可写",
	"mobile_version" => "移动版本",
	"standard_version" => "标准版本",
	"page_load_time" => "页面载入时间：%.2f ms",
	"wrong_pass" => "密码错误",
	"username" => "用户名",
	"log_in" => "登录",
	"log_out" => "注销",
	"upload_type_not_allowed" => "禁止上传该文件类型",
	"del" => "删除"
);

/***************************************************************************/
/*   CSS FOR TWEAKING THE DESIGN                                           */
/***************************************************************************/


function css()
{
?>
<style type="text/css">

/* General styles */

BODY {
	background-color:#000010;
	font-size:small;
}

A {
	color: #000000;
}


#top {
	width:100%;
	padding-bottom: 20px;
}

#top span, #top a, #top a:hover{
	font-weight:bold;
	font-size:large;
}

#top span {
    display:block;
padding:20px 0 0 0;
}

#frame {
	border: 5px solid #99b;
    text-align:left;
    padding: 5px;
    background: #eef;
	position: relative;
	margin: 0 auto;
	overflow:hidden;
}

#error {
	background-color:#FFE4E1;
	color:#000000;
	padding:7pt;
	position: relative;
	margin: 10pt auto;
	text-align:center;
	border: 1px dotted #CDD2D6;
}

input {
	border: 1px solid #CDD2D6;
}

.bar{
	width:100%;
	clear:both;
	height:1px;
}

/* File list */

table.table {
	width:100%;
	border-collapse: collapse;
	table-layout: fixed;
	word-wrap: break-word;
}

table.table td{
	padding:3px;
}


table.table tr.row td.icon {
	width:25px;
	padding-top:3px;
	padding-bottom:1px;
}

table.table td.del {
	width:25px;
}

table.table tr.row td.size {
	width: 100px;
	text-align: right;
}

table.table tr.row td.changed {
	width: 150px;
	text-align: center;
}

table.table tr.header img {
	vertical-align:bottom;
}

table img{
	border:0;
}

/* Info area */

#info {
    color:#000000;
background: #eef;
    border: 5px solid #99b;
	position: relative;
    margin: 0 auto;
    margin-top: 5px;
padding: 5px;
	text-align:center;
}

/* Thumbnail area */

#thumb {
	position:absolute;
	border: 1px solid #CDD2D6;
	background:#f8f9fa;
	display:none;
	padding:3px;
}

#thumb img {
	display:block;
}

/* Login bar (at the bottom of the page) */
#login_bar {
	margin: 0 auto;
	margin-top:2px;
}

#login_bar input.submit{
	float:right;
}

/* Upload area */

#upload {
	margin: 0 auto;
	margin-top:2px;
}

#upload #password_container {
	margin-right:20px;
}

#upload #newdir_container, #upload #password_container {
	float:left;
}

#upload #upload_container{
	float:right;
}

#upload input.upload_dirname, #upload input.upload_password{
	width:140px;
}

#upload input.upload_file{
	font-size:small;
}

/* Breadcrumbs */

div.breadcrumbs {
	display:block;
	padding:1px 3px;
	font-size:x-small;
}

div.breadcrumbs a{
	display:inline-block;
	color:#222;
	padding:2px 0;
	font-size:small;
}
div.breadcrumbs a::before {
    content: "/";
    display: inline-block;
    margin-right: 1px;
    color: #555;
}

/* Login area */

#login {
	text-align:right;
	margin:15px auto 50px auto;
}

#login div {
	display:block;
	width:100%;
	margin-top:5px;
}

#login label{
	width: 120px;
	text-align: right;
}

/* Mobile interface */

body.mobile #frame, body.mobile #info, body.mobile #upload {
	max-width:none;
}

body.mobile {
	font-size:medium;
}

body.mobile a.item {
	display:block;
	padding:10px 0;
}

body.mobile a.item span.size {
	float:right;
	margin-left:10px;
}

body.mobile table.table {
	margin-bottom:30px;
}

body.mobile table.table tr td {
	border-top: 1px solid #CDD2D6;
}

body.mobile table.table tr.last td {
	border-bottom: 1px solid #CDD2D6;
}

body.mobile #top {
	padding-bottom:3px;
}

body.mobile #top a {
	padding-top:3px;
}

body.mobile #upload #password_container, body.mobile #upload #upload_container, body.mobile #upload #newdir_container {
	float:none;
	margin-top:5px;
}

body.mobile #upload input.upload_dirname, body.mobile #upload input.upload_password{
	width:240px;
}

body.mobile #upload {
	margin-bottom:15px;
}

</style>

<?php
}

/***************************************************************************/
/*   IMAGE CODES IN BASE64                                                 */
/*   You can generate your own with a converter                            */
/*   Like here: http://www.motobit.com/util/base64-decoder-encoder.asp     */
/*   Or here: http://www.greywyvern.com/code/php/binary2base64             */
/*   Or just use PHP base64_encode() function                              */
/***************************************************************************/


$_IMAGES = array();

$_IMAGES["arrow_down"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABbSURBVCjPY/jPgB8yDCkFB/7v+r/5/+r/
i/7P+N/3DYuC7V93/d//fydQ0Zz/9eexKFgtsejLiv8b/8/8X/WtUBGrGyZLdH6f8r/sW64cTkdW
SRS+zpQbgiEJAI4UCqdRg1A6AAAAAElFTkSuQmCC";
$_IMAGES["arrow_up"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABbSURBVCjPY/jPgB8yDDkFmyVWv14kh1PB
eoll31f/n/ytUw6rgtUSi76s+L/x/8z/Vd8KFbEomPt16f/1/1f+X/S/7X/qeSwK+v63/K/6X/g/
83/S/5hvQywkAdMGCdCoabZeAAAAAElFTkSuQmCC";


$_IMAGES["wad"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAByUlEQVQ4y42Tu4oTURjHf+eSIUWaNLFxWU0bi4BIWIt9gzzAsnZZBGFJJD7HFIFJIDY24gMYyBuIURERBEknik2qIEMyYc7FYmdmk028/OHAx/lu/+8muMJt4Bag+DsWwHfA3VTcT5JkmaapNcb4Qy9JEh9F0QC4A8jcMc94VK1WL5vNprDWkr/hcEij0SCOYyqVCsfHx616vS6n0+lX4BfgAUS73faz2cyHYeg3m41fr9c+DMPib7FYeGOMX61WPo5jPx6PcybXVHJEUcRoNNr5E0IAEAQB5XKZTqfTBWqA0NuGJy+fF/LbR48LOQgClsslzjmMMdRqtUJXBIgvzgmUREtZBHuTG2mNEAJrLUrtDkq22213Mf9Mah2pdZyezXn4ac7p2bxgpJRCa43WmlKptBNAAxjvkc79cfhSyqIPN6EBUuMQGbPXL+4S3JMErySI6yZ671FK4b3fbXA2Rnf+5SMlpfj25OmOQbfbLZxcxjIrpwV8kACTyaT18/IZqb0y6Pf7e855KVLKfQbAA2PMu8FgUCh6vd4e3e29yBlsB5hRVP1POK31CfBeZvvsrLXrQ1d2yNlauwIsWxmPsnOW/8nAZqf94zd8F91WqTGsoAAAAABJRU5ErkJggg==";
$_IMAGES["zip"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJmSURBVDjLhZNNS5RRGIav8+HMvDNO5ZhO
YqXQF2FgVNRCCKM2EbQ1ok2b/AG16F/0ge5qUwitghbWooikiIhI3AQVFER+VsyMztg7vuecp4U2
ORH5wLM5cK7n5r65lYgAoJTaDhQBw/9nAfgiIgEAEWENcjiO43KSJN45J//aOI5lZGTkBtALaBFp
AhxNksRXq1Wp1WqNrVQqUiqVZH5+XpxzMjs7K6Ojow2Imri9Z1Dntjwo2dObZr7vpKXFoDVAwFpN
vR6za9du+vr6KRQKrKysEEJgbGzs5vDw8DX1/N6Rrx0HOrpfvOqnWs0CCgQkaJTJEkIAHENDFygW
i01mWGuP2Vw+KnT3djPUM0eLzZO4L6ikztQz6Dl2i4ePxgk+IYoylMtlQgg45+js7FyFKKUk/llh
evplg9zTtR8RC0AmSlGtrGCMxVqF9x5j/gRlRQLZbIbt3fvW4lwmpS0IhCA4FwgEjDForVFK/Ta9
oYDa8jdmpt83Hndu86DaEQkgHgkBrXXT5QaA4FuiqI3itl4IPzHWk7G5NQUBQgISUEoBYIxpVlAr
le9+fCbntFY6qM2Z4BOWazFzS13UPrwjlUqzuFhtXF9NZZ0Cn7hLc59mrly+/uPQ+OO3T+6PP8W7
OpH1fJ6cpLU1hUsSphcqRLlNFHK6GXD84nuvlCoDS1FrgZn28+T5zom933jzeoKpyZeY9oPceOJp
z1e4erbtLw/WTTBZWVpaVNmcYuvWDk6eOsPAwCCLseHOpCOfNg0vgACg1rXxSL1enzDGZAC9QSOD
9345nU4PrgfsWKvzRp9/jwcWfgF7VEKXfHY5kwAAAABJRU5ErkJggg==";
$_IMAGES["directory"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGrSURBVDjLxZO7ihRBFIa/6u0ZW7GHBUV0
UQQTZzd3QdhMQxOfwMRXEANBMNQX0MzAzFAwEzHwARbNFDdwEd31Mj3X7a6uOr9BtzNjYjKBJ6ni
cP7v3KqcJFaxhBVtZUAK8OHlld2st7Xl3DJPVONP+zEUV4HqL5UDYHr5xvuQAjgl/Qs7TzvOOVAj
xjlC+ePSwe6DfbVegLVuT4r14eTr6zvA8xSAoBLzx6pvj4l+DZIezuVkG9fY2H7YRQIMZIBwycmz
H1/s3F8AapfIPNF3kQk7+kw9PWBy+IZOdg5Ug3mkAATy/t0usovzGeCUWTjCz0B+Sj0ekfdvkZ3a
bBv+U4GaCtJ1iEm6ANQJ6fEzrG/engcKw/wXQvEKxSEKQxRGKE7Izt+DSiwBJMUSm71rguMYhQKr
BygOIRStf4TiFFRBvbRGKiQLWP29yRSHKBTtfdBmHs0BUpgvtgF4yRFR+NUKi0XZcYjCeCG2smkz
LAHkbRBmP0/Uk26O5YnUActBp1GsAI+S5nRJJJal5K1aAMrq0d6Tm9uI6zjyf75dAe6tx/SsWeD/
/o2/Ab6IH3/h25pOAAAAAElFTkSuQmCC";
$_IMAGES["webp"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGWSURBVBgZpcE/a1NhGMbh3/OeN56cKq2D
p6AoCOKmk4uCn8DNycEOIojilr2TaBfRzVnESQR3Bz+FFDoWA2IjtkRqmpyc97k9qYl/IQV7XSaJ
w4g0VlZfP0m13dwepPbuiH85fyhyWCx4/ubxjU6kkdxWHt69VC6XpZlFBAhwJgwJJHAmRKorbj94
ewvoRBrbuykvT5R2/+lLTp05Tp45STmEJYJBMAjByILxYeM9jzr3GCczGpHGYAQhRM6fO8uFy1fJ
QoaUwCKYEcwwC4QQaGUBd36KTDmQ523axTGQmEcIEBORKQfG1ZDxcA/MkBxXwj1ggCQyS9TVAMmZ
iUxJ8Ln/kS+9PmOvcSW+jrao0mmMH5bzHfa+9UGBmciUBJ+2Fmh1h+yTQCXSkJkdCrpd8btIwwEJ
QnaEkOXMk7XaiF8CUxL/JdKQOwb0Ntc5SG9zHXQNd/ZFGsaEeLa2ChjzXQcqZiKNxSL0vR4unVww
MENMCATib0ZdV+QtE41I42geXt1Ze3dlMNZFdw6Ut6CIvKBhkjiM79Pyq1YUmtkKAAAAAElFTkSu
QmCC";
$_IMAGES["unknown"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAC4SURBVCjPdZFbDsIgEEWnrsMm7oGGfZro
hxvU+Iq1TyjU60Bf1pac4Yc5YS4ZAtGWBMk/drQBOVwJlZrWYkLhsB8UV9K0BUrPGy9cWbng2CtE
EUmLGppPjRwpbixUKHBiZRS0p+ZGhvs4irNEvWD8heHpbsyDXznPhYFOyTjJc13olIqzZCHBouE0
FRMUjA+s1gTjaRgVFpqRwC8mfoXPPEVPS7LbRaJL2y7bOifRCTEli3U7BMWgLzKlW/CuebZPAAAA
AElFTkSuQmCC";
$_IMAGES["html"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJwSURBVDjLjZPdT1JhHMetvyO3/gfLKy+6
8bLV2qIAq7UyG6IrdRPL5hs2U5FR0MJIAqZlh7BVViI1kkyyiPkCyUtztQYTYbwJE8W+Pc8pjofK
1dk+OxfP+X3O83srAVBCIc8eQhmh/B/sJezm4niCsvX19cTm5uZWPp/H3yDnUKvVKr6ELyinwWtr
a8hkMhzJZBLxeBwrKyusJBwOQ6PRcJJC8K4DJ/dXM04DOswNqNOLybsRo9N6LCy7kUgkEIlEWEE2
mwX9iVar/Smhglqd8IREKwya3qhg809gPLgI/XsrOp/IcXVMhqnFSayurv6RElsT6ZCoov5u1fzU
VwvcKRdefVuEKRCA3OFHv2MOxtlBdFuaMf/ZhWg0yt4kFAoVCZS3Hd1gkpOwRt9h0LOES3YvamzP
cdF7A6rlPrSbpbhP0kmlUmw9YrHYtoDku2T6pEZ/2ICXEQ8kTz+g2TkNceAKKv2nIHachn6qBx1M
I5t/Op1mRXzBd31AiRafBp1vZyEcceGCzQ6p24yjEzocGT6LUacS0iExcrkcK6Fsp6AXLRnmFOjy
PMIZixPHmAAOGxZQec2OQyo7zpm6cNN6GZ2kK1RAofPAr8GA4oUMrdNNkIw/wPFhDwSjX3Dwlg0C
Qy96HreiTlcFZsaAjY0NNvh3QUXtHeHcoKMNA7NjqLd8xHmzDzXDRvRO1KHtngTyhzL4SHeooAAn
KMxBtUYQbGWa0Dc+AsWzSVy3qkjeItLCFsz4XoNMaRFFAm4SyTXbmQa2YHQSGacR/pAXO+zGFif4
JdlHCpShBzstEz+YfJtmt5cnKKWS/1jnAnT1S38AGTynUFUTzJcAAAAASUVORK5CYII=";
$_IMAGES["txt"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0
U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADoSURBVBgZBcExblNBGAbA2ceegTRBuIKO
giihSZNTcC5LUHAihNJR0kGKCDcYJY6D3/77MdOinTvzAgCw8ysThIvn/VojIyMjIyPP+bS1sUQI
V2s95pBDDvmbP/mdkft83tpYguZq5Jh/OeaYh+yzy8hTHvNlaxNNczm+la9OTlar1UdA/+C2A4tr
RCnD3jS8BB1obq2Gk6GU6QbQAS4BUaYSQAf4bhhKKTFdAzrAOwAxEUAH+KEM01SY3gM6wBsEAQB0
gJ+maZoC3gI6iPYaAIBJsiRmHU0AALOeFC3aK2cWAACUXe7+AwO0lc9eTHYTAAAAAElFTkSuQmCC";

/***************************************************************************/
/*   HERE COMES THE CODE.                                                  */
/*   DON'T CHANGE UNLESS YOU KNOW WHAT YOU ARE DOING ;)                    */
/***************************************************************************/

//
// The class that displays images (icons and thumbnails)
//
class ImageServer
{
	//
	// Checks if an image is requested and displays one if needed
	//
	public static function showImage()
	{
		global $_IMAGES;
		if(isset($_GET['img']))
		{
			$mtime = gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME']));
			$etag = md5($mtime.$_SERVER['SCRIPT_FILENAME']);

			if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $mtime)
				|| (isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $etag))
			{
				header('HTTP/1.1 304 Not Modified');
				return true;
			}
			else {
				header('ETag: "'.$etag.'"');
				header('Last-Modified: '.$mtime);
				header('Content-type: image/gif');
				if(is_scalar($_GET['img']) && strlen($_GET['img']) > 0 && isset($_IMAGES[$_GET['img']]))
					print base64_decode($_IMAGES[$_GET['img']]);
				else
					print base64_decode($_IMAGES["unknown"]);
			}
			return true;
		}
		else if(isset($_GET['thumb']))
		{
			if(is_scalar($_GET['thumb']) && strlen($_GET['thumb']) > 0 && EncodeExplorer::getConfig('thumbnails') == true)
			{
				ImageServer::showThumbnail($_GET['thumb']);
			}
			return true;
		}
		return false;
	}

	public static function isEnabledPdf()
	{
		if(class_exists("Imagick"))
			return true;
		return false;
	}

	public static function openPdf($file)
	{
		if(!ImageServer::isEnabledPdf())
			return null;

		$im = new Imagick($file.'[0]');
		$im->setImageFormat( "png" );
		$str = $im->getImageBlob();
		$im2 = imagecreatefromstring($str);
		return $im2;
	}

	//
	// Creates and returns a thumbnail image object from an image file
	//
	public static function createThumbnail($file)
	{
		if(is_int(EncodeExplorer::getConfig('thumbnails_width')))
			$max_width = EncodeExplorer::getConfig('thumbnails_width');
		else
			$max_width = 200;

		if(is_int(EncodeExplorer::getConfig('thumbnails_height')))
			$max_height = EncodeExplorer::getConfig('thumbnails_height');
		else
			$max_height = 200;

		if(File::isPdfFile($file))
			$image = ImageServer::openPdf($file);
		else
			$image = ImageServer::openImage($file);
		if($image == null)
			return;

		imagealphablending($image, true);
		imagesavealpha($image, true);

		$width = imagesx($image);
		$height = imagesy($image);

		$new_width = $max_width;
		$new_height = $max_height;
		if(($width/$height) > ($new_width/$new_height))
			$new_height = $new_width * ($height / $width);
		else
			$new_width = $new_height * ($width / $height);

		if($new_width >= $width && $new_height >= $height)
		{
			$new_width = $width;
			$new_height = $height;
		}

		$new_image = ImageCreateTrueColor($new_width, $new_height);
		imagealphablending($new_image, true);
		imagesavealpha($new_image, true);
		$trans_colour = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
		imagefill($new_image, 0, 0, $trans_colour);

		imagecopyResampled ($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		return $new_image;
	}

	//
	// Function for displaying the thumbnail.
	// Includes attempts at cacheing it so that generation is minimised.
	//
	public static function showThumbnail($file)
	{
		if(filemtime($file) < filemtime($_SERVER['SCRIPT_FILENAME']))
			$mtime = gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME']));
		else
			$mtime = gmdate('r', filemtime($file));

		$etag = md5($mtime.$file);

		if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $mtime)
			|| (isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $etag))
		{
			header('HTTP/1.1 304 Not Modified');
			return;
		}
		else
		{
			header('ETag: "'.$etag.'"');
			header('Last-Modified: '.$mtime);
			header('Content-Type: image/png');
			$image = ImageServer::createThumbnail($file);
			imagepng($image);
		}
	}

	//
	// A helping function for opening different types of image files
	//
	public static function openImage ($file)
	{
		$size = getimagesize($file);
		switch($size["mime"])
		{
			case "image/jpeg":
				$im = imagecreatefromjpeg($file);
			break;
			case "image/gif":
				$im = imagecreatefromgif($file);
			break;
			case "image/png":
				$im = imagecreatefrompng($file);
			break;
			default:
				$im=null;
			break;
		}
		return $im;
	}
}

//
// The class for logging user activity
//
class Logger
{
	public static function log($message)
	{
		global $encodeExplorer;
		if(strlen(EncodeExplorer::getConfig('log_file')) > 0)
		{
			if(Location::isFileWritable(EncodeExplorer::getConfig('log_file')))
			{
				$message = "[" . date("Y-m-d h:i:s", mktime()) . "] ".$message." (".$_SERVER["HTTP_USER_AGENT"].")\n";
				error_log($message, 3, EncodeExplorer::getConfig('log_file'));
			}
			else
				$encodeExplorer->setErrorString("log_file_permission_error");
		}
	}

	public static function logAccess($path, $isDir)
	{
		$message = $_SERVER['REMOTE_ADDR']." ".GateKeeper::getUserName()." accessed ";
		$message .= $isDir?"dir":"file";
		$message .= " ".$path;
		Logger::log($message);
	}

	public static function logQuery()
	{
		if(isset($_POST['log']) && strlen($_POST['log']) > 0)
		{
			Logger::logAccess($_POST['log'], false);
			return true;
		}
		else
			return false;
	}

	public static function logCreation($path, $isDir)
	{
		$message = $_SERVER['REMOTE_ADDR']." ".GateKeeper::getUserName()." created ";
		$message .= $isDir?"dir":"file";
		$message .= " ".$path;
		Logger::log($message);
	}

	public static function emailNotification($path, $isFile)
	{
		if(strlen(EncodeExplorer::getConfig('upload_email')) > 0)
		{
			$message = "This is a message to let you know that ".GateKeeper::getUserName()." ";
			$message .= ($isFile?"uploaded a new file":"created a new directory")." in Encode Explorer.\n\n";
			$message .= "Path : ".$path."\n";
			$message .= "IP : ".$_SERVER['REMOTE_ADDR']."\n";
			mail(EncodeExplorer::getConfig('upload_email'), "Upload notification", $message);
		}
	}
}

//
// The class controls logging in and authentication
//
class GateKeeper
{
	public static function init()
	{
		global $encodeExplorer;
		if(strlen(EncodeExplorer::getConfig("session_name")) > 0)
				session_name(EncodeExplorer::getConfig("session_name"));

		if(count(EncodeExplorer::getConfig("users")) > 0)
			session_start();
		else
			return;

		if(isset($_GET['logout']))
		{
			$_SESSION['ee_user_name'] = null;
			$_SESSION['ee_user_pass'] = null;
		}

		if(isset($_POST['user_pass']) && strlen($_POST['user_pass']) > 0)
		{
			if(GateKeeper::isUser((isset($_POST['user_name'])?$_POST['user_name']:""), $_POST['user_pass']))
			{
				$_SESSION['ee_user_name'] = isset($_POST['user_name'])?$_POST['user_name']:"";
				$_SESSION['ee_user_pass'] = $_POST['user_pass'];

				$addr  = $_SERVER['PHP_SELF'];
				$param = '';

				if(isset($_GET['m']))
					$param .= (strlen($param) == 0 ? '?m' : '&m');

				if(isset($_GET['s']))
					$param .= (strlen($param) == 0 ? '?s' : '&s');

				if(isset($_GET['dir']) && strlen($_GET['dir']) > 0)
				{
					$param .= (strlen($param) == 0 ? '?dir=' : '&dir=');
					$param .= urlencode($_GET['dir']);
				}
				header( "Location: ".$addr.$param);
			}
			else
				$encodeExplorer->setErrorString("wrong_pass");
		}
	}

	public static function isUser($userName, $userPass)
	{
		foreach(EncodeExplorer::getConfig("users") as $user)
		{
			if($user[1] == $userPass)
			{
				if(strlen($userName) == 0 || $userName == $user[0])
				{
					return true;
				}
			}
		}
		return false;
	}

	public static function isLoginRequired()
	{
		if(EncodeExplorer::getConfig("require_login") == false){
			return false;
		}
		return true;
	}

	public static function isUserLoggedIn()
	{
		if(isset($_SESSION['ee_user_name'], $_SESSION['ee_user_pass']))
		{
			if(GateKeeper::isUser($_SESSION['ee_user_name'], $_SESSION['ee_user_pass']))
				return true;
		}
		return false;
	}

	public static function isAccessAllowed()
	{
		if(!GateKeeper::isLoginRequired() || GateKeeper::isUserLoggedIn())
			return true;
		return false;
	}

	public static function isUploadAllowed(){
		if(EncodeExplorer::getConfig("upload_enable") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function isNewdirAllowed(){
		if(EncodeExplorer::getConfig("newdir_enable") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function isDeleteAllowed(){
		if(EncodeExplorer::getConfig("delete_enable") == true && GateKeeper::isUserLoggedIn() == true && GateKeeper::getUserStatus() == "admin")
			return true;
		return false;
	}

	public static function getUserStatus(){
		if(GateKeeper::isUserLoggedIn() == true && EncodeExplorer::getConfig("users") != null && is_array(EncodeExplorer::getConfig("users"))){
			foreach(EncodeExplorer::getConfig("users") as $user){
				if($user[0] != null && $user[0] == $_SESSION['ee_user_name'])
					return $user[2];
			}
		}
		return null;
	}

	public static function getUserName()
	{
		if(GateKeeper::isUserLoggedIn() == true && isset($_SESSION['ee_user_name']) && strlen($_SESSION['ee_user_name']) > 0)
			return $_SESSION['ee_user_name'];
		if(isset($_SERVER["REMOTE_USER"]) && strlen($_SERVER["REMOTE_USER"]) > 0)
			return $_SERVER["REMOTE_USER"];
		if(isset($_SERVER['PHP_AUTH_USER']) && strlen($_SERVER['PHP_AUTH_USER']) > 0)
			return $_SERVER['PHP_AUTH_USER'];
		return "an anonymous user";
	}

	public static function showLoginBox(){
		if(!GateKeeper::isUserLoggedIn() && count(EncodeExplorer::getConfig("users")) > 0)
			return true;
		return false;
	}
}

//
// The class for any kind of file managing (new folder, upload, etc).
//
class FileManager
{
	/* Obsolete code
	function checkPassword($inputPassword)
	{
		global $encodeExplorer;
		if(strlen(EncodeExplorer::getConfig("upload_password")) > 0 && $inputPassword == EncodeExplorer::getConfig("upload_password"))
		{
			return true;
		}
		else
		{
			$encodeExplorer->setErrorString("wrong_password");
			return false;
		}
	}
	*/
	function newFolder($location, $dirname)
	{
		global $encodeExplorer;
		if(strlen($dirname) > 0)
		{
			$forbidden = array(".", "/", "\\");
			for($i = 0; $i < count($forbidden); $i++)
			{
				$dirname = str_replace($forbidden[$i], "", $dirname);
			}

			if(!$location->uploadAllowed())
			{
				// The system configuration does not allow uploading here
				$encodeExplorer->setErrorString("upload_not_allowed");
			}
			else if(!$location->isWritable())
			{
				// The target directory is not writable
				$encodeExplorer->setErrorString("upload_dir_not_writable");
			}
			else if(!mkdir($location->getDir(true, false, false, 0).$dirname, EncodeExplorer::getConfig("new_dir_mode")))
			{
				// Error creating a new directory
				$encodeExplorer->setErrorString("new_dir_failed");
			}
			else if(!chmod($location->getDir(true, false, false, 0).$dirname, EncodeExplorer::getConfig("new_dir_mode")))
			{
				// Error applying chmod
				$encodeExplorer->setErrorString("chmod_dir_failed");
			}
			else
			{
				// Directory successfully created, sending e-mail notification
				Logger::logCreation($location->getDir(true, false, false, 0).$dirname, true);
				Logger::emailNotification($location->getDir(true, false, false, 0).$dirname, false);
			}
		}
	}

	function uploadFile($location, $userfile)
	{
		global $encodeExplorer;
		$name = basename($userfile['name']);

		$upload_dir = $location->getFullPath();
		$upload_file = $upload_dir . $name;

		if(function_exists("finfo_open") && function_exists("finfo_file"))
			$mime_type = File::getFileMime($userfile['tmp_name']);
		else
			$mime_type = $userfile['type'];

		$extension = File::getFileExtension($userfile['name']);

		if(!$location->uploadAllowed())
		{
			$encodeExplorer->setErrorString("upload_not_allowed");
		}
		else if(!$location->isWritable())
		{
			$encodeExplorer->setErrorString("upload_dir_not_writable");
		}
		else if(!is_uploaded_file($userfile['tmp_name']))
		{
			$encodeExplorer->setErrorString("failed_upload");
		}
		else if(is_array(EncodeExplorer::getConfig("upload_allow_type")) && count(EncodeExplorer::getConfig("upload_allow_type")) > 0 && !in_array($mime_type, EncodeExplorer::getConfig("upload_allow_type")))
		{
			$encodeExplorer->setErrorString("upload_type_not_allowed");
		}
		else if(is_array(EncodeExplorer::getConfig("upload_reject_extension")) && count(EncodeExplorer::getConfig("upload_reject_extension")) > 0 && in_array($extension, EncodeExplorer::getConfig("upload_reject_extension")))
		{
			$encodeExplorer->setErrorString("upload_type_not_allowed");
		}
		else if(!@move_uploaded_file($userfile['tmp_name'], $upload_file))
		{
			$encodeExplorer->setErrorString("failed_move");
		}
		else
		{
			chmod($upload_file, EncodeExplorer::getConfig("upload_file_mode"));
			Logger::logCreation($location->getDir(true, false, false, 0).$name, false);
			Logger::emailNotification($location->getDir(true, false, false, 0).$name, true);
		}
	}

	public static function delete_dir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir")
						FileManager::delete_dir($dir."/".$object);
					else
						unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

	public static function delete_file($file){
		if(is_file($file)){
			unlink($file);
		}
	}

	//
	// The main function, checks if the user wants to perform any supported operations
	//
	function run($location)
	{
		if(isset($_POST['userdir']) && strlen($_POST['userdir']) > 0){
			if($location->uploadAllowed() && GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isNewdirAllowed()){
				$this->newFolder($location, $_POST['userdir']);
			}
		}

		if(isset($_FILES['userfile']['name']) && strlen($_FILES['userfile']['name']) > 0){
			if($location->uploadAllowed() && GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isUploadAllowed()){
				$this->uploadFile($location, $_FILES['userfile']);
			}
		}

		if(isset($_GET['del'])){
			if(GateKeeper::isUserLoggedIn() && GateKeeper::isAccessAllowed() && GateKeeper::isDeleteAllowed()){
				$split_path = Location::splitPath($_GET['del']);
				$path = "";
				for($i = 0; $i < count($split_path); $i++){
					$path .= $split_path[$i];
					if($i + 1 < count($split_path))
						$path .= "/";
				}
				if($path == "" || $path == "/" || $path == "\\" || $path == ".")
					return;

				if(is_dir($path))
					FileManager::delete_dir($path);
				else if(is_file($path))
					FileManager::delete_file($path);
			}
		}
	}
}

//
// Dir class holds the information about one directory in the list
//
class Dir
{
	var $name;
	var $location;
	var $modTime;

	//
	// Constructor
	//
	function __construct($name, $location)
	{
		$this->name = $name;
		$this->location = $location;

		$this->modTime = filemtime($this->location->getDir(true, false, false, 0).$this->getName());
	}

	function getName()
	{
		return $this->name;
	}

	function getNameHtml()
	{
		return htmlspecialchars($this->name);
	}

	function getNameEncoded()
	{
		return rawurlencode($this->name);
	}

	function getModTime()
	{
		return $this->modTime;
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("Dir name (htmlspecialchars): ".$this->getName()."\n");
		print("Dir location: ".$this->location->getDir(true, false, false, 0)."\n");
		print("Dir modTime: ".$this->modTime."\n");
	}
}

//
// File class holds the information about one file in the list
//
class File
{
	var $name;
	var $location;
	var $size;
	//var $extension;
	var $type;
	var $modTime;

	//
	// Constructor
	//
	function __construct($name, $location)
	{
		$this->name = $name;
		$this->location = $location;

		$this->type = File::getFileType($this->location->getDir(true, false, false, 0).$this->getName());
		$this->size = File::getFileSize($this->location->getDir(true, false, false, 0).$this->getName());
		$this->modTime = filemtime($this->location->getDir(true, false, false, 0).$this->getName());
	}

	function getName()
	{
		return $this->name;
	}

	function getNameEncoded()
	{
		return rawurlencode($this->name);
	}

	function getNameHtml()
	{
		return htmlspecialchars($this->name);
	}

	function getSize()
	{
		return $this->size;
	}

	function getType()
	{
		return $this->type;
	}

	function getModTime()
	{
		return $this->modTime;
	}

	//
	// Determine the size of a file
	//
	public static function getFileSize($file)
	{
		$sizeInBytes = filesize($file);

		// If filesize() fails (with larger files), try to get the size from unix command line.
		if (EncodeExplorer::getConfig("large_files") == true || !$sizeInBytes || $sizeInBytes < 0) {
			$sizeInBytes=exec("ls -l '$file' | awk '{print $5}'");
		}
		return $sizeInBytes;
	}

	public static function getFileType($filepath)
	{
		/*
		 * This extracts the information from the file contents.
		 * Unfortunately it doesn't properly detect the difference between text-based file types.
		 *
		$mime_type = File::getMimeType($filepath);
		$mime_type_chunks = explode("/", $mime_type, 2);
		$type = $mime_type_chunks[1];
		*/
		return File::getFileExtension($filepath);
	}

	public static function getFileMime($filepath)
	{
		$fhandle = finfo_open(FILEINFO_MIME);
		$mime_type = finfo_file($fhandle, $filepath);
		$mime_type_chunks = preg_split('/\s+/', $mime_type);
		$mime_type = $mime_type_chunks[0];
		$mime_type_chunks = explode(";", $mime_type);
		$mime_type = $mime_type_chunks[0];
		return $mime_type;
	}

	public static function getFileExtension($filepath)
	{
		return strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("File name: ".$this->getName()."\n");
		print("File location: ".$this->location->getDir(true, false, false, 0)."\n");
		print("File size: ".$this->size."\n");
		print("File modTime: ".$this->modTime."\n");
	}

	function isImage()
	{
		$type = $this->getType();
		if($type == "png" || $type == "jpg" || $type == "gif" || $type == "jpeg")
			return true;
		return false;
	}

	function isPdf()
	{
		if(strtolower($this->getType()) == "pdf")
			return true;
		return false;
	}

	public static function isPdfFile($file)
	{
		if(File::getFileType($file) == "pdf")
			return true;
		return false;
	}

	function isValidForThumb()
	{
		if($this->isImage() || ($this->isPdf() && ImageServer::isEnabledPdf()))
			return true;
		return false;
	}
}

class Location
{
	var $path;

	//
	// Split a file path into array elements
	//
	public static function splitPath($dir)
	{
		$dir = stripslashes($dir);
		$path1 = preg_split("/[\\\\\/]+/", $dir);
		$path2 = array();
		for($i = 0; $i < count($path1); $i++)
		{
			if($path1[$i] == ".." || $path1[$i] == "." || $path1[$i] == "")
				continue;
			$path2[] = $path1[$i];
		}
		return $path2;
	}

	//
	// Get the current directory.
	// Options: Include the prefix ("./"); URL-encode the string; HTML-encode the string; return directory n-levels up
	//
	function getDir($prefix, $encoded, $html, $up)
	{
		$dir = "";
		if($prefix == true)
			$dir .= "./";
		for($i = 0; $i < ((count($this->path) >= $up && $up > 0)?count($this->path)-$up:count($this->path)); $i++)
		{
			$temp = $this->path[$i];
			if($encoded)
				$temp = rawurlencode($temp);
			if($html)
				$temp = htmlspecialchars($temp);
			$dir .= $temp."/";
		}
		return $dir;
	}

	function getPathLink($i, $html)
	{
		if($html)
			return htmlspecialchars($this->path[$i]);
		else
			return $this->path[$i];
	}

	function getFullPath()
	{
		return (strlen(EncodeExplorer::getConfig('basedir')) > 0?EncodeExplorer::getConfig('basedir'):dirname($_SERVER['SCRIPT_FILENAME']))."/".$this->getDir(true, false, false, 0);
	}

	//
	// Debugging output
	//
	function debug()
	{
		print_r($this->path);
		print("Dir with prefix: ".$this->getDir(true, false, false, 0)."\n");
		print("Dir without prefix: ".$this->getDir(false, false, false, 0)."\n");
		print("Upper dir with prefix: ".$this->getDir(true, false, false, 1)."\n");
		print("Upper dir without prefix: ".$this->getDir(false, false, false, 1)."\n");
	}


	//
	// Set the current directory
	//
	function init()
	{
		if(!isset($_GET['dir']) || !is_scalar($_GET['dir']) || strlen($_GET['dir']) == 0)
		{
			$this->path = $this->splitPath(EncodeExplorer::getConfig('starting_dir'));
		}
		else
		{
			$this->path = $this->splitPath($_GET['dir']);
		}
	}

	//
	// Checks if the current directory is below the input path
	//
	function isSubDir($checkPath)
	{
		for($i = 0; $i < count($this->path); $i++)
		{
			if(strcmp($this->getDir(true, false, false, $i), $checkPath) == 0)
				return true;
		}
		return false;
	}

	//
	// Check if uploading is allowed into the current directory, based on the configuration
	//
	function uploadAllowed()
	{
		if(EncodeExplorer::getConfig('upload_enable') != true)
			return false;
		if(EncodeExplorer::getConfig('upload_dirs') == null || count(EncodeExplorer::getConfig('upload_dirs')) == 0)
			return true;

		$upload_dirs = EncodeExplorer::getConfig('upload_dirs');
		for($i = 0; $i < count($upload_dirs); $i++)
		{
			if($this->isSubDir($upload_dirs[$i]))
				return true;
		}
		return false;
	}

	function isWritable()
	{
		return is_writable($this->getDir(true, false, false, 0));
	}

	public static function isDirWritable($dir)
	{
		return is_writable($dir);
	}

	public static function isFileWritable($file)
	{
		if(file_exists($file))
		{
			if(is_writable($file))
				return true;
			else
				return false;
		}
		else if(Location::isDirWritable(dirname($file)))
			return true;
		else
			return false;
	}
}

class EncodeExplorer
{
	var $location;
	var $dirs;
	var $files;
	var $sort_by;
	var $sort_as;
	var $mobile;
	var $logging;
	var $spaceUsed;
	var $lang;

	//
	// Determine sorting, calculate space.
	//
	function init()
	{
		global $_TRANSLATIONS;

		// Here we filter the comparison function (sort by) and comparison order (sort as) chosen by user
		$this->sort_by = (isset($_GET['sort_by']) && in_array($_GET['sort_by'], array('name', 'size', 'mod'))) ? $_GET['sort_by'] : 'name';
		$this->sort_as = (isset($_GET['sort_as']) && in_array($_GET['sort_as'], array('asc', 'desc'))) ? $_GET['sort_as'] : 'asc';

		// Mitigate date.timezone warning
		if(function_exists('date_default_timezone_get') && function_exists('date_default_timezone_set'))
		{
			@date_default_timezone_set(date_default_timezone_get());
		}

		if(isset($_GET['lang']) && is_scalar($_GET['lang']) && isset($_TRANSLATIONS[$_GET['lang']]))
			$this->lang = $_GET['lang'];
		else
			$this->lang = EncodeExplorer::getConfig("lang");

		$this->mobile = false;
		if(EncodeExplorer::getConfig("mobile_enabled") == true)
		{
			if((EncodeExplorer::getConfig("mobile_default") == true || isset($_GET['m'])) && !isset($_GET['s']))
				$this->mobile = true;
		}

		$this->logging = false;
		if(EncodeExplorer::getConfig("log_file") != null && strlen(EncodeExplorer::getConfig("log_file")) > 0)
			$this->logging = true;
	}

	//
	// Read the file list from the directory
	//
	function readDir()
	{
		global $encodeExplorer;
		//
		// Reading the data of files and directories
		//
		if($open_dir = @opendir($this->location->getFullPath()))
		{
			$this->dirs = array();
			$this->files = array();
			while (false !== ($object = readdir($open_dir)))
			{
				if($object != "." && $object != "..")
				{
					if(is_dir($this->location->getDir(true, false, false, 0)."/".$object))
					{
						if(!in_array($object, EncodeExplorer::getConfig('hidden_dirs')))
							$this->dirs[] = new Dir($object, $this->location);
					}
					else if(!in_array($object, EncodeExplorer::getConfig('hidden_files')))
						$this->files[] = new File($object, $this->location);
				}
			}
			closedir($open_dir);
		}
		else
		{
			$encodeExplorer->setErrorString("unable_to_read_dir");;
		}
	}

	//
	// A recursive function for calculating the total used space
	//
	function sum_dir($start_dir, $ignore_files, $levels = 1)
	{
		if ($dir = opendir($start_dir))
		{
			$total = 0;
			while (false !== ($file = readdir($dir)))
			{
				if (!in_array($file, $ignore_files))
				{
					if ((is_dir($start_dir . '/' . $file)) && ($levels - 1 >= 0))
					{
						$total += $this->sum_dir($start_dir . '/' . $file, $ignore_files, $levels-1);
					}
					elseif (is_file($start_dir . '/' . $file))
					{
						$total += File::getFileSize($start_dir . '/' . $file) / 1024;
					}
				}
			}

			closedir($dir);
			return $total;
		}
	}

	function calculateSpace()
	{
		if(EncodeExplorer::getConfig('calculate_space_level') <= 0)
			return;
		$ignore_files = array('..', '.');
		$start_dir = getcwd();
		$spaceUsed = $this->sum_dir($start_dir, $ignore_files, EncodeExplorer::getConfig('calculate_space_level'));
		$this->spaceUsed = round($spaceUsed/1024, 3);
	}

	function sort()
	{
		// Here we filter the comparison functions supported by our directory object
		$sort_by = in_array($this->sort_by, array('name', 'mod')) ? $this->sort_by : 'name';

		if(is_array($this->dirs)) {
			usort($this->dirs, array('EncodeExplorer', 'cmp_'.$sort_by));
			if($this->sort_as == "desc") {
				$this->dirs = array_reverse($this->dirs);
			}
		}

		// Here we filter the comparison functions supported by our file object
		$sort_by = in_array($this->sort_by, array('name', 'size', 'mod')) ? $this->sort_by : 'name';

		if(is_array($this->files)) {
			usort($this->files, array('EncodeExplorer', 'cmp_'.$sort_by));
			if($this->sort_as == "desc") {
				$this->files = array_reverse($this->files);
			}
		}
	}

	function makeArrow($sort_by)
	{
		// Ability to reverse the 'sort as' selected for the current field
		// And propagate the current selected 'sort as' to the other fields
		$sort_as = ($this->sort_as == "asc") ? "desc" : "asc";
		$sort_as = ($this->sort_by == $sort_by) ? $sort_as : $this->sort_as;

		// Only show image for the currently selected 'sort as' field
		$img = ($this->sort_as == "asc") ? "arrow_up" : "arrow_down";
		$img = ($this->sort_by == $sort_by) ? "<img style=\"border:0;\" alt=\"".$sort_as."\" src=\"?img=".$img."\" />" : "&nbsp;";

		if($sort_by == "name")
			$text = $this->getString("file_name");
		else if($sort_by == "size")
			$text = $this->getString("size");
		else if($sort_by == "mod")
			$text = $this->getString("last_changed");

		return "<a href=\"".$this->makeLink(false, false, $sort_by, $sort_as, null, $this->location->getDir(false, true, false, 0))."\">{$text}{$img}</a>";
	}

	function makeLink($switchVersion, $logout, $sort_by, $sort_as, $delete, $dir)
	{
		$link = "?";
		if($switchVersion == true && EncodeExplorer::getConfig("mobile_enabled") == true)
		{
			if($this->mobile == false)
				$link .= "m&amp;";
			else
				$link .= "s&amp;";
		}
		else if($this->mobile == true && EncodeExplorer::getConfig("mobile_enabled") == true && EncodeExplorer::getConfig("mobile_default") == false)
			$link .= "m&amp;";
		else if($this->mobile == false && EncodeExplorer::getConfig("mobile_enabled") == true && EncodeExplorer::getConfig("mobile_default") == true)
			$link .= "s&amp;";

		if($logout == true)
		{
			$link .= "logout";
			return $link;
		}

		if(isset($this->lang) && $this->lang != EncodeExplorer::getConfig("lang"))
			$link .= "lang=".$this->lang."&amp;";

		if($sort_by != null && strlen($sort_by) > 0)
			$link .= "sort_by=".$sort_by."&amp;";

		if($sort_as != null && strlen($sort_as) > 0)
			$link .= "sort_as=".$sort_as."&amp;";

		$link .= "dir=".$dir;
		if($delete != null)
			$link .= "&amp;del=".$delete;
		return $link;
	}

	function makeIcon($l)
	{
		$l = strtolower($l);
		return "?img=".$l;
	}

	function formatModTime($time)
	{
		$timeformat = "d.m.y H:i:s";
		if(EncodeExplorer::getConfig("time_format") != null && strlen(EncodeExplorer::getConfig("time_format")) > 0)
			$timeformat = EncodeExplorer::getConfig("time_format");
		return date($timeformat, $time);
	}

	function formatSize($size)
	{
		$sizes = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB');
		$y = $sizes[0];
		for ($i = 1; (($i < count($sizes)) && ($size >= 1024)); $i++)
		{
			$size = $size / 1024;
			$y  = $sizes[$i];
		}
		return round($size, 2)." ".$y;
	}

	//
	// Debugging output
	//
	function debug()
	{
		print("Explorer location: ".$this->location->getDir(true, false, false, 0)."\n");
		for($i = 0; $i < count($this->dirs); $i++)
			$this->dirs[$i]->output();
		for($i = 0; $i < count($this->files); $i++)
			$this->files[$i]->output();
	}

	//
	// Comparison functions for sorting.
	//

	public static function cmp_name($a, $b)
	{
		return strnatcasecmp($a->name, $b->name);
	}

	public static function cmp_size($a, $b)
	{
		return ($a->size - $b->size);
	}

	public static function cmp_mod($a, $b)
	{
		return ($a->modTime - $b->modTime);
	}

	//
	// The function for getting a translated string.
	// Falls back to english if the correct language is missing something.
	//
	public static function getLangString($stringName, $lang)
	{
		global $_TRANSLATIONS;
		if(isset($_TRANSLATIONS[$lang]) && is_array($_TRANSLATIONS[$lang])
			&& isset($_TRANSLATIONS[$lang][$stringName]))
			return $_TRANSLATIONS[$lang][$stringName];
		else if(isset($_TRANSLATIONS["en"]))// && is_array($_TRANSLATIONS["en"])
			//&& isset($_TRANSLATIONS["en"][$stringName]))
			return $_TRANSLATIONS["en"][$stringName];
		else
			return "Translation error";
	}

	function getString($stringName)
	{
		return EncodeExplorer::getLangString($stringName, $this->lang);
	}

	//
	// The function for getting configuration values
	//
	public static function getConfig($name)
	{
		global $_CONFIG;
		if(isset($_CONFIG, $_CONFIG[$name]))
			return $_CONFIG[$name];
		return null;
	}

	public static function setError($message)
	{
		global $_ERROR;
		if(isset($_ERROR) && strlen($_ERROR) > 0)
			;// keep the first error and discard the rest
		else
			$_ERROR = $message;
	}

	function setErrorString($stringName)
	{
		EncodeExplorer::setError($this->getString($stringName));
	}

	//
	// Main function, activating tasks
	//
	function run($location)
	{
		$this->location = $location;
		$this->calculateSpace();
		$this->readDir();
		$this->sort();
		$this->outputHtml();
	}

	public function printLoginBox()
	{
		?>
		<div id="login">
		<form enctype="multipart/form-data" action="<?php print $this->makeLink(false, false, null, null, null, ""); ?>" method="post">
		<?php
		if(GateKeeper::isLoginRequired())
		{
			$require_username = false;
			foreach(EncodeExplorer::getConfig("users") as $user){
				if($user[0] != null && strlen($user[0]) > 0){
					$require_username = true;
					break;
				}
			}
			if($require_username)
			{
			?>
			<div><label for="user_name"><?php print $this->getString("username"); ?>:</label>
			<input type="text" name="user_name" value="" id="user_name" /></div>
			<?php
			}
			?>
			<div><label for="user_pass"><?php print $this->getString("password"); ?>:</label>
			<input type="password" name="user_pass" id="user_pass" /></div>
			<div><input type="submit" value="<?php print $this->getString("log_in"); ?>" class="button" /></div>
		</form>
		</div>
	<?php
		}
	}

	//
	// Printing the actual page
	//
	function outputHtml()
	{
		global $_ERROR;
		global $_START_TIME;
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $this->getConfig('lang'); ?>" lang="<?php print $this->getConfig('lang'); ?>">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $this->getConfig('charset'); ?>">
<?php css(); ?>
<!-- <meta charset="<?php print $this->getConfig('charset'); ?>" /> -->
<?php
if(($this->getConfig('log_file') != null && strlen($this->getConfig('log_file')) > 0)
	|| ($this->getConfig('thumbnails') != null && $this->getConfig('thumbnails') == true && $this->mobile == false)
	|| (GateKeeper::isDeleteAllowed()))
{
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
<?php
	if(GateKeeper::isDeleteAllowed()){
?>
	$('td.del a').click(function(){
		var answer = confirm('Are you sure you want to delete : \'' + $(this).attr("data-name") + "\' ?");
		return answer;
	});
<?php
	}
	if($this->logging == true)
	{
?>
		function logFileClick(path)
		{
			 $.ajax({
					async: false,
					type: "POST",
					data: {log: path},
					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
					cache: false
				});
		}

		$("a.file").click(function(){
			logFileClick("<?php print $this->location->getDir(true, true, false, 0);?>" + $(this).html());
			return true;
		});
<?php
	}
	if(EncodeExplorer::getConfig("thumbnails") == true && $this->mobile == false)
	{
?>
		function positionThumbnail(e) {
			xOffset = 30;
			yOffset = 10;
			$("#thumb").css("left",(e.clientX + xOffset) + "px");

			diff = 0;
			if(e.clientY + $("#thumb").height() > $(window).height())
				diff = e.clientY + $("#thumb").height() - $(window).height();

			$("#thumb").css("top",(e.pageY - yOffset - diff) + "px");
		}

		$("a.thumb").hover(function(e){
			$("#thumb").remove();
			$("body").append("<div id=\"thumb\"><img src=\"?thumb="+ $(this).attr("href") +"\" alt=\"Preview\" \/><\/div>");
			positionThumbnail(e);
			$("#thumb").fadeIn("medium");
		},
		function(){
			$("#thumb").remove();
		});

		$("a.thumb").mousemove(function(e){
			positionThumbnail(e);
			});

		$("a.thumb").click(function(e){$("#thumb").remove(); return true;});
<?php
	}
?>
	});
//]]>
</script>
<?php
}
?>
<title><?php if(EncodeExplorer::getConfig('main_title') != null) print EncodeExplorer::getConfig('main_title'); ?></title>
</head>
<body class="<?php print ($this->mobile == true?"mobile":"standard");?>">
<?php
//
// Print the error (if there is something to print)
//
if(isset($_ERROR) && strlen($_ERROR) > 0)
{
	print "<div id=\"error\">".$_ERROR."</div>";
}
?>
<div id="frame">
<?php
if(EncodeExplorer::getConfig('show_top') == true)
{
?>
<div id="top">
	<span><a href="/">WASFDDDDD</a>'s Public Files</span>
<?php
if(EncodeExplorer::getConfig("secondary_titles") != null && is_array(EncodeExplorer::getConfig("secondary_titles")) && count(EncodeExplorer::getConfig("secondary_titles")) > 0 && $this->mobile == false)
{
	$secondary_titles = EncodeExplorer::getConfig("secondary_titles");
	print "<div class=\"subtitle\">".$secondary_titles[array_rand($secondary_titles)]."</div>\n";
}
?>
</div>
<?php
}

// Checking if the user is allowed to access the page, otherwise showing the login box
if(!GateKeeper::isAccessAllowed())
{
	$this->printLoginBox();
}
else
{
if($this->mobile == false && EncodeExplorer::getConfig("show_path") == true)
{
?>
<div class="breadcrumbs">
<a href="?dir=">files</a>
<?php
	for($i = 0; $i < count($this->location->path); $i++)
	{
		print "<a href=\"".$this->makeLink(false, false, null, null, null, $this->location->getDir(false, true, false, count($this->location->path) - $i - 1))."\">";
		print $this->location->getPathLink($i, true);
		print "</a>\n";
	}
?>
</div>
<?php
}
?>

<!-- START: List table -->
<table class="table">
<?php
if($this->mobile == false)
{
?>
<tr class="row one header">
	<td class="icon"> </td>
	<td class="name"><?php print $this->makeArrow("name");?></td>
	<td class="size"><?php print $this->makeArrow("size"); ?></td>
	<td class="changed"><?php print $this->makeArrow("mod"); ?></td>
	<?php if($this->mobile == false && GateKeeper::isDeleteAllowed()){?>
	<td class="del"><?php print EncodeExplorer::getString("del"); ?></td>
	<?php } ?>
</tr>
<?php
}
?>
<tr class="row two">
	<td class="icon"><img alt="dir" src="?img=directory" /></td>
	<td colspan="<?php print (($this->mobile == true?1:(GateKeeper::isDeleteAllowed()?4:3))); ?>" class="long">
		<a class="item" href="<?php print $this->makeLink(false, false, null, null, null, $this->location->getDir(false, true, false, 1)); ?>">..</a>
	</td>
</tr>
<?php
//
// Ready to display folders and files.
//
$row = 1;

//
// Folders first
//
if($this->dirs)
{
	foreach ($this->dirs as $dir)
	{
		$row_style = ($row ? "one" : "two");
		print "<tr class=\"row ".$row_style."\">\n";
		print "<td class=\"icon\"><img alt=\"dir\" src=\"?img=directory\" /></td>\n";
		print "<td class=\"name\" colspan=\"".($this->mobile == true ? 1:2)."\">\n";
		print "<a href=\"".$this->makeLink(false, false, null, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded())."\" class=\"item dir\">";
		print $dir->getNameHtml();
		print "</a>\n";
		print "</td>\n";
		if($this->mobile != true)
		{
			print "<td class=\"changed\">".$this->formatModTime($dir->getModTime())."</td>\n";
		}
		if($this->mobile == false && GateKeeper::isDeleteAllowed())
		{
			print "<td class=\"del\"><a data-name=\"".htmlentities($dir->getName())."\" href=\"".$this->makeLink(false, false, null, null, $this->location->getDir(false, true, false, 0).$dir->getNameEncoded(), $this->location->getDir(false, true, false, 0))."\"><img src=\"?img=del\" alt=\"Delete\" /></a></td>";
		}
		print "</tr>\n";
		$row =! $row;
	}
}

//
// Now the files
//
if($this->files)
{
	$count = 0;
	foreach ($this->files as $file)
	{
		$row_style = ($row ? "one" : "two");
		print "<tr class=\"row ".$row_style.(++$count == count($this->files)?" last":"")."\">\n";
		print "<td class=\"icon\"><img alt=\"".$file->getType()."\" src=\"".$this->makeIcon($file->getType())."\" /></td>\n";
		print "<td class=\"name\" colspan=\"1\">\n";
		print "\t\t<a href=\"".$this->location->getDir(false, true, false, 0).$file->getNameEncoded()."\"";
		if(EncodeExplorer::getConfig('open_in_new_window') == true)
			print "target=\"_blank\"";
		print " class=\"item file";
		if($file->isValidForThumb())
			print " thumb";
		print "\"";
		print "WOOOO".EncodeExplorer::getConfig('force_download');
		if(EncodeExplorer::getConfig('force_download') == true)
			print " download";
		print ">";
		print $file->getNameHtml();
		if($this->mobile == true)
		{
			print "<span class =\"size\">".$this->formatSize($file->getSize())."</span>";
		}
		print "</a>\n";
		print "</td>\n";
		if($this->mobile != true)
		{
			print "<td class=\"size\">".$this->formatSize($file->getSize())."</td>\n";
			print "<td class=\"changed\">".$this->formatModTime($file->getModTime())."</td>\n";
		}
		if($this->mobile == false && GateKeeper::isDeleteAllowed())
		{
			print "<td class=\"del\">
				<a data-name=\"".htmlentities($file->getName())."\" href=\"".$this->makeLink(false, false, null, null, $this->location->getDir(false, true, false, 0).$file->getNameEncoded(), $this->location->getDir(false, true, false, 0))."\">
					<img src=\"?img=del\" alt=\"Delete\" />
				</a>
			</td>";
		}
		print "</tr>\n";
		$row =! $row;
	}
}


//
// The files and folders have been displayed
//
?>

</table>
<!-- END: List table -->
<?php
}
?>
</div>

<?php
if(GateKeeper::isAccessAllowed() && GateKeeper::showLoginBox()){
?>
<!-- START: Login area -->
<form enctype="multipart/form-data" method="post">
	<div id="login_bar">
	<?php print $this->getString("username"); ?>:
	<input type="text" name="user_name" value="" id="user_name" />
	<?php print $this->getString("password"); ?>:
	<input type="password" name="user_pass" id="user_pass" />
	<input type="submit" class="submit" value="<?php print $this->getString("log_in"); ?>" />
	<div class="bar"></div>
	</div>
</form>
<!-- END: Login area -->
<?php
}

if(GateKeeper::isAccessAllowed() && $this->location->uploadAllowed() && (GateKeeper::isUploadAllowed() || GateKeeper::isNewdirAllowed()))
{
?>
<!-- START: Upload area -->
<form enctype="multipart/form-data" method="post">
	<div id="upload">
		<?php
		if(GateKeeper::isNewdirAllowed()){
		?>
		<div id="newdir_container">
			<input name="userdir" type="text" class="upload_dirname" />
			<input type="submit" value="<?php print $this->getString("make_directory"); ?>" />
		</div>
		<?php
		}
		if(GateKeeper::isUploadAllowed()){
		?>
		<div id="upload_container">
			<input name="userfile" type="file" class="upload_file" />
			<input type="submit" value="<?php print $this->getString("upload"); ?>" class="upload_sumbit" />
		</div>
		<?php
		}
		?>
		<div class="bar"></div>
	</div>
</form>
<!-- END: Upload area -->
<?php
}

?>
<!-- START: Info area -->
<div id="info">
<?php
if(GateKeeper::isUserLoggedIn())
	print "<a href=\"".$this->makeLink(false, true, null, null, null, "")."\">".$this->getString("log_out")."</a> | ";

if(EncodeExplorer::getConfig("mobile_enabled") == true)
{
	print "<a href=\"".$this->makeLink(true, false, null, null, null, $this->location->getDir(false, true, false, 0))."\">\n";
	print ($this->mobile == true)?$this->getString("standard_version"):$this->getString("mobile_version");
	print "</a> | \n";
}
if(GateKeeper::isAccessAllowed() && $this->getConfig("calculate_space_level") > 0 && $this->mobile == false)
{
	print $this->getString("total_used_space").": ".$this->spaceUsed." MB | ";
}
if($this->mobile == false && $this->getConfig("show_load_time") == true)
{
	printf($this->getString("page_load_time")." | ", (microtime(TRUE) - $_START_TIME)*1000);
}
?>
Powered by <a href="http://encode-explorer.siineiolekala.net">Encode Explorer</a>
</div>
<!-- END: Info area -->
</body>
</html>

<?php
	}
}

//
// This is where the system is activated.
// We check if the user wants an image and show it. If not, we show the explorer.
//
$encodeExplorer = new EncodeExplorer();
$encodeExplorer->init();

GateKeeper::init();

if(!ImageServer::showImage() && !Logger::logQuery())
{
	$location = new Location();
	$location->init();
	if(GateKeeper::isAccessAllowed())
	{
		Logger::logAccess($location->getDir(true, false, false, 0), true);
		$fileManager = new FileManager();
		$fileManager->run($location);
	}
	$encodeExplorer->run($location);
}
?>
