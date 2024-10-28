<style>
    .metadaten h5 {
    border-bottom: 1px solid #D9D9D9 !important;
}
h1 {
font-size: 2em!important;
margin: 0.67em 0;
color: #54B6F7 !important;
margin-top: 0px;
}

.detail .detailNavBgLeft,
.detail .detailNavBgRight {
    margin-top: -20px;
    background-color: #fff !important;
    width: 50px;
    height: 160px;
    text-transform: uppercase;
    padding-top: 20px;
    padding-bottom: 0px;
    text-align: center;
}
</style>
<?php
    $t_object = $this->getVar('item');
    /* $t_item = $this->getVar('item'); */
    $va_comments = $this->getVar('comments');
    $va_tags = $this->getVar('tags_array');
    $vn_comments_enabled = $this->getVar('commentsEnabled');
    $vn_share_enabled = $this->getVar('shareEnabled');
    $va_access_values = $this->getVar('access_values');
?>

<div class='col-xs-12 navTop'>
    <!--- Navigation; only shown at small screen size -->
    {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
</div> <!-- end Navgigation small Screensize -->
<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
    <!-- Navigation -->
    <div class="detailNavBgLeft">
        {{{nextLink}}}{{{resultsLink}}}{{{previousLink}}}
    </div><!-- end detailNavBgLeft -->
</div><!-- end Navgigation -->

<div class="row" style="margin-bottom: 25px;">
    <!-- Das ist die Row in der der ganze Inhalt steht -->
    <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10' style="border:0px solid black; margin-bottom: 25px">
        <!-- Titel -->
        <H1 style="text-align:center;padding-bottom: 0.1em">{{{ca_objects.preferred_labels.name}}}</H1>
            <h5 style="text-align:center;padding-bottom: 1em"><?php
                            $str = $t_object->getWithTemplate('<unit relativeTo="ca_occurrences">^ca_occurrences.related.wikidata.url</unit>');
                            $re = "/(http:\/\/www.wikidata.org\/entity\/)/";
                            $id = preg_replace($re, '', $str);
                            $url = 'https://www.wikidata.org/w/api.php?action=wbgetentities&ids='.$id.'&format=json';
                            $json_source = file_get_contents($url);
                            $decodedjson = json_decode($json_source, true);
                            foreach ($decodedjson['entities'] as $item) {
                                if (isset($item['labels']['fr']['value'])) {
                                    echo $item['labels']['fr']['value'].' (fr) / ';
                                }
                                if (isset($item['labels']['es']['value'])) {
                                    echo $item['labels']['es']['value'].' (es) / ';
                                }
                                if (isset($item['labels']['nl']['value'])) {
                                    echo $item['labels']['nl']['value'].' (nl) / ';
                                }
                                if (isset($item['labels']['ko']['value'])) {
                                    echo $item['labels']['ko']['value'].' (ko) / ';
                                }
                                if (isset($item['labels']['ja']['value'])) {
                                    echo $item['labels']['ja']['value'].' (ja) / ';
                                }
                                if (isset($item['labels']['zh-cn']['value'])) {
                                    echo $item['labels']['zh-cn']['value'].' (zh)';
                                }
                            }
                        ?></h5>
        <div class="container">
            <div class="row">
                <div class='col-sm-6 col-md-6 col-lg-5 col-lg-offset-1 bildanzeige'>
                    <!-- Bild -->
                    {{{representationViewer}}}
                    {{{<ifdef code="ca_object_representations.rights.rightsHolder" min="1">© Bild: ^ca_object_representations.rights.rightsHolder</ifdef>}}}
                    <div id="detailAnnotations"></div>

                    <?php echo caObjectRepresentationThumbnails($this->request, $this->getVar('representation_id'), $t_object, array('returnAs' => 'bsCols', 'linkTo' => 'carousel', 'bsColClasses' => 'smallpadding col-sm-3 col-md-3 col-xs-4')); ?>

                    <?php
                                // Comment and Share Tools
                                if ($vn_comments_enabled | $vn_share_enabled) {
                                    echo '<div id="detailTools">';
                                    if ($vn_comments_enabled) {
                                        ?>
                    <div class="detailTool"><a href='#' onclick='jQuery("#detailComments").slideToggle(); return false;'><span
                                class="glyphicon glyphicon-comment"></span>Kommentare und Tags (
                            <?php echo sizeof($va_comments) + sizeof($va_tags); ?>)</a></div><!-- end detailTool -->
                    <div id='detailComments'>
                        <?php echo $this->getVar('itemComments'); ?>
                    </div><!-- end itemComments -->
                    <?php
                                    }
                                    if ($vn_share_enabled) {
                                        echo '<div class="detailTool"><span class="glyphicon glyphicon-share-alt"></span>'.$this->getVar('shareLink').'</div><!-- end detailTool -->';
                                    }
                                    echo '</div><!-- end detailTools -->';
                                }
                ?>
                </div><!-- end Bild col -->

                <div class='col-sm-6 col-md-6 col-lg-5 metadaten'>
                    <!-- Kernerfassung -->
                    <div style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px;width: 100%">
                        <!-- Idno / Signatur -->
                        <?php
                if (in_array('225', $va_access_values)) {
                    echo '{{{<ifdef code="ca_objects.inventarnummer"><h5>Inventarnummer</h5>^ca_objects.inventarnummer</ifdef>}}}';
                }
                ?>
                        {{{<h5>ID</H5>^ca_objects.idno<br/>}}}


                        <!-- Werksversionen -->
                        {{{<ifcount code="ca_occurrences" restrictToTypes="werkversion" max="1">
                    <unit relativeTo="ca_occurrences" restrictToTypes="werkversion"><H5>Werkversion</H5><l>^ca_occurrences.preferred_labels</l>
                    </unit>
                </ifcount>}}}

                        {{{<ifcount code="ca_occurrences" restrictToTypes="werkversion" min="2">
                    <H5>werkversionen</H5>
                    <unit relativeTo="ca_occurrences" restrictToTypes="werkversion" delimiter="<br>"><l>^ca_occurrences.preferred_labels</l>
                    </unit>
                </ifcount>}}}

                        {{{<ifcount code="ca_list_items" restrictToRelationshipTypes="schlagwort" min="1">
                        <H5>Verknüpfte Schlagwörter</H5>
                        <ul>
                        <li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="schlagwort" delimiter="<li>"><a href="/index.php/Browse/objects/facet/schlagworte/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular%delimiter=_➔_</a>
                    </unit>
                        </ul>
                    </ifcount>}}}


                        {{{<ifcount code="ca_objects.iconclass" min="1">
                        <H5>Iconclass</H5>

                           <unit relativeTo="ca_objects.iconclass.url" delimiter="<br/>"><a href="^ca_objects.iconclass.url" target="_blank">^ca_objects.iconclass</a></unit>


                    </ifcount>}}}
                        {{{<ifdef code="ca_objects.systemangabe"><H5>System</H5><unit delimiter="<br/>">^ca_objects.systemangabe</unit></ifdef>}}}
                        {{{<ifdef code="ca_objects.objektinhalt"><H5>Objektinhalt</H5>^ca_objects.objektinhalt</ifdef>}}}
                        {{{<ifdef code="ca_objects.sprachen"><H5>Sprache</H5><unit delimiter="<br/>">^ca_objects.sprachen</unit></ifdef>}}}
                        {{{<ifdef code="ca_object_lots"><H5>Konvolut</H5>^ca_object_lots.preferred_labels</ifdef>}}}

                        {{{<ifdef code="ca_objects.datentraegerwrapper">
                            <H5>Datenträger</H5>
                            <unit delimiter="<br/>"><ifdef code="ca_objects.datentraegerwrapper.anzahldatentraeger">^ca_objects.datentraegerwrapper.anzahldatentraeger x</ifdef> ^ca_objects.datentraegerwrapper.datentraegertyp.preferred_labels.name_singular</unit>
                        </ifdef>}}}
                        {{{<ifcount code="ca_occurrences.work_date" min="1"><h5>Veröffentlichung</h5>
                                <unit relativeTo="ca_occurrences" delimiter="<br/>">^ca_occurrences.work_date (Werkversion)</unit>
                                <br/>
                                <unit relativeTo="ca_occurrences" delimiter="<br/>">
                                    <ifdef code="ca_occurrences.related.work_date">^ca_occurrences.related.work_date (Werk)</ifdef></unit>

                            </ifcount> }}}

                        {{{<ifdef code="ca_objects.ean_code"><h5>EAN</h5> ^ca_objects.ean_code</ifdef>}}}

                        {{{<ifdef code="ca_objects.doc_document">
                        <h5>Dokumente</h5>
                        ^ca_objects.doc_document.dokumentbeziehung: <a href="^ca_objects.doc_document.documentdatei" target="_blank">^ca_objects.doc_document.beschrdocument</a>
                        </ifdef>}}}
                        <!-- Wikidata -->
                        {{{<unit relativeTo="ca_occurrences"><ifdef code="ca_occurrences.related.wikidata">
                                <h5>Wikidata</h5>
                                <unit relativeTo="ca_occurrences"><a href="^ca_occurrences.related.wikidata.url">^ca_occurrences.related.wikidata</a></unit>
                        </ifdef></unit>}}}
                        <!-- Systemanforderungen -->
                        {{{<ifdef code="ca_occurrences.systemanforderung">
                            <h5>Systemanforderungen</h5>
                            <ifdef code="ca_occurrences.systemanforderung.processor">Prozessor: ^ca_occurrences.systemanforderung.processor<br/></ifdef>
                            <ifdef code="ca_occurrences.systemanforderung.ram">RAM: ^ca_occurrences.systemanforderung.ram<br/></ifdef>
                            <ifdef code="ca_occurrences.systemanforderung.festplatte">Festplatte: ^ca_occurrences.systemanforderung.festplatte<br/></ifdef>
                            <ifdef code="ca_occurrences.systemanforderung.aufloesung">Auflösung: ^ca_occurrences.systemanforderung.aufloesung<br/></ifdef>
                            <ifdef code="ca_occurrences.systemanforderung.farbtiefe">Farbtiefe: ^ca_occurrences.systemanforderung.farbtiefe<br/></ifdef>
                            <ifdef code="ca_occurrences.systemanforderung.Plugin">^ca_occurrences.systemanforderung.Plugin</ifdef>
                        </ifdef>}}}
                        {{{<ifdef code="ca_objects.publisher"><h5>Publisher</h5>^ca_objects.publisher</ifdef>}}}
            <!-- Entitäten -->
                        {{{<ifcount code="ca_entities" restrictToRelationshipTypes="" min="1" max="1">
                            <unit relativeTo="ca_entities" restrictToRelationshipTypes="entitypublished" delimiter=" "><H5>Verknüpfter Publisher</H5><a href="^ca_entities.preferred_labels.idno">^ca_entities.preferred_labels.displayname</a></unit>
                        </ifcount>}}}
                        {{{<ifcount code="ca_entities" restrictToRelationshipTypes="" min="2">x
                            <H5>Verknüpfte Publisher</H5>
                            <unit relativeTo="ca_entities" restrictToRelationshipTypes="entitypublished" delimiter="</br>"><l>^ca_entities.preferred_labels.displayname</l></unit>
                        </ifcount>}}}


                            {{{<unit relativeTo="ca_occurrences" delimiter="<br/>">
                                    <ifcount code="ca_entities" min="1">
                                <h5>Beteiligte</h5>
                                <unit relativeTo="ca_entities"><a href="/index.php/Detail/entities/^ca_entities.entity_id">^ca_entities.preferred_labels.displayname</a> (^relationship_typename)<br/></unit>
                                <unit relativeTo="ca_occurrences.related"><unit relativeTo="ca_entities"><a href="/index.php/Detail/entities/^ca_entities.idno">^ca_entities.preferred_labels.displayname</a> (^relationship_typename)</unit>    </unit>

                                </ifcount></unit>}}}

                        {{{<H5>Objektinhalt</H5>
                        <ifdef code="ca_objects.objektelemente"><unit delimiter="<br/>">^ca_objects.objektelemente</unit><br/></ifdef>
                        <ifdef code="ca_objects.boxinhalt"><unit delimiter="<br/>">^ca_objects.boxinhalt</unit></ifdef>
                        }}}

                        {{{<unit relativeTo="ca_occurrences"><ifdef code="ca_occurrences.related.genre"><h5>Genre</h5><unit delimiter="<br/>">^ca_occurrences.related.genre</unit></ifdef></unit>}}}
                        {{{<ifdef code="ca_occurrences.related.werk_klassifikation" restrictToTypes="werk"><h5>Anwendungstyp</h5>^ca_occurrences.related.werk_klassifikation</ifdef>}}}
                        {{{<unit relativeTo="ca_occurrences" restrictToTypes="werkversion">
                        <ifdef code="ca_occurrences.related.altersbeschraenkung"><H5>Altersbeschränkung</H5></ifdef>
						    <ifdef code="ca_occurrences.related.altersbeschraenkung.essence_line01"><unit skipIfExpression="^ca_occurrences.related.altersbeschraenkung.essence_line01 =~ /keine/"><b>USK</b> ^ca_occurrences.related.altersbeschraenkung.essence_line01<br/></unit></ifdef>
						    <ifdef code="ca_occurrences.related.altersbeschraenkung.essence_line02"><unit skipIfExpression="^ca_occurrences.related.altersbeschraenkung.essence_line02 =~ /keine/"><b>PEGI</b> ^ca_occurrences.related.altersbeschraenkung.essence_line02</unit></ifdef>
                        </unit>}}}
                        {{{<ifdef code="ca_occurrences.mehrspieler"><H5>Spielmodus</H5>^ca_occurrences.mehrspieler</ifdef>}}}
                        <!-- Interne Anmerkungen mit Access Check -->
                        <?php
                            if (in_array('225', $va_access_values)) {
                                echo '{{{<ifdef code="ca_objects.interne_anmerkung"><h5>Interne Anmerkungen</h5>^ca_objects.interne_anmerkung}}}
                                    {{{<ifdef code="ca_objects.kopierschutz"><h5>Kopierschutz</h5>^ca_objects.kopierschutz</ifdef>}}}
                                    {{{<ifdef code="ca_objects.condition"><h5>Erhaltungszustand</h5>^ca_objects.condition</ifdef>}}}';
                            }
                        ?>
                        <!-- Sammlung -->
                        <h5>Standort</h5>
                        {{{<unit relativeTo="ca_collections" delimiter="<br/>">
            <!-- <a href="/index.php/Browse/objects/facet/sammlung/id/^ca_collections.collection_id"> -->^ca_collections.preferred_labels.name <!-- </a> --></unit>}}}
                        <!-- Permalink -->
                        {{{<ifdef code="ca_objects.urn">
                Permalink: <a href="http://nbn-resolving.org/^ca_objects.urn">http://nbn-resolving.org/^ca_objects.urn</a><br />
                URN: ^ca_objects.urn
            </ifdef>}}}
                        <!-- Dublette -->
                        {{{<ifcount code="ca_objects.related" min="1">
                    <h5>Dublette</h5>
                    <ul>
                        <li>
                        <a href="/index.php/Detail/objects/^ca_objects.related.idno">^ca_objects.related.preferred_labels (^ca_objects.related.idno)</a>
                    </ul>
                </ifcount>}}}
                    </div><!-- End Kernerfassungs -->
                    <!-- Bearbeiten Link -->
                    <p style="text-align: right; font-size: 10pt"><i>{{{<a href="http://backend.internationale-computerspielesammlung.de/index.php/editor/objects/ObjectEditor/Edit/object_id/^ca_objects.object_id" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>}}}</i></p>
                </div><!-- End Kernerfassungs DIV -->

            </div><!-- end row -->

            <!-- Navigation next Item
    <div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'><div class="detailNavBgRight">{{{nextLink}}}</div></div>
    -->
        </div><!-- end container -->
    </div><!-- end col -->
</div><!-- end Inhaltsrow -->

<!-- Read-more Funktion -->
<script type='text/javascript'>
    jQuery(document).ready(function () {
        $('.trimText').readmore({
            speed: 75,
            maxHeight: 100
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            html: true
        });
    });
</script>