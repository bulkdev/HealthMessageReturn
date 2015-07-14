<?php
namespace HMR;
//TODO: add sounds!
//Special Thanks To @JackNoordhuis
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
    

    public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getLogger()->info(TextFormat::BLUE . "HealthMessageReturn Enabled!");
    }

    public function onDeath(PlayerDeathEvent $event) {
        $cause = $event->getEntity()->getLastDamageCause();
        if($cause instanceof EntityDamageByEntityEvent) {
            $player = $event->getEntity();
            $killer = $event->getEntity()->getLastDamageCause()->getDamager();
$player->sendMessage(TextFormat::RED.$killer->getName() . TextFormat::GOLD." Killed you with " .TextFormat::LIGHT_PURPLE.$killer->getHealth() / 2 .TextFormat::RED." hearts left!");
            if($killer instanceof Player) {
 $killer->sendMessage("You Killed" .$player->getName()."!");
				}
            }
        }

}
