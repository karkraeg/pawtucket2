<?php
MetaTagManager::setWindowTitle($this->request->config->get('app_display_name').': Hilfe');
?>
<?php
$va_tmp = explode('/', str_replace('\\', '/', $_SERVER['SCRIPT_NAME']));
array_pop($va_tmp);
$vs_path = join('/', $va_tmp);
?>
<?php
$t_item = $this->getVar('item');
?>
<H1 style="text-align:center">Hilfe</H1>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <p>Hier finden sie Hilfe bei der Nutzung unserer Sammlungsdatenbank.</p>
<p><h4><b>Inhalt</b></h4>
<ul>
   <li><a href="#datenbankaufbau">Datenbankaufbau</a></li>
   <li><a href="#stoebern">St&ouml;bern</a></li>
   <li><a href="#suchfeld">Suchfeld</a></li>
   <li><a href="#normdaten">Normdaten</a></li>
   <li><a href="#bedienungshilfe">Tipps zur Bedienung</a></li>
   </ul>
   </p>
<hr size="1" noshade>
<p><h4><a name="datenbankaufbau"></a><b>Datenbankaufbau</b></h4> </p>
<p>Um die Recherchem&ouml;glichkeiten effektiv zu nutzen ist es sinnvoll, die Struktur der Datenbank zu erkl&auml;ren. Das System basiert auf der Unterscheidung von Werk, Werkversion und Objekt.</p>
<p><img src="../../assets/pawtucket/images/systemaufbau-ICS.jpg" border-width="1" style="max-width: 100%" style="max-width: 100%"></p>
<p><b>Hinweis</b>: Da es sich bei der ICS um die Zusammenlegung mehrerer Informationssysteme handelt, ist dieses Struktur noch nicht auf alle Objekte &uuml;bertragen, d. h. es fehlen noch zahlreiche Eintr&auml;ge bei den Werken und Werkversionen. Aus diesem Grund ist bei der Suche nach Werken aktuell noch keine Vollst&auml;ndigkeit erreicht worden.
</p>
<p><a name="werk"></a><h4>Werk</h4> </p>
<p>Im Bereich Werk werden die allgemeinen Informationen zu dem Spiel erfasst. Hier finden sich Angaben zum Titel und Untertiteln, dem Genre, Themen-, Personen-, Orts- und Zeitbez&uuml;gen.</p>
<p>Hier soll in Zukunft der Schwerpunkt der Recherche sein. Die Themenbereiche werden weiter ausgebaut und st&auml;rker differenziert werden.</p>
<p><h5>Werkdetails</h5></p>
<p>Auf der linken Seite finden sie Informationen zum Spielmodus, Genre und den Verschlagwortungen (Personen, Orte, Zeiten, Themen). Die Schlagworte sind mit Links auf frei verf&uuml;gbare Internetressourcen versehen. Dies wird f&uuml;r die Fortentwicklung des Systems zuk&uuml;nftig bedeuten, dass weitere M&ouml;glichkeiten der Datenanreicherung, bzw. Datennutzung in Form von Karten oder dem Einblenden weitere Informationen aus dieses Ressourcen m&ouml;glich sind.<br>
Auf der rechten Seite finden sie mit dem Werk in Beziehung stehende Entit&auml;ten sowie die zugeh&ouml;rigen Werkversionen. </p>


<p><a name="werkversion"></a><h4>Werkversion</h4> </p>
<p>Den Werken sind - meist mehrere - Werkversionen zugeordnet, die sich auf die Portierung des Spiels auf unterschiedliche Plattformen beziehen. Hier werden Informationen zu Entwicklern und zu Systemvoraussetzungen erfasst.
</p>
<p><h5>Werkversionsdetails</h5></p>
<p>Auf dieser Detailseite finden Sie links Informationen zur Altersbeschr&auml;nkung (USK und PEGI) sowie die Systemvoraussetzungen. Auf der rechten Seite werden mit der Werkversion verkn&uuml;pfte Entit&auml;ten (Personen, Unternehmen, Organisationen) sowie zum der Werkeintrag angezeigt.</p>

<p><a name="objekt"></a><h4>Objekt</h4></p>
<p>Da es sich bei der ICS um eine Sammlung handelt, wird jedes Objekt mit seinen speziellen Informationen eigenst&auml;ndig erfasst. Hier finden Sie Angaben zum Publisher, zu den Datentr&auml;gern und dem Boxinhalt, worunter auch individuelle Beigaben, wie vom Nutzer selbst hergestellte L&ouml;sungshilfen in Form von Schriftst&uuml;cken oder Zeichnungen befinden k&ouml;nnen. Ebenso wird die individuelle Inventarnummer und die zugeh&ouml;rige Sammlung aufgenommen. Des Weiteren gibt es - falls schon vorhanden - einen Link auf die Werkversion, wor&uuml;ber auch der Werkeintrag eingebunden ist.  </p>
<p><h5>Objektdetailseite</h5></p>
<p>Die Objektdetailseite verbindet Angaben aus Werk, Werkversion und Objekt. Die Titelvarianten in Franz&ouml;sisch (fr), Spanisch (es), Niederl&auml;ndisch (nl), Japanisch (ja), Koreanisch (ko) und Chinesisch (zh) werden direkt aus Wikidata ausgelesen sofern ein entsprechender Eintrag vorhanden ist.</p>

<hr size="1" noshade>


<p><h4><a name="suchfeld"></a><b>Suchfeld</b></h4>    </p>
<p>Im Suchfeld rechts oben k&ouml;nnen sie einfach einen Titel oder Teil eines Titels eingeben und danach suchen lassen. Als Ergebnis bekommen sie Objekte, Werke und Werkversionen angezeigt</p>
<p><img src="../../assets/pawtucket/images/suchergebnis.jpg" style="max-width: 100%"></p>

