<?php

use CalendR\Calendar;

/**
 * Configuration class for the plugin
 *
 * @author Yohan Giarelli <yohan@giarel.li>
 */
class fwCalendRPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @var \CalendR\Calendar
   */
  protected $calendr;

  /**
   * Configures the plugin, plug the events.
   */
  public function configure()
  {
    $that = $this;
    $this->dispatcher->connect(
      'context.method_not_found',
      function(sfEvent $event) use ($that)
      {
        if ('getCalendR' == $event['method'])
        {
          $event->setProcessed(true);
          $event->setReturnValue($that->getCalendR());
        }
      }
    );
  }

  /**
   * @return CalendR\Calendar
   */
  public function getCalendR()
  {
    if (null === $this->calendr)
    {
      $this->calendr = new CalendR\Calendar();
      $this->dispatcher->notify(new sfEvent($this->calendr, 'fw_calendr.construct'));
    }

    return $this->calendr;
  }
}
