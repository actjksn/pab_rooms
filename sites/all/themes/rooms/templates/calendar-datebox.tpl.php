<?php
// $Id: calendar-datebox.tpl.php,v 1.2.2.3 2010/11/21 14:15:32 karens Exp $
/**
 * @file 
 * Template to display the date box in a calendar.
 *
 * - $view: The view.
 * - $granularity: The type of calendar this box is in -- year, month, day, or week.
 * - $mini: Whether or not this is a mini calendar.
 * - $class: The class for this box -- mini-on, mini-off, or day.
 * - $day:  The day of the month.
 * - $date: The current date, in the form YYYY-MM-DD.
 * - $link: A formatted link to the calendar day view for this day.
 * - $url:  The url to the calendar day view for this day.
 * - $selected: Whether or not this day has any items.
 * - $items: An array of items for this day.
 */
?>
<div class="<?php print $granularity ?> <?php print $class; ?>"> 
<?php
  // this fixes the date links for the calendar in the presence of a room being selected
  if (isset($_GET['room']) && ($_GET['room'] != 'All')) {
    $mo = substr($url, 37, 2); // this is sort of dependent on hard coding at the moment, will have to fix based on url
    // now setting for push, 6/2/2011
    // using pab-rooms.local, offset is 37, 2
    // for http://164.67.57.153/calendar/2011-05-31?room=2343, the offfset would be 35, 2
    print "<a href=\"/node/add/room-reservation/?edit[field_date][value][date]=".date("$mo/$day/Y")."&edit[field_date][value2][date]=".date("$mo/$day/Y")."&edit[field_room][value]=".$_GET['room']."\">$day</a>";
  }
  elseif ($_GET['room'] == 'All') {
    print "<a href=\"/node/add/room-reservation/?edit[field_date][value][date]=".date(substr($url, 37, 2)."/$day/Y")."&edit[field_date][value2][date]=".date(substr($url, 37, 2)."/$day/Y")."\">$day</a>";
  }
  else {
    print "<a href=\"/node/add/room-reservation/?edit[field_date][value][date]=".date(substr($url, -5, 2)."/$day/Y")."&edit[field_date][value2][date]=".date(substr($url, -5, 2)."/$day/Y")."\">$day</a>";
  }
?></div>
