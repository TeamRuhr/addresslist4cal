.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

This chapter describes how to manage the extension from a superuser point of view.

------------------------
Installing the extension
------------------------

The extension is installed like any other extension via the TYPO3 extension repository.
When installing a new field *tx_addresslist4cal_addresses* is added to the *tx_cal_event* table.

------------------------
TypoScript configuration
------------------------

^^^^^^^^^^
detailPage
^^^^^^^^^^

The TypoScript setting *detailPage* defines the page id of the page with the detail view of an address record.

::

	plugin.tx_addresslist4cal.detailPage = 81

^^^^^^^^^^^^^^^
addressUidParam
^^^^^^^^^^^^^^^

The TypoScript setting *addressUidParam* defines the url parameter that passes the uid of the tt_address record
to the detail page.

::

	plugin.tx_addresslist4cal.addressUidParam = tx_wtdirectory_pi1[show]

^^^^^^^^^^
dateFormat
^^^^^^^^^^

The TypoScript setting *dateFormat* defines the format of the birthday of an address record.

::

	plugin.tx_addresslist4cal.dateFormat = %d.%m.%Y


.. _my-templating-label:

----------
Templating
----------

The templating is done by enhancing the existing cal event template.

In the *event_model.tmpl* file the section **TEMPLATE_PHPICALENDAR_EVENT** has to be enhaced.

The template for displaying every single address record must created inside of the section
**TEMPLATE_PHPICALENDAR_EVENT**.
The marker for the single address template is **ADDRESSLIST4CAL_ADDRESS**. A sample template part looks like this:

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


For each *tt_address* record this template is used and concatenated to the previous one.
Inside the template you can use all field names of the *tt_address* record (in upper case) as marker.

The complete address list is then inserted inside the **TEMPLATE_PHPICALENDAR_EVENT** section
with the marker **ADDRESSLIST4CAL** .

Using the TypoScript settings for the detail page, the template part looks like this:

::

	<!-- ###ADDRESSLIST4CAL_ADDRESS### begin -->
	###LAST_NAME###, ###FIRST_NAME###<br />
	<a href="###DETAIL_PAGE_URL###">Details...</a><br />
	<hr />
	<!-- ###ADDRESSLIST4CAL_ADDRESS### end -->

Here is a list of all possible tt_address fields:

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

The Gender character (m, f) is replaced by the locallang backend translation of the tt_address table.

The Birthday is converted into a user readable date representation.
The default is the international date format (%Y-%m-%d) and can be changed via TypoScript.

