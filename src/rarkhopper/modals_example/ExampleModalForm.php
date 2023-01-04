<?php

declare(strict_types=1);

namespace rarkhopper\modals_example;

use pocketmine\player\Player;
use rarkhopper\modals\modal\element\ModalFormButton;
use rarkhopper\modals\modal\element\ModalFormElements;
use rarkhopper\modals\modal\ModalFormResponse;
use rarkhopper\modals\modal\ModalFormBase;


class ExampleModalForm extends ModalFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : ModalFormElements{
		return new ModalFormElements(
			'TestForm',
			'あなたはバッタ？',
			new ModalFormButton('yes'),
			new ModalFormButton('no')
		);
	}

	protected function onSubmit(Player $player, ModalFormResponse $response) : void{
		var_dump($response->getPressedElement());
		var_dump($response->getRawResponse());
		(new ExampleMenuForm())->send($player);
	}
}