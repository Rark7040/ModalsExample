<?php

declare(strict_types=1);

namespace rarkhopper\modals_example;

use pocketmine\player\Player;
use rarkhopper\modals\menu\element\ButtonImage;
use rarkhopper\modals\menu\element\ButtonList;
use rarkhopper\modals\menu\element\MenuFormButton;
use rarkhopper\modals\menu\MenuFormBase;
use rarkhopper\modals\menu\element\MenuFormElements;
use rarkhopper\modals\menu\MenuFormResponse;

class ExampleMenuForm extends MenuFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : MenuFormElements{
		$buttons = new ButtonList();
		$buttons->append(new MenuFormButton('hoge', new ButtonImage(ButtonImage::TYPE_URL, 'https://img/hoge')))
			->append(new MenuFormButton('aho'))
			->append(new MenuFormButton('rrrrrrr'))
			->append(new MenuFormButton('uoooo'));
		return new MenuFormElements('TestForm', 'ボタンを選んでね！', $buttons);
	}

	protected function onSubmit(Player $player, MenuFormResponse $response) : void{
		var_dump($response->getPressedElement());
		var_dump($response->getRawResponse());
		(new ExampleCustomForm())->send($player);
	}
}