<?php $TRANSLATIONS = array(
"Failed to clear the mappings." => "Selhalo zrušení mapování.",
"Failed to delete the server configuration" => "Selhalo smazání nastavení serveru",
"The configuration is valid and the connection could be established!" => "Nastavení je v pořádku a spojení bylo navázáno.",
"The configuration is valid, but the Bind failed. Please check the server settings and credentials." => "Konfigurace je v pořádku, ale spojení selhalo. Zkontrolujte, prosím, nastavení serveru a přihlašovací údaje.",
"The configuration is invalid. Please look in the ownCloud log for further details." => "Nastavení je neplatné. Zkontrolujte, prosím, záznam ownCloud pro další podrobnosti.",
"Deletion failed" => "Mazání selhalo.",
"Take over settings from recent server configuration?" => "Převzít nastavení z nedávného nastavení serveru?",
"Keep settings?" => "Ponechat nastavení?",
"Cannot add server configuration" => "Nelze přidat nastavení serveru",
"mappings cleared" => "mapování zrušeno",
"Success" => "Úspěch",
"Error" => "Chyba",
"Connection test succeeded" => "Test spojení byl úspěšný",
"Connection test failed" => "Test spojení selhal",
"Do you really want to delete the current Server Configuration?" => "Opravdu si přejete smazat současné nastavení serveru?",
"Confirm Deletion" => "Potvrdit smazání",
"<b>Warning:</b> Apps user_ldap and user_webdavauth are incompatible. You may experience unexpected behaviour. Please ask your system administrator to disable one of them." => "<b>Varování:</b> Aplikace user_ldap a user_webdavauth nejsou kompatibilní. Může nastávat neočekávané chování. Požádejte, prosím, správce systému aby jednu z nich zakázal.",
"<b>Warning:</b> The PHP LDAP module is not installed, the backend will not work. Please ask your system administrator to install it." => "<b>Varování:</b> není nainstalován LDAP modul pro PHP, podpůrná vrstva nebude fungovat. Požádejte, prosím, správce systému aby jej nainstaloval.",
"Server configuration" => "Nastavení serveru",
"Add Server Configuration" => "Přidat nastavení serveru",
"Host" => "Počítač",
"You can omit the protocol, except you require SSL. Then start with ldaps://" => "Můžete vynechat protokol, vyjma pokud požadujete SSL. Tehdy začněte s ldaps://",
"Base DN" => "Základní DN",
"One Base DN per line" => "Jedna základní DN na řádku",
"You can specify Base DN for users and groups in the Advanced tab" => "V rozšířeném nastavení můžete určit základní DN pro uživatele a skupiny",
"User DN" => "Uživatelské DN",
"The DN of the client user with which the bind shall be done, e.g. uid=agent,dc=example,dc=com. For anonymous access, leave DN and Password empty." => "DN klentského uživatele ke kterému tvoříte vazbu, např. uid=agent,dc=example,dc=com. Pro anonymní přístup ponechte údaje DN and Heslo prázdné.",
"Password" => "Heslo",
"For anonymous access, leave DN and Password empty." => "Pro anonymní přístup, ponechte údaje DN and heslo prázdné.",
"User Login Filter" => "Filtr přihlášení uživatelů",
"Defines the filter to apply, when login is attempted. %%uid replaces the username in the login action." => "Určuje použitý filtr, při pokusu o přihlášení. %%uid nahrazuje uživatelské jméno v činnosti přihlášení.",
"use %%uid placeholder, e.g. \"uid=%%uid\"" => "použijte zástupný vzor %%uid, např. \"uid=%%uid\"",
"User List Filter" => "Filtr uživatelských seznamů",
"Defines the filter to apply, when retrieving users." => "Určuje použitý filtr, pro získávaní uživatelů.",
"without any placeholder, e.g. \"objectClass=person\"." => "bez zástupných znaků, např. \"objectClass=person\".",
"Group Filter" => "Filtr skupin",
"Defines the filter to apply, when retrieving groups." => "Určuje použitý filtr, pro získávaní skupin.",
"without any placeholder, e.g. \"objectClass=posixGroup\"." => "bez zástupných znaků, např. \"objectClass=posixGroup\".",
"Connection Settings" => "Nastavení spojení",
"Configuration Active" => "Nastavení aktivní",
"When unchecked, this configuration will be skipped." => "Pokud není zaškrtnuto, bude nastavení přeskočeno.",
"Port" => "Port",
"Backup (Replica) Host" => "Záložní (kopie) hostitel",
"Give an optional backup host. It must be a replica of the main LDAP/AD server." => "Zadejte volitelného záložního hostitele. Musí to být kopie hlavního serveru LDAP/AD.",
"Backup (Replica) Port" => "Záložní (kopie) port",
"Disable Main Server" => "Zakázat hlavní serveru",
"When switched on, ownCloud will only connect to the replica server." => "Při zapnutí se ownCloud připojí pouze k záložnímu serveru",
"Use TLS" => "Použít TLS",
"Do not use it additionally for LDAPS connections, it will fail." => "Nepoužívejte pro spojení LDAP, selže.",
"Case insensitve LDAP server (Windows)" => "LDAP server nerozlišující velikost znaků (Windows)",
"Turn off SSL certificate validation." => "Vypnout ověřování SSL certifikátu.",
"If connection only works with this option, import the LDAP server's SSL certificate in your ownCloud server." => "Pokud připojení pracuje pouze s touto možností, tak importujte SSL certifikát SSL serveru do Vašeho serveru ownCloud",
"Not recommended, use for testing only." => "Není doporučeno, pouze pro testovací účely.",
"Cache Time-To-Live" => "TTL vyrovnávací paměti",
"in seconds. A change empties the cache." => "ve vteřinách. Změna vyprázdní vyrovnávací paměť.",
"Directory Settings" => "Nastavení adresáře",
"User Display Name Field" => "Pole pro zobrazované jméno uživatele",
"The LDAP attribute to use to generate the user`s ownCloud name." => "Atribut LDAP použitý k vytvoření jména uživatele ownCloud",
"Base User Tree" => "Základní uživatelský strom",
"One User Base DN per line" => "Jedna uživatelská základní DN na řádku",
"User Search Attributes" => "Atributy vyhledávání uživatelů",
"Optional; one attribute per line" => "Volitelné, atribut na řádku",
"Group Display Name Field" => "Pole pro zobrazení jména skupiny",
"The LDAP attribute to use to generate the groups`s ownCloud name." => "Atribut LDAP použitý k vytvoření jména skupiny ownCloud",
"Base Group Tree" => "Základní skupinový strom",
"One Group Base DN per line" => "Jedna skupinová základní DN na řádku",
"Group Search Attributes" => "Atributy vyhledávání skupin",
"Group-Member association" => "Asociace člena skupiny",
"Special Attributes" => "Speciální atributy",
"Quota Field" => "Pole pro kvótu",
"Quota Default" => "Výchozí kvóta",
"in bytes" => "v bajtech",
"Email Field" => "Pole e-mailu",
"User Home Folder Naming Rule" => "Pravidlo pojmenování domovské složky uživatele",
"Leave empty for user name (default). Otherwise, specify an LDAP/AD attribute." => "Ponechte prázdné pro uživatelské jméno (výchozí). Jinak uveďte LDAP/AD parametr.",
"Internal Username" => "Interní uživatelské jméno",
"Internal Username Attribute:" => "Atribut interního uživatelského jména:",
"Override UUID detection" => "Nastavit ručně UUID atribut",
"UUID Attribute:" => "Atribut UUID:",
"Username-LDAP User Mapping" => "Mapování uživatelských jmen z LDAPu",
"Clear Username-LDAP User Mapping" => "Zrušit mapování uživatelských jmen LDAPu",
"Clear Groupname-LDAP Group Mapping" => "Zrušit mapování názvů skupin LDAPu",
"Test Configuration" => "Vyzkoušet nastavení",
"Help" => "Nápověda"
);
