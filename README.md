fwCalendRPlugin
===============

Integration of the [CalendR](http://github.com/yohang/CalendR.git) library for the symfony1 framework

Calendar generation
-------------------

### Controller

```php
<?php

class someActions extends sfActions
{
  public function executeIndex()
  {
    $this->month = $this->getContext()->getMonth();
  }
}

```

### Template

```php

<table>
  <?php foreach ($month as $week): ?>
    <tr>
      <?php foreach ($week as $day): ?>
        <td>
          <?php if ($month->contains($day->getBegin())): ?>
            <?php echo $day->format('d') ?>
          <?php endif ?>
        <td>
      <?php endforeach ?>
    </tr>
  <?php endforeach ?>
</table>

```

That's all.

Event management
----------------

### Providers

To manage your events, you have to create a provider and an event class. See [CalendR doc](http://github.com/yohang/CalendR)

### Declare your provider

On Calendar construction, a `fw_calendr.construct` event is thrown. You juste hav to listen it, and to add your
providers to the event manager, for example in your ProjectConfiguration class.

Note that CalendR isn't constructed if you don't call it, so your providers won't be instantiated if not needed.

Example (for a doctrine table as provider):

```php
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->dispatcher->connect('fw_calendr.construct', function(sfEvent $event) {
      $event->getSubject()->getEventManager()->addProvider('my_awesome_event_provider', EventTable::getInstance());
    });
  }
}
```

Helpers
-------

This plugin provides some template helpers for common CalendR tasks.

 * `calendr()` : Returns a CalendR instance
 * `calendr_year()` : Returns a Year
 * `calendr_month()` : Returns Month
 * `calendr_week()` : Returns a Week
 * `calendr_day()` : Returns a Day
 * `calendr_events()` : Return en event collection for the given period.
