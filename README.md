NatocTo/FootballData
======

Nette basic integration of football-data.org's API.

Installation
------------

The best way to install NatocTo/FootballData is using the [Composer](http://getcomposer.org/)

```sh
$ composer require natocto/football-data
```

and you can enable the extension using your neon config

```yml
extensions:
	footballData: NatocTo\FootballData\DI\FootballDataExtension
```

if you want increase your rate limit from 50 requests per day to 50 requests per minute you can get your free token from [football-data.org](http://football-data.org/register)

```yml
footballData:
	authToken: 'YOUR-TOKEN'
```

example of usage

```php
class FootballPresenter extends Nette\Application\UI\Presenter
{
	/**
	 * @inject
	 * @var \NatocTo\FootballData\FootballData
	 */
	public $footballData;

	public function renderDefault()
	{
		$euro2016 = $this->footballData->getSeason(424);

		$this->template->name = $euro2016->getName();

		$this->template->fixtures = $euro2016->getFixtures();
	}
}
```


Documentation
------------

There is no documentation. Just look to source code if you are interested.