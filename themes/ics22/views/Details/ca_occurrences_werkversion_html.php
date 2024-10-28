<?php
    $t_item = $this->getVar('item');
    $va_comments = $this->getVar('comments');
    $vn_comments_enabled = $this->getVar('commentsEnabled');
    $vn_share_enabled = $this->getVar('shareEnabled');
?>
    <div class='col-xs-12 navTop'><!--- only shown at small screen size -->
        {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
    </div><!-- end detailTop -->
    <div class='navLeftRight col-xs-1 col-sm-1 col-md-1 col-lg-1'>
        <div class="detailNavBgLeft">
            {{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
        </div><!-- end detailNavBgLeft -->
    </div><!-- end col -->
<div class="row" style="margin-bottom: 25px;">
	<div class='col-xs-12 col-sm-10 col-md-10 col-lg-10'>
		<div class="container">
			<div class="row"> <!-- Name und Typ -->
				<div class='col-md-12 col-lg-12'>
					<H1>{{{^ca_occurrences.type_id}}}: {{{^ca_occurrences.preferred_labels.name}}}</H1>
					<h5><i>{{{^ca_occurrences.untertitel}}}</i></h5>
                    {{{<ifdef code="ca_occurrences.nonpreferred_labels"><unit delimiter="/">Alternativer Titel: ^ca_occurrences.nonpreferred_labels</unit></ifdef>}}}

                    <!--
                    {{{<unit relativeTo="ca_occurrences" resrictToTypes="serie" delimiter=", ">Folgende Nummern der Serie sind im Archiv vorhanden: ^ca_objects.seriennummer</unit>}}}
                	-->
					<!-- <H5>{{{<unit relativeTo="ca_objects_x_occurrences">^relationship_typename</unit>}}}</H5> -->
				</div><!-- end col -->
			</div><!-- end row Name und Typ -->
			<div class="row"><!-- Beschreibung, Verknüpfte Personen/Orte -->
				<div class='col-xs-12 col-md-6' style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px"> <!-- beschreibung -->
                    {{{<ifdef code="ca_occurrences.objektdescription.description_line1.descriptiontext"><H5>Description/Text</H5>^ca_occurrences.objektdescription.description_line1.descriptiontext</ifdef>}}}
					{{{<ifdef code="ca_occurrences.work_date"><H5>First publication</H5>^ca_occurrences.work_date</ifdef>}}}
					{{{<ifdef code="ca_occurrences.werk_klassifikation"><H5>Work classification</H5>^ca_occurrences.werk_klassifikation</ifdef>}}}
					{{{<ifdef code="ca_occurrences.mehrspieler"><H5>Game mode</H5>^ca_occurrences.mehrspieler</ifdef>}}}
					{{{<ifdef code="ca_occurrences.systemangabe"><H5>System</H5>^ca_occurrences.systemangabe</ifdef>}}}
					{{{<ifdef code="ca_occurrences.related.altersbeschraenkung"><H5>Age restriction</H5>
						<ifdef code="ca_occurrences.related.altersbeschraenkung.essence_line01"><b>USK:</b> ^ca_occurrences.related.altersbeschraenkung.essence_line01<br/></ifdef>
						<ifdef code="ca_occurrences.related.altersbeschraenkung.essence_line02"><b>PEGI:</b> ^ca_occurrences.related.altersbeschraenkung.essence_line02</ifdef>
						</ifdef>}}}
					{{{<ifdef code="ca_occurrences.genre"><H5>Genre</H5><unit delimiter="<br/>">^ca_occurrences.genre</unit></ifdef>}}}
			{{{
                <unit delimiter="<br/>"><h5>Systemanforderungen:</h5>
                    <ifdef code="ca_occurrences.systemanforderung.processor">CPU: ^ca_occurrences.systemanforderung.processor</ifdef><br/></ifdef>
                    <ifdef code="ca_occurrences.systemanforderung.ram">RAM: ^ca_occurrences.systemanforderung.ram<br/></ifdef>
                    <ifdef code="ca_occurrences.systemanforderung.festplatte">Festplatte: ^ca_occurrences.systemanforderung.festplatte<br/></ifdef>
                    <ifdef code="ca_occurrences.systemanforderung.aufloesung">Display resolution: ^ca_occurrences.systemanforderung.aufloesung<br/></ifdef>
                    <ifdef code="ca_occurrences.systemanforderung.farbtiefe">Color depth: ^ca_occurrences.systemanforderung.farbtiefe<br/></ifdef>
                    <ifdef code="ca_occurrences.systemanforderung.Plugin">^ca_occurrences.systemanforderung.Plugin<br/></ifdef>
                </unit>
                </ifdef>}}}
					<!--
					{{{<ifdef code="ca_occurrences.schlagwort_zeiten"><H5>Zeitbezug</H5>^ca_occurrences.schlagwort_zeiten</ifdef>}}}
					{{{<ifdef code="ca_occurrences.schlagwort_orte"><H5>Geographical reference</H5>^ca_occurrences.schlagwort_orte</ifdef>}}}
					{{{<ifdef code="ca_occurrences.schlagwort_person"><H5>Personenbezug</H5>^ca_occurrences.schlagwort_person</ifdef>}}}
					{{{<ifdef code="ca_occurrences.schlagwort_person"><H5>Themenbezug</H5>^ca_occurrences.schlagwort_themen</ifdef>}}}
					-->

					{{{<ifcount code="ca_list_items" restrictToRelationshipTypes="thema" min="1">
						Topic Reference Vocabulary Term</h5>
						<ul>
					 		<li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="thema" delimiter="<li>"><a href="/index.php/Browse/werke/facet/thema/^ca_list_items.item_id" >^ca_list_items.preferred_labels.name_singular%delimiter=_➔_</a>
							  <ul>
							 	<ifdef code="ca_list_items.wikipedia"><li><a href="^ca_list_items.wikipedia.url" target="_blank">Wikipedia: ^ca_list_items.wikipedia</a></li></ifdef>
							 	<ifdef code="ca_list_items.artandarchitecture"><li><a href="^ca_list_items.artandarchitecture.url" target="_blank">AAT: ^ca_list_items.artandarchitecture</a></li></ifdef>
							 	<ifdef code="ca_list_items.iconclass"><li><a href="^ca_list_items.iconclass.url" target="_blank">Iconclass: ^ca_list_items.iconclass</a></li></ifdef>
							 	<ifdef code="ca_list_items.viafverweis"><li><a href="^ca_list_items.viafverweis.url" target="_blank">VIAF: ^ca_list_items.viafverweis</a></li></ifdef>
							 	<ifdef code="ca_list_items.entittytgn"><li><a href="^ca_list_items.entittytgn.url" target="_blank">TGN: ^ca_list_items.entittytgn</a></li></ifdef>
								 <ifdef code="ca_list_items.wikidata"><li><a href="^ca_list_items.wikidata.url" target="_blank">Wikidata: ^ca_list_items.wikidata</a></li></ifdef>
								 <ifdef code="ca_list_items.gnd"><li><a href="^ca_list_items.gnd.url" target="_blank">GND: ^ca_list_items.gnd</a></li></ifdef>
							  </ul>
							 </unit>
                    	</ul></li>}}}
					{{{<ifcount code="ca_list_items" restrictToRelationshipTypes="person" min="1">
						Personal reference Vocabulary term</h5>
						<ul>
                        	<li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="person" delimiter="<li>"><a href="/index.php/Browse/werke/facet/person/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular%delimiter=_➔_</a>
								<ul>
							 	<ifdef code="ca_list_items.wikipedia"><li><a href="^ca_list_items.wikipedia.url" target="_blank">Wikipedia: ^ca_list_items.wikipedia</a></li></ifdef>
							 	<ifdef code="ca_list_items.artandarchitecture"><li><a href="^ca_list_items.artandarchitecture.url" target="_blank">AAT: ^ca_list_items.artandarchitecture</a></li></ifdef>
							 	<ifdef code="ca_list_items.iconclass"><li><a href="^ca_list_items.iconclass.url" target="_blank">Iconclass: ^ca_list_items.iconclass</a></li></ifdef>
							 	<ifdef code="ca_list_items.viafverweis"><li><a href="^ca_list_items.viafverweis.url" target="_blank">VIAF: ^ca_list_items.viafverweis</a></li></ifdef>
							 	<ifdef code="ca_list_items.wikidata"><li><a href="^ca_list_items.wikidata.url" target="_blank">Wikidata: ^ca_list_items.wikidata</a></li></ifdef>
								<ifdef code="ca_list_items.entittytgn"><li><a href="^ca_list_items.entittytgn.url" target="_blank">TGN: ^ca_list_items.entittytgn</a></li></ifdef>
								<ifdef code="ca_list_items.gnd"><li><a href="^ca_list_items.gnd.url" target="_blank">GND: ^ca_list_items.gnd</a></li></ifdef>
							  </ul>
							</unit>
                    	</ul></ifcount>}}}
					{{{<ifcount code="ca_list_items" restrictToRelationshipTypes="zeit" min="1">
						Time reference vocabulary term</h5>
						<ul>
                        	<li><unit relativeTo="ca_list_items" restrictToRelationshipTypes="zeit" delimiter="<li>"><a href="/index.php/Browse/werke/facet/zeit/id/^ca_list_items.item_id">^ca_list_items.preferred_labels.name_singular%delimiter=_➔_</a></unit>
                    	</ul></ifcount>}}}
					{{{<ifdef code="ca_occurrences.entittytgn">
						Geographical reference</h5>
						<ul>
                        	<li><a href="^ca_occurrences.entittytgn.url" target="_blank">^ca_occurrences.entittytgn</a>
                    	</ul></ifcount>}}}


                 </div><!-- end beschreibung -->
				<div class='col-xs-12 col-md-6' style="background: #F8F8F8;margin-bottom: 20px;padding: 1px 10px 10px 10px"> <!-- beschreibung 2 -->
                    {{{<ifcount code="ca_entities" min="1">
    					<ifcount code="ca_entities" min="1" max="1"><h5>Linked entity</h5></ifcount>
    					<ifcount code="ca_entities" min="2"><h5>Linked entityen</h5></ifcount>
    					<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</unit>
				</ifcount>}}}
				{{{<ifcount code="ca_occurrences.related" restrictToTypes="werk" min="1" max="1"><h5>Linked work</h5></ifcount>}}}
                    {{{<ifcount code="ca_occurrences.related" restrictToTypes="werk" min="2"><h5>Linked works</h5></ifcount>}}}
                    {{{<ifcount code="ca_occurrences.related" restrictToTypes="werk" min="1">
                    <unit relativeTo="ca_occurrences.related" delimiter="<br/>"><a href="/index.php/Detail/werk/^ca_occurrences.occurrence_id">^ca_occurrences.preferred_labels.name</a>
                </unit>}}}


                    </div><!-- end beschreibung 2 -->
            </div>
            <div class="row"><!-- Linked entityen/Occurrences -->

                <div class='col-xs-12 col-sm-6'>

				</div>
		    </div><!-- end row -->
            <div class="row">
                <div class="col-xs-12 col-sm-6"> <!-- Verknüpfte Objekte -->
                    {{{<ifcount code="ca_objects" min="1">
                                        <h5>Related Objects (^ca_objects._count)</h5>
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

			</div>
        </div><!-- end container -->

	</div><!-- end col -->

</div><!-- end row -->
