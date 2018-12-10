<?php 
echo '<button onclick="inputLegyen()" class="btn btn-primary" id="ujGomb">Új kategória</button>
<form style="display: none; width: 35%" id="inputForm" method="get" action="kat_mentes.php">
<div class="form-group">
    <label for="cat">Új kategória neve</label>
    <input type="text" name="ujKatNev" class="form-control" id="cat" placeholder="Név">
  </div>
  <button type="submit" class="btn btn-primary" onclick="mentettem()">Mentés</button>
</form>';