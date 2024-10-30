<?php
/*
Plugin Name: Kalendarium CZ
Plugin URI: http://milos.svasek.net/2009/06/plugin-kalendarium-cz/
Description: Zobrazuje české svátky (jmeniny). / Shows Czech name days
Version: 1.2.1
Author: Miloš Svašek
Author URI: http://milos.svasek.net/about
*/

/*
Description: "Shows actual date and the czech name days in the sidebar (possible as widget)."
Popis: "Zobrazuje datum a české svátky (jmeniny) v postranním panelu (možno použít jako widget)."

For install just add widget Kalendarium, or add this block to your "sidebar.php" in you theme directory:

=== cut here ===
<div id="today">
    <?php if(function_exists('get_kalendarium_cz'))  get_kalendarium_cz('<h6>','</h6>'); ?>
</div>
=== cut here ===

This function is called as get_kalendarium_cz('tag before title','tag after title','tag before item','tag after item')

*/

function get_kalendarium_cz($before = '', $after = '') {
$svatky	= array('Nový rok','Karina','Radmila','Diana','Dalimil','Tři králové','Vilma','Čestmír','Vladan',
'Břetislav','Bohdana','Pravoslav','Edita','Radovan','Alice','Ctirad','Drahoslav','Vladislav','Doubravka',
'Ilona','Běla','Slavomír','Zdeněk','Milena','Miloš','Zora','Ingrid','Otýlie','Zdislava','Robin','Marika',
'Hynek',array('Nela','Hromnice'),'Blažej','Jarmila','Dobromila','Vanda','Veronika','Milada','Apolena','Mojmír',
'Božena','Slavěna','Věnceslav','Valentýn','Jiřina','Ljuba','Miloslava','Gizela','Patrik','Oldřich','Lenka',
'Petr','Svatopluk','Matěj','Liliana','Dorota','Alexandr','Lumír','Horymír','Bedřich','Anežka','Kamil',
'Stela','Kazimír','Miroslav','Tomáš','Gabriela','Františka','Viktorie','Anděla','Řehoř','Růžena',array('Rút','Matylda'),
'Ida',array('Elena','Herbert'),'Vlastimil','Eduard','Josef','Světlana','Radek','Leona','Ivona','Gabriel','Marián',
'Emanuel','Dita','Soňa','Taťána','Arnošt','Kvido','Hugo','Erika','Richard','Ivana','Miroslava','Vendula',
array('Heřman','Hermína'),'Ema','Dušan','Darja','Izabela','Julius','Aleš','Vincenc','Anastázie','Irena','Rudolf',
'Valérie','Rostislav','Marcela','Alexandra','Evžénie','Vojtěch','Jiří','Marek','Oto','Jaroslav','Vlastislav',
'Robert','Blahoslav','Svátek práce','Zikmund','Alexej','Květoslav','Klaudie','Radoslav','Stanislav','Statní svátek - Ukončení II. světové války',
'Ctibor','Blažena','Svatava','Pankrác','Servác','Bonifác','Žofie','Přemysl','Aneta','Nataša','Ivo','Zbyšek',
'Monika','Emil','Vladimír','Jana','Viola','Filip','Valdemar','Vilém','Maxim','Ferdinand','Kamila','Laura',
'Jarmil','Tamara','Dalibor','Dobroslav','Norbert','Iveta','Medard','Stanislava','Gita','Bruno','Antonie','Antonín',
'Roland','Vít','Zbyněk','Adolf','Milan','Leoš','Květa','Alois','Pavla','Zdeňka','Jan','Ivan','Adriana','Ladislav',
'Lubomír',array('Petr','Pavel'),'Šárka','Jaroslava','Patricie','Radomír','Prokop',array('Státní svátek','Cyril','Metoděj'),
array('Státní svátek','Mistr Jan Hus'),'Bohuslava','Nora','Drahoslava',array('Libuše','Amálie'),'Olga','Bořek','Markéta',
'Karolína','Jindřich','Luboš','Martina','Drahomíra','Čeněk','Ilja','Vítězslav','Magdaléna','Libor','Kristýna',
'Jakub','Anna','Věroslav','Viktor','Marta','Bořivoj','Ignác','Oskar','Gustav','Miluše','Dominik','Kristián','Oldřiška',
'Lada','Soběslav','Roman','Vavřinec','Zuzana','Klára','Alena','Alan','Hana','Jáchym','Petra','Helena','Ludvík',
'Bernard','Johana','Bohuslav','Sandra','Bartoloměj','Radim','Luděk','Otakar','Augustýn','Evelína','Vladěna','Pavlína',
array('Linda','Samuel'),'Adéla','Bronislav','Jindřiška','Boris','Boleslav','Regína','Mariana','Daniela','Irma','Denisa',
'Marie','Lubor','Radka','Jolana','Ludmila','Naděžda','Kryštof','Zita','Oleg','Matouš','Darina','Berta','Jaromír',
'Zlata','Andrea','Jonáš','Václav','Michal','Jeroným','Igor',array('Olívie','Oliver'),'Bohumil','František','Eliška','Hanuš',
'Justýna','Věra',array('Štefan','Sára'),'Marina','Andrej','Marcel','Renáta','Agáta','Tereza','Havel','Hedvika','Lukáš',
'Michaela','Vendelín','Brigita','Sabina','Teodor','Nina','Beáta','Erik',array('Šarlota','Zoe'),'Statní svátek - Vznik Československa','Silvie',
'Tadeáš','Štěpánka','Felix','Památka zesnulých','Hubert','Karel','Miriam','Liběna','Saskie','Bohumír','Bohdan','Evžen',
'Martin','Benedikt','Tibor','Sáva','Leopold','Otmar','Mahulena','Romana','Alžběta','Nikola','Albert','Cecílie','Klement',
'Emílie','Kateřina','Artur','Xenie','René','Zina','Ondřej','Iva','Blanka','Svatoslav','Barbora','Jitka','Mikuláš','Ambrož',
'Květoslava','Vratislav','Julie','Dana','Simona','Lucie','Lýdie','Radana','Albína','Daniel','Miloslav','Ester','Dagmar',
'Natálie','Šimon','Vlasta',array('Adam','Eva','Štědrý den'),'1. svátek vánoční',array('Štěpán','2. svátek vánoční'),'Žaneta','Bohumila',
'Judita','David','Silvestr','Nový rok');

$d=getdate();
$datum=date("d. m. Y");
$yday=$d["yday"];

if (($yday>58) && ((date("Y")%4)!=0)) $yday++; // Detekce prestupneho roku
$svatek_now=$svatky[$yday];
if (($yday==58) && ((date("Y")%4)!=0)) $yday++; // Korektni vypis zitrejsiho svatku pri neprestupnem roku
$svatek_now_next=$svatky[$yday%366+1];
/* Not supported below
if (($yday==58) && ((date("Y")%4)!=0)) $yday++; // Korektni vypis zitrejsiho svatku pri neprestupnem roku
$svatek_now_next_next=$svatky[$yday%366+2];
*/

// Output:
$output .= "$before";
$output .= "Svátek má " . make_svatek_html($svatek_now)."<br/>\n";
$output .= "$after\n$before";
$output .= "Zítra " . make_svatek_html($svatek_now_next)."<br/>\n";
$output .= "$after\n";

return $output;
}
function get_my_today_date() {
    $mesic = array('','ledna','února','března','dubna','května','června','července','srpna','září','října','listopadu','prosince');
    $den = array('Neděle','Pondělí','Úterý','Středa','Čtvrtek','Pátek','Sobota');
    $d=getdate();
    /* Not used
    $y=$d["year"];
    $timecz = Time();
    $beat = Date(B);
    */
    $dnes=$den[$d["wday"]];
    $dden=$d["mday"];
    $dmes=$mesic[$d["mon"]];
    $drok=$d["year"];
    return "$dnes $dden. $dmes $drok";
}

