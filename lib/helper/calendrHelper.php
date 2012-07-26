<?php

/**
 * Evil is here.... The context that kills kitten...
 *
 * @return CalendR\Calendar
 */
function calendr()
{
  return sfContext::getCalendR();
}

/**
 * @param $year
 * @return \CalendR\Period\Year
 */
function calendr_year($year)
{
  return calendr()->getYear($year);
}

/**
 * @param int|\DateTime $year
 * @param null|int      $month
 * @return \CalendR\Period\Month
 */
function calendr_month($year, $month = null)
{
  return calendr()->getMonth($year, $month);
}

/**
 * @param $year
 * @param null $week
 * @return CalendR\Period\Week
 */
function calendr_week($year, $week = null)
{
  return calendr()->getWeek($year, $week);
}

/**
 * @param $year
 * @param null $month
 * @param null $day
 * @return CalendR\Period\Day
 */
function calendr_day($year, $month = null, $day = null)
{
  return calendr()->getDay($year, $month, $day);
}

/**
 * @param CalendR\Period\PeriodInterface $period
 * @param array $options
 * @return \CalendR\Event\Collection\CollectionInterface
 */
function calendr_events(\CalendR\Period\PeriodInterface $period, array $options = array())
{
  return calendr()->getEvents($period, $options);
}


