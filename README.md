# addresslist4cal
Adds selection of TYPO3 tt_address records to the CAL extension.

##What does it do?

This extension adds usage of tt_address records for cal events.
Maybe your cal events are sessions which have one ore more speaker.
For this case you can add the speaker (tt_address record) to the cal event with the use of this extension.

##Administration / Configuration

In the BE you only have to select the tt_address records which should be displayed within the cal event display.

The needed changes for the cal event template are described in the templating section of the documentation.

If you want to add a link to a detail page, using wt_directory for example, you can add TypoScript configuration to add creation of the target url of the detail page.