<?php
namespace HMR;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\Player;
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level\sound\PopSound;
use pocketmine\Server;
use pocketmine\math\Vector3;
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
            $fizz = new FizzSound($killer);
            $bat = new BatSound($player);
$player->sendMessage(TextFormat::RED.$killer->getName() . TextFormat::GOLD." Killed you with " .TextFormat::LIGHT_PURPLE.$killer->getHealth() / 2.TextFormat::RED." hearts left and while using ".TextFormat::BLUE.$killer->getInventory()->getItemInHand().TextFormat::RESET."!");
$player->getLevel()->addSound($bat);
if($killer instanceof Player) {
 $killer->sendMessage(TextFormat::GREEN."You Killed ".$player->getName()."!");
 $killer->getLevel()->addSound($fizz);
				}
            }
        }

}
