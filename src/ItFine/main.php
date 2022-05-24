<?php

namespace ItFine;

use pocketmine\plugin\PluginBase;
use pocketmine\events\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use jojoe77777\FormAPI\SimpleForm;
class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("Activado");
    }

    public function onDisable(): void {
        $this->getLogger()->info("Plugin Desactivado");
    }
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

        if($command->getName() == "UI"){
            if($sender instanceof Player){
                $this->newSimpleForm($sender);
            } else {
                $sender->sendMessage("Run Command In-game Only");
            }
        }

        return true;
    }

    public function newSimpleForm($player){
        $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return true;
            }

            switch($data){
                case 0:
                    $this->getServer()->getCommandMap()->dispatch($player, "transferserver");
                break;

                case 1:
                    $this->getServer()->getCommandMap()->dispatch($player, "transferserver");
                break;

                case 2:
                    $this->getServer()->getCommandMap()->dispatch($player, "transferserver");                    
                break;
                
                case 3:
                    $this->getServer()->getCommandMap()->dispatch($player, "transferserver");
                break;                                                
            }

        });
        $form->setTitle("Modalidales");
        $form->setContent("Menu!");
        $form->addButton("transferserver\nClick Para Ir Al Server", "0", "textures/others/sell");
        $form->addButton("transferserver\nClick Para Ir Al Server", "0", "textures/others/sell");
        $form->addButton("transferserver\nClick Para Ir Al Server", "0", "textures/others/sell");
        $form->addButton("transferserver\nClick Para Ir Al Server", "0", "textures/others/sell");
        $form->sendToPlayer($player);
        return $form;
    }

}
