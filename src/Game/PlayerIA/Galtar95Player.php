<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author Galtar95
 */
class Galtar95Player extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        if ($this->result->getNbRound() == 0)
            return parent::foeChoice();
        if (!in_array(parent::foeChoice(),  $this->result->getChoicesFor($this->opponentSide)))
            return parent::friendChoice();
        if (!in_array(parent::friendChoice(),  $this->result->getChoicesFor($this->opponentSide)))
            return parent::foeChoice();
        $dream_team = array('PacoTheGreat', 'Felixdupriez', 'Shiinsekai', 'GHope', 'Christaupher', 'Benli06', 'Etienneelg', 'Sky555v');
        $name = $this->result->getStatsFor($this->opponentSide)['name'];
        if (in_array($name, $dream_team))
            return parent::friendChoice();
        $friend = 0;
        $foe = 0;
        $all = $this->result->getChoicesFor($this->opponentSide);
        for ($i = 0; $i < count($all); $i++) {
            if ($all[$i] == parent::friendChoice())
                $friend++;
            else
                $foe++;
        }
        if ($friend >= $foe)
            return parent::foeChoice();
        else {
            if ($this->result->getLastChoiceFor($this->opponentSide) == parent::friendChoice()) {
                return parent::foeChoice();
            }
            return parent::friendChoice();
        }
    }
 
};
