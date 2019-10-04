<?php

declare(strict_types=1);

namespace Roam;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\GameMode;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Roam extends PluginBase {

        public function onEnable(){
            $this->getLogger()->info(TextFormat::GREEN. "Roam Enabled: Made by TeMp3r126");
        }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        $cmd = strtolower($cmd->getName());
		$count = count($args);
		switch ($cmd){
        case "roam":
				if (!($sender instanceof Player)){
				$sender->sendMessage(Colour::DARK_RED."This command can only be executed in-game");
				return true;
				}
					$player = $this->getServer()->getPlayer($sender->getName());
					if ($player->hasPermission("roam")){
					if ($player->getGamemode() == 3){
					$player->sendMessage("You are already in Roaming mode");
                    			$player->setGamemode(0);
						} else {
							$player->setGamemode(3);
							$player->sendMessage("You are now in Roaming mode");
							$name = $player->getName();
							}
							return true;
								} else {
									$player->sendMessage(Colour::DARK_RED."You do not have permission to run this command!");
									return true;
									}
									break;
										}
		return true;
        }
        
        public function onDisable(){
            $this->getLogger()->info(TextFormat::RED. "Roam Disabled");
        }
    }
