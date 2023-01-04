<?php

declare(strict_types=1);

namespace rarkhopper\modals_example;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;

class ModalsExamplePlugin extends PluginBase implements Listener{
	protected function onEnable() :void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onJoin(PlayerJoinEvent $ev):void{
		(new ExampleModalForm())->send($ev->getPlayer());
	}
}