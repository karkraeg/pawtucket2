{{{<ifcount code="ca_collections.related" restrictToTypes="collection" min="1"><H6>Collection<ifcount code="ca_collections.related" restrictToTypes="collection" min="2">s</ifcount></H6><unit relativeTo="ca_collections" excludeTypes="collection" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l> (^relationship_typename)</unit></ifcount>}}}
{{{<ifcount code="ca_collections.related" excludeTypes="collection,source" min="1"><H6>Fond<ifcount code="ca_collections.related" restrictToTypes="source" min="2">s</ifcount>/Archival Collection<ifcount code="ca_collections.related" excludeTypes="collection,source" min="2">s</ifcount></H6><unit relativeTo="ca_collections" excludeTypes="collection,source" delimiter="<br/>"><l>^ca_collections.preferred_labels.name</l> (^relationship_typename)</unit></ifcount>}}}
{{{<ifcount code="ca_occurrences.related" restrictToTypes="exhibitions" min="1"><H6>Exhibition<ifcount code="ca_occurrences.related" restrictToTypes="exhibitions" min="2">s</ifcount></H6><unit relativeTo="ca_objects_x_occurrences" restrictToTypes="exhibitions" delimiter=", "><unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l></unit> (^relationship_typename)</unit></ifcount>}}}
{{{<ifcount code="ca_occurrences.related" restrictToTypes="institutional" min="1"><H6>Events<ifcount code="ca_occurrences.related" restrictToTypes="institutional" min="2">s</ifcount></H6><unit relativeTo="ca_occurrences" restrictToTypes="institutional" delimiter="<br/>"><l>^ca_occurrences.preferred_labels.name</l> (^relationship_typename)</unit></ifcount>}}}
{{{<ifcount code="ca_entities.related" restrictToTypes="school" restrictToRelationshipTypes="related" min="1"><H6><ifcount code="ca_entities.related" restrictToTypes="school" restrictToRelationshipTypes="related" min="1" max="1">School</ifcount><ifcount code="ca_entities.related" restrictToTypes="school" restrictToRelationshipTypes="related" min="2">Schools</ifcount></H6><unit relativeTo="ca_entities" restrictToTypes="school" restrictToRelationshipTypes="related" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</unit></ifcount>}}}
{{{<ifcount code="ca_places.related"  min="1"><H6>Place<ifcount code="ca_places.related"  min="2">s</ifcount></H6><unit relativeTo="ca_places" delimiter=", "><div class="placePlaceholder">^ca_places.preferred_labels.name</div> (^relationship_typename)</unit></ifcount>}}}
{{{<ifcount code="ca_entities.related" excludeRelationshipTypes="repository,original_source,subject,creator,contributor" excludeTypes="school" min="1"><H6><ifcount code="ca_entities.related" excludeRelationshipTypes="repository,original_source,subject,creator,contributor" excludeTypes="school" min="1" max="1">Person/Organization</ifcount><ifcount code="ca_entities.related" excludeRelationshipTypes="repository,original_source,subject,creator,contributor" excludeTypes="school" min="2">People/Organizations</ifcount></H6><unit relativeTo="ca_entities" excludeRelationshipTypes="repository,original_source,subject,creator,contributor" excludeTypes="school" delimiter="<br/>"><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</unit></ifcount>}}}