<hr size="1" noshade>

<p><h4><a name="normdaten"></a><b>Normdaten</b></h4></p>
<p>Ein wesentlicher Teil des Dokumentationskonzeptes der ICS ist die m&ouml;glichst umfangreiche Nutzung von frei zug&auml;nglichen Informationsressourcen. Diese Datennetze sollen zuk&uuml;nftig die Rechercheergebnisse verbessern und zudem die Datenanreicherung erm&ouml;glichen.
<br>
Zu diesem Zweck finden sich im System Verweise auf folgende Webservices:</p>
<ul>
<li><a href="https://www.dnb.de/DE/Standardisierung/GND/gnd_node.html" target="_blank"><b>GND</b></a> (Gemeinsame Normdatenbank)<br>
Die Gemeinsame Normdatei (GND) ist eine Normdatei f&uuml;r Personen, K&ouml;rperschaften, Konferenzen, Geografika, Sachschlagw&ouml;rter und Werktitel. Sie wird von der Deutschen Nationalbibliothek, allen deutschsprachigen Bibliotheksverb&uuml;nden mit den angeschlossenen Bibliotheken, der Zeitschriftendatenbank (ZDB) und zahlreichen weiteren Einrichtungen gemeinschaftlich gef&uuml;hrt.</li>
<li><a href="https://www.wikidata.org/wiki/Wikidata:Main_Page" target="_blank"><b>Wikidata</b></a><br>
Ein Projekt zur Erstellung einer Wissensdatenbank von Wikimedia Deutschland.</li>
<li><a href="https://viaf.org/" target="_blank"><b>VIAF</b></a> (Virtual International Authority Files)<br>
VIAF ist eine internationale Normdatei, deren Inhalte sich aus den Daten mehrere Nationalbibliotheken und Bibliotheksverb&uuml;nde zusammensetzen.</li>
<li><a href="http://www.iconclass.nl/home" target="_blank" ><b>Iconclass</b></a><br>
Iconclass ist ein Klassifizierung&shy;skonzept zur Erfassung und inhaltlichen Erschlie&szlig;ung von Bildinhalten</li>
<li><a href="http://www.getty.edu/research/tools/vocabularies/aat/" target="_blank" ><b>AAT</b> </a>(Art & Architecture Thesaurus)<br>
Der AAT ist ein hierarchisch gegliederter, polyhierarchischer und multilingualer Thesaurus f&uuml;r die Objekterschlie&szlig;ung von kunst- und kulturhistorischen Sammlungen des Getty Research Institutes.</li>
<li><a href="http://www.getty.edu/research/tools/vocabularies/tgn/index.html" target="_blank" ><b>TGN</b></a> (Thesaurus of Geographic Names)<br>
Der TGN ist ein Thesaurus f&uuml;r Ortbezeichnungen weltweit, herausgegeben vom Getty Research Institute.</li>
</ul>

<hr size="1" noshade>

<p><h4><a name="bedienungshilfe"></a><b>Tipps zur Bedienung</b></h4></p>
<p><h5><b>Bildanzeige</b></h5><br>
Wenn zu dem gesuchten Objekt eine Abbildung vorhanden ist, kann sie vergr&ouml;&szlig;ert werden. Dies erfolgt durch Klick auf das Lupensymbol im Men&uuml;, das sich am oberen Rand der Abbildung zeigt. (Die Nutzung des Koffersymbols (Anmeldung bei Lightbox) kann nur von registrierten Nutzer vorgenommen werden.)</p>
<p><img src="../../assets/pawtucket/images/Bildmenue.jpg" style="max-width: 100%"></p>
<p>Im neuen Layer wird die Abbildung vergr&ouml;&szlig;ert angezeigt. &Uuml;ber ein Men&uuml; k&ouml;nnen Bildmanipulationen vorgenommen werden (Drehen, Helligkeitsanpassung, Kontrastregelung, Farbs&auml;ttigungsanpassung, S/W-Konvertierung, Farbumkehr sowie R&uuml;ckstellung aller Manipulationen). </p>
<p><img src="../../assets/pawtucket/images/Bildbetrachter.jpg" style="max-width: 100%">
</p><p> </p>
<p><br><h5><b>Listendownload als PDF</b></h5><br>
In der Suchergebnissen von Werken, Werkversionen und Objekten k&ouml;nnen diese als Liste im PDF-Format ausgedruckt werden. Dazu bitte auf das Zahnrad neben der &Uuml;berschrift klicken und "Checklist" oder "PDF (thumbnails)" ausw&auml;hlen.</p>
<p><img src="../../assets/pawtucket/images/listendruck.jpg" style="max-width: 100%"><br>
</p>
<p> </p>
<p><br> <h5><b>Umschalten zwischen Thumbnail- und Listenansicht</b></h5><br>
Bei den Ergebnislisten kann zwischen der Anzeige der Objekte als Thumbnails oder als Liste gew&auml;hlt werden. </p>
<p><img src="../../assets/pawtucket/images/ansichtswechsel.jpg" style="max-width: 100%"><br>  </p>
<p>Bei der Listenansicht symbolisiert ein kleines Bild das Vorhandensein einer Abbildung.</p>
<p><img src="../../assets/pawtucket/images/abbild.jpg" style="max-width: 100%"><br>  </p>
<p><br> <h5><b>Anmeldung</b></h5><br>
Eine Anmeldung ist zurzeit nur f&uuml;r Mitarbeitende der ICS vorgesehen.</p>
    </div>
    <div class="col-sm-2"></div>
</div>
