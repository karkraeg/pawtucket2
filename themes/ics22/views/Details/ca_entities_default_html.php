    <?php
$t_item = $this->getVar('item');
$va_comments = $this->getVar('comments');
$vn_comments_enabled = $this->getVar('commentsEnabled');
$vn_share_enabled = $this->getVar('shareEnabled');
?>
<!-- Navigation -->
<div class='col-xs-12 navTop'><!--- NAV only shown at small screen size -->
    {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
    </div><!-- end detailTop -->
<div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'> <!-- NAV -->
    <div class="detailNavBgLeft">
        {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
        </div><!-- end detailNavBgLeft -->
    </div><!-- end col -->
<!-- Inhalt -->
<div class="row" style="margin-bottom: 25px;"><!-- Main Row -->
    <div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'> <!-- Content -->
        <div class="container">
            <div class="row"> <!-- Titel Row -->
                <div class='col-md-12 col-lg-12'>
                    <H1>{{{^ca_entities.preferred_labels.displayname}}}</H1><HR>
                    {{{^ca_entities.lifespan}}}<br>
                        {{{<unit relativeTo="ca_places" delimiter="<br/>">^relationship_typename <l>^ca_places.preferred_labels.name</l></unit>}}}  {{{<ifdef code="ca_entities.historische_adresse">(^ca_entities.historische_adresse)<br></ifdef>}}} <!-- War ansässig in... -->
                        {{{<ifdef code="ca_entities.kommentar"><i>Kommentar:</i> ^ca_entities.kommentar</blockquote></ifdef>}}}
                        {{{^ca_entities.schenker}}}
                    </div>
             </div><!-- end Titel row -->
            <div class="row"><!-- Inhalts Row -->


                <div class="card col-xs-12 col-sm-6"><!-- Externe Links -->
                    {{{<ifdef code="ca_entities.biography"><H5>Summary</H5>^ca_entities.biography<br/></ifdef>}}}
                    {{{<ifdef code="ca_entities.wikipedia"><H2>Wikipedia</H2><hr><p style="color: #c8c7c9;"><i>The following text is automatically retrieved from the German Wikipedia. To follow links in the Wikipedia article, please click <a href="^ca_entities.wikipedia.fullurl" target="_blank">here</a>.</i><br/></p></ifdef>}}}
                    {{{<ifdef code="ca_entities.wikipedia"><img src="^ca_entities.wikipedia.image_thumbnail" style="float: left;margin-right: 10px">^ca_entities.wikipedia.abstract</ifdef>}}}
                        <H2>External Links</H2><HR>
                        {{{
                        <ifdef code="ca_entities.wikipedia"><a href="^ca_entities.wikipedia.fullurl" target="_blank">→ Wikipedia</a><br></ifdef>
                        <ifdef code="ca_entities.entitytgn"><a href="^ca_entities.entitytgn.url" target="_blank">→ TGN</a><br></ifdef>
                        <ifdef code="ca_entities.gnd"><a href="^ca_entities.gnd" target="_blank">→ GND</a><br></ifdef>
                        <ifdef code="ca_entities.website_url"><a href="^ca_entities.website_url" target="_blank">→ Website</a><br></ifdef>
                        <ifdef code="ca_entities.viafverweis"><a href="^ca_entities.viafverweis.url" target="_blank">→ VIAF</a><br></ifdef>
                        }}}

                        <!-- <h2>Linked works</h2><HR>
                            <?php
                                    $str = $t_item->getWithTemplate('<unit relativeTo="ca_occurrences"><unit relativeTo="ca_occurrences.related">^ca_occurrences.preferred_labels</unit></unit>');
                                    $werke = explode('; ', $str);
                                    $werke = array_unique($werke);
                                    // $ids = $t_item->getWithTemplate('<unit relativeTo="ca_occurrences"><unit relativeTo="ca_occurrences.related">^ca_occurrences.idno</unit></unit>');
                                    // $ids = explode('; ', $ids);
                                    // $ids = array_unique($ids);
                                    ?>
                                <?php foreach ($werke as $werk): ?>
                                <li><?=$werk;?></li>

                            <?php endforeach;?> -->

                        {{{<ifdef code="ca_occurrences" restrictToTypes="werkversion" min="1"> <!-- Ifdef Werkversion-Container -->
                            <ifcount code="ca_occurrences" restrictToTypes="werkversion" min="1" max="1"><H2>Related work version</H2><HR></ifcount>
                            <ifcount code="ca_occurrences" restrictToTypes="werkversion" min="2"><H2>Related work versions</H2><HR></ifcount>
                            ^ca_entities.preferred_labels.displayname worked on following work versions:<br/>
                            <li><unit relativeTo="ca_occurrences" restrictToTypes="werkversion" restrictToRelationshipTypes="veroeffentlichte" delimiter="<li>"> <l>^ca_occurrences.preferred_labels.name</l></unit>
                        </ifdef>}}}

                </div>
                <div class="col-xs-12 col-sm-6"> <!-- Verknüpfte Objekte -->
                    {{{<ifcount code="ca_objects" min="1">
                                        <h2>Related Objects (^ca_objects._count)</h2>
                                        <unit relativeTo="ca_objects.related" delimiter="<br/>">
                                            <!-- Without Image -->
                                            <ifcount code="^ca_object_representations.media.thumbnail" max="0">
                                                <div href="/index.php/Detail/objects/^ca_objects.object_id" class="bResultListItem" id="row6352" onmouseover="jQuery(&quot;#bResultListItemExpandedInfo6352&quot;).show();"
                                                    onmouseout="jQuery(&quot;#bResultListItemExpandedInfo6352&quot;).hide();">
                                                    <div class="bSetsSelectMultiple"><input type="checkbox" name="object_ids[]" value="6352"></div>
                                                    <div class="bResultListItemContent">
                                                        <div class="text-center bResultListItemImg"><a href="/index.php/Detail/objects/6352">
                                                                <div class="bResultItemImgPlaceholder"><i class="fa fa-picture-o fa-2x"></i></div>
                                                        </div>
                                                        <div class="bResultListItemText">
                                                            <small>
                                                                <a href="/index.php/Detail/objects/^ca_objects.object_id">^ca_objects.idno</a>
                                                            </small>
                                                            <br/>
                                                            <a href="/index.php/Detail/objects/^ca_objects.object_id">^ca_objects.preferred_labels.name</a>
                                                        </div><!-- end bResultListItemText -->
                                                    </div><!-- end bResultListItemContent -->
                                                    <div class="bResultListItemExpandedInfo" id="bResultListItemExpandedInfo6352" style="display: none;">
                                                        <hr>
                                                    </div><!-- bResultListItemExpandedInfo -->
                                                </div>
                                            </ifcount>
                                            <!-- With Image -->
                                        <ifcount code="^ca_object_representations.media.thumbnail" min="1">
                                            <a href="/index.php/Detail/objects/^ca_objects.object_id">
                                                <div class="bResultListItem" id="row6352" onmouseover="jQuery(&quot;#bResultListItemExpandedInfo6352&quot;).show();" onmouseout="jQuery(&quot;#bResultListItemExpandedInfo6352&quot;).hide();">
                                                    <div class="bResultListItemContent">
                                                        <div class="text-center bResultListItemImg"><a href="/index.php/Detail/objects/^ca_objects.object_id">
                                                            <div class="text-center bResultListItemImg">
                                                                <a href="/index.php/Detail/objects/^ca_objects.object_id">
                                                                        ^ca_object_representations.media.small
                                                                    </a>
                                                            </div>
                                                        </div>
                                                        <div class="bResultListItemText">
                                                              <small>
                                                                <a href="/index.php/Detail/objects/^ca_objects.object_id">^ca_objects.idno</a>
                                                            </small>
                                                            <br />
                                                            <a href="/index.php/Detail/objects/^ca_objects.object_id">^ca_objects.preferred_labels.name</a>
                                                        </div><!-- end bResultListItemText -->
                                                    </div><!-- end bResultListItemContent -->
                                                    <div class="bResultListItemExpandedInfo" id="bResultListItemExpandedInfo6352" style="display: none;">
                                                        <hr>
                                                    </div><!-- bResultListItemExpandedInfo -->
                                                </div>
                                            </a>
                                        </ifcount>
                                        </unit>
                                    </ifcount>}}}
                </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end Content -->
</div><!-- end Main row -->
