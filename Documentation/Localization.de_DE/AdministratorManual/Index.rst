.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Handbuch
======================

Dieser Abschnitt beschreibt die Handhabung der Erweiterung aus der Sicht eines Administrators.

----------------------------
Installation der Erweiterung
----------------------------

Die Erweiterung wird wie jede andere Erweiterung über das TYPO3 Extension Repository installiert.
Bei der Installation wird ein neues Feld *tx_addresslist4cal_addresses* zu der *tx_cal_event* Tabelle hinzugefügt.

------------------------
TypoScript Konfiguration
------------------------

^^^^^^^^^^
detailPage
^^^^^^^^^^

Die TypoScript Einstellung *detailPage* definiert die Seiten ID der Seite mit der Detailansicht eines Adress-Datensatzes.

::

	plugin.tx_addresslist4cal.detailPage = 81

^^^^^^^^^^^^^^^
addressUidParam
^^^^^^^^^^^^^^^

Die TypoScript Einstellung *addressUidParam* definiert den URL Parameter in dem die UID des Adress-Datensatzes
an die Detailseite übergeben wird.

::

	plugin.tx_addresslist4cal.addressUidParam = tx_wtdirectory_pi1[show]

^^^^^^^^^^
dateFormat
^^^^^^^^^^

Die TypoScript Einstellung *dateFormat* definiert das Format der Anzeige des Geburtstages eines Adress-Datensatzes.

::

	plugin.tx_addresslist4cal.dateFormat = %d.%m.%Y


.. _my-templating-label:

----------
Templating
----------

Das Templating erfolgt durch die Erweiterung der vorhandenen Kalender Templates.

In der Datei *event_model.tmpl* muss der Bereich **TEMPLATE_PHPICALENDAR_EVENT** erweitert werden.

Das Template für die Anzeige eines einzelnen Adress-Datensatzes muss innerhalb des Bereichs
**TEMPLATE_PHPICALENDAR_EVENT** erstellt werden.
Der Marker für das Template eines einzelnen Adress-Datensatzes ist **ADDRESSLIST4CAL_ADDRESS**.
Ein Beispiel Template Teil sieht so aus:

::

	<!--###TEMPLATE_PHPICALENDAR_EVENT### begin -->
	<!--phpicalendar_event.tmpl-->
		...
		###ADDRESSLIST4CAL###
		...
		<!-- ###SUBSCRIPTION### start -->
		...
		<!-- ###SUBSCRIPTION### end -->
		<!-- ###ADDRESSLIST4CAL_ADDRESS### begin -->
		###LAST_NAME###, ###FIRST_NAME###<br />
		<hr />
		<!-- ###ADDRESSLIST4CAL_ADDRESS### end -->
	<!--/phpicalendar_event.tmpl-->
	<!--###TEMPLATE_PHPICALENDAR_EVENT### end -->


Für jeden *tt_address* Datensatz wird dieses Template verwendet und an den vorhergehenden angehangen.
Innerhalb des Template können alle Feldnamen des *tt_address* Datensatzes (in Großschrift) als Marker verwendet werden.

Die komplette Adress-Liste wird dann innerhalb des **TEMPLATE_PHPICALENDAR_EVENT** Bereichs durch den
Marker **ADDRESSLIST4CAL** eingefügt.

Durch die Verwendung der TypoScript Einstellungen für die Detail-Seite sieht der Template Teil wie folgt aus:

::

	<!-- ###ADDRESSLIST4CAL_ADDRESS### begin -->
	###LAST_NAME###, ###FIRST_NAME###<br />
	<a href="###DETAIL_PAGE_URL###">Details...</a><br />
	<hr />
	<!-- ###ADDRESSLIST4CAL_ADDRESS### end -->

Hier ist eine Liste aller möglichen tt_address Felder:

::

	###NAME###
	###GENDER###
	###FIRST_NAME###
	###MIDDLE_NAME###
	###LAST_NAME###
	###BIRTHDAY###
	###TITLE###
	###EMAIL###
	###PHONE###
	###FAX###
	###MOBILE###
	###WWW###
	###ADDRESS###
	###BUILDING###
	###ROOM###
	###COMPANY###
	###CITY###
	###ZIP###
	###REGION###
	###COUNTRY###
	###DESCRIPTION###
	###IMAGE###
	###DETAIL_PAGE_URL###

Das Geschlechtskennzeichen (m, f) wird ersetzt durch die locallang Backend Übersetzung der tt_address Tabelle.

Das Geburtsdatum wird in eine benutzerlesbare Form umgewandelt.
Die Voreinstellung ist das internationale Datumsformat (%Y-%m-%d) das mittels TypoScript geändert werden kann.

