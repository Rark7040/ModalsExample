<?php

declare(strict_types=1);

namespace rarkhopper\modals_example;

use pocketmine\player\Player;
use rarkhopper\modals\custom\CustomFormBase;
use rarkhopper\modals\custom\CustomFormResponse;
use rarkhopper\modals\custom\element\CustomFormElements;
use rarkhopper\modals\custom\element\CustomFormOptions;
use rarkhopper\modals\custom\element\DropDown;
use rarkhopper\modals\custom\element\Input;
use rarkhopper\modals\custom\element\Label;
use rarkhopper\modals\custom\element\Slider;
use rarkhopper\modals\custom\element\StepSlider;
use rarkhopper\modals\custom\element\Toggle;
use function var_dump;
use const PHP_EOL;

class ExampleCustomForm extends CustomFormBase{

	public function __construct(){
		parent::__construct($this->createElement());
	}

	private function createElement() : CustomFormElements{
		$options = new CustomFormOptions();
		$options->append(new Slider('slider', 'すらいだああ', 0, 0, 100))
			->append(new Input('name', 'なまえええええ', 'name', 'rarkhopper'))
			->append(new StepSlider('step', 'すてえっぷ', 2, '1', '2','3','4','5'))
			->append(new DropDown('dropdown', 'どろっぷ', 2, '1', '2','3','4','5'))
			->append(new Label('label', 'rarrrrrrrrrrrrrr'))
			->append(new Toggle('toggle', 'ahoi', false));
		return new CustomFormElements('TestForm', $options);
	}

	protected function onSubmit(Player $player, CustomFormResponse $response) : void{
		foreach($response->getAllResponse() as $key => $res){
			echo '[Response] ' . $key . ' ';
			var_dump($res);
		}

		foreach($response->getRawResponse() as $key => $res){
			echo '[Raw]' . $key . ' ';
			var_dump($res);
		}
	}
}