function make_svatek_html($svatek){
    if (is_array($svatek)) {
	foreach ($svatek as $value) {
	    if(strpos($value, "svátek")) { $svatek_html .= "$value - "; }
	    else { $svatek_html .= "<a href=\"http://cs.wikipedia.org/wiki/$value\">$value</a>, "; }
	}
	$svatek_html = trim($svatek_html,',- '); //Orezat mezery a carky na konci a zacatku, ktere vznikly ve smycce.
    }else{
        if(strpos($svatek, "svátek")) { $svatek_html .= "$svatek - "; }
	else { $svatek_html = "<a href=\"http://cs.wikipedia.org/wiki/$svatek\">$svatek</a>, "; }
	$svatek_html = trim($svatek_html,',- '); //Orezat mezery a carky na konci a zacatku, ktere vznikly ve smycce.
    }
    return $svatek_html;
}

function widget_kalendarium_cz($args) {
    extract($args);
    echo "$before_widget";
    echo "$before_title\n";
    echo get_my_today_date();
    echo "$after_title\n";
    echo get_kalendarium_cz('<ul><li>','</li></ul>');
    echo "$after_widget\n";
}


function widget_kalendarium_cz_control($args) {
}

function init_kalendarium_widget(){
        register_sidebar_widget("Kalendárium", "widget_kalendarium_cz");
	register_widget_control("Kalendárium Widget", "widget_kalendarium_cz_control");
}

add_action("plugins_loaded", "init_kalendarium_widget");
?>
