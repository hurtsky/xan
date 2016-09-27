<?php if (!defined('FLUX_ROOT')) exit;
/**
 * ======================================
 *  TOP pvp Ranking Base on Kills
 *  Ranks are base on Player Kills ratio
 * --------------------------------------
 *  Author: "Gerome" John Gerome L. Baldonado
 *  Email: johngerome@gmail.com
 *  http://rathena.org/board/user/715-gerome/
 *  Requirements: pvpranking addons
 */
$gthemeErrMsg = NULL;
$x = 0;
$pvpladder	= Flux::config('FluxTables.pvpladder'); 
$player = array();

if(!$pvpladder){
	$gthemeErrMsg = 'PvpRanking Addons by Gerome is not installed!.';
}else{
	$sql = "SELECT  `char`.`name` , `kills`, `deaths` FROM {$server->charMapDatabase}.`char` JOIN $pvpladder ON $pvpladder.char_id = `char`.char_id WHERE `kills` > $minimumkills  ORDER BY `kills` DESC LIMIT 5 ";
	$sth = $server->connection->getStatement($sql);
	$sth->execute();
	$rankings= $sth->fetchAll();

foreach($rankings as $rank):
    $player['name'][$x] = $rank->name;
    $player['kills'][$x] = $rank->kills;
    $player['deaths'][$x] = $rank->deaths;
    $x+=1;
endforeach;

}
?>
<?php if($gthemeErrMsg): ?>
<p class="red"><?php echo $gthemeErrMsg ?></p>
<?php else: ?>
<div id="PvpRankTop">
    Ranks are based on <br/>Player kill death ratio<br/> (minimum of <?php echo $minimumkills; ?> kills)
</div>
<?php if($rankings): ?>
<table id="Rankings" class="cleanMP">
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th class="Kills">Kills</th>
            <th class="Deaths">Deaths</th>
        </tr>
<?php for( $x=0; $x < $minimumRank ;$x++ ): ?>
<?php $y = $x+1; ?>
        <tr>
            <td class="pvprank cleanMP"><?php if($x == 0) {echo $y.'st';}elseif($x == 1) {echo $y.'nd';}elseif($x == 2) {echo $y.'rd';}elseif($x == 3) {echo $y.'th';} else { echo $y.'th'; }  ?></td>
            <td class="pvpname cleanMP"><?php echo $player['name'][$x]; ?></td>
            <td class="pvpkills cleanMP"><?php echo $player['kills'][$x]; ?></td>
            <td class="pvpdeaths"><?php echo $player['deaths'][$x]; ?></td>
        </tr>
<?php endfor; ?>
</table>
<?php else: ?>
<p style="color: #FFF; margin-left: 30px;">No Player(s) Found.</p>
<?php endif; ?>
<a href="<?php echo htmlspecialchars($this->url('ranking','pvpranking')); ?>" id="seemore">See More..</a> 
<?php endif; ?>
