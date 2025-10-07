<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        Card::insert([
            [
                'card_name'=>'Rampant Growth',
                'mana_cost'=>'1{G}',
                'type'=>'Sorcery',
                'rarity'=>'Common',
                'rules_text'=>'Search your library for a basic land card, put that card onto the battlefield tapped, then shuffle.',
                'image'=>'blc-234-rampant-growth.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                        [
                'card_name'=>'Cosmogrand Zenith',
                'mana_cost'=>'2{W}',
                'type'=>'Creature - Human Soldier',
                'rarity'=>'Mythic Rare',
                'rules_text'=>'Whenever you cast your second spell each turn, choose one -
* Create two 1/1 white Human Soldier creature tokens.
* Put a +1/+1 counter on each creature you control.',
                'image'=>'eoe-9-cosmogrand-zenith.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                        [
                'card_name'=>'The Seriema',
                'mana_cost'=>'1{W}{W}',
                'type'=>'Legendary Artifact - Spacecraft',
                'rarity'=>'Rare',
                'rules_text'=>'When The Seriema enters, search your library for a legendary creature card, reveal it, put it into your hand, then shuffle.
Station (Tap another creature you control: Put charge counters equal to its power on this Spacecraft. Station only as a sorcery. It`s an artifact creature at 7+.)
7+ | Flying
Other tapped legendary creatures you control have indestructible.',
                'image'=>'eoe-35-the-seriema.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                        [
                'card_name'=>'Cryogen Relic',
                'mana_cost'=>'1{U}',
                'type'=>'Artifact',
                'rarity'=>'Common',
                'rules_text'=>'When this artifact enters or leaves the battlefield, draw a card.
1{U}
, Sacrifice this artifact: Put a stun counter on up to one target tapped creature. (If a permanent with a stun counter would become untapped, remove one from it instead.)',
                'image'=>'eoe-52-cryogen-relic.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                        [
                'card_name'=>'Sothera, the Supervoid',
                'mana_cost'=>'2{B}{B}',
                'type'=>'Legendary Enchantment',
                'rarity'=>'Mythic Rare',
                'rules_text'=>'Whenever a creature you control dies, each opponent chooses a creature they control and exiles it.
At the beginning of your end step, if a player controls no creatures, sacrifice Sothera, then put a creature card exiled with it onto the battlefield under your control with two additional +1/+1 counters on it.',
                'image'=>'eoe-115-sothera-the-supervoid.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                                    [
                'card_name'=>'Argent Dais',
                'mana_cost'=>'1{W}',
                'type'=>'Artifact',
                'rarity'=>'Rare',
                'rules_text'=>'This artifact enters with two oil counters on it.
Whenever two or more creatures attack, put an oil counter on this artifact.
2
,{T}, Remove two oil counters from this artifact: Exile another target nonland permanent. Its controller draws two cards.',
                'image'=>'mh3-20-argent-dais.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                                                [
                'card_name'=>'Charitable Levy',
                'mana_cost'=>'1{W}',
                'type'=>'Enchantment',
                'rarity'=>'Uncommon',
                'rules_text'=>'Noncreature spells cost 
1
 more to cast.
Whenever a player casts a noncreature spell, put a collection counter on this enchantment. Then if there are three or more collection counters on it, sacrifice it. If you do, draw a card, then you may search your library for a Plains card, put it onto the battlefield tapped, then shuffle.',
                'image'=>'mh3-21-charitable-levy.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ],
                                                [
                'card_name'=>'Phyrexian Tower',
                'mana_cost'=>'',
                'type'=>'Legendary Land',
                'rarity'=>'Mythic Rare',
                'rules_text'=>': Add 1., Sacrifice a creature: Add {B}{B}.',
                'image'=>'mh3-303-phyrexian-tower.jpg',
                'created_at'=>$currentTimestamp,
                'updated_at'=>$currentTimestamp
            ]
            //                                     [
            //     'card_name'=>'',
            //     'mana_cost'=>'',
            //     'type'=>'',
            //     'rarity'=>'',
            //     'rules_text'=>'',
            //     'image'=>'',
            //     'created_at'=>$currentTimestamp,
            //     'updated_at'=>$currentTimestamp
            // ]
        ]);
    }
}
