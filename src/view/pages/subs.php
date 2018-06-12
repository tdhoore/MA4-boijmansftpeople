<section>
  <h1>submissions</h1>

  <form class="submissionFilter" action="index.php" method="post" autocomplete="off">
    <input type="hidden" name="action" value="filter" />
    <label for="search">
      <span>Ik zoek</span>
      <span class="textInput">
        <input type="text" name="search" id="search" placeholder="Naam, tag, ..." class="suggestion" value=""/>
      </span>
    </label>
    <div class="locAndDate">
      <label for="location">
        <span>in</span>
        <span class="textInput">
        <input type="text" name="location" id="location" placeholder="Stad of postcode" class="suggestion" value=""/>
      </span>
      </label>
      <label for="date">
        <span>op</span>
        <select class="" name="date" id="date">
          <option value="0">Alles</option>
          <option value="09-09-2018">09/09</option>
          <option value="16-09-2018">16/09</option>
          <option value="17-09-2018">17/09</option>
          <option value="18-09-2018">18/09</option>
          <option value="22-09-2018">22/09</option>
        </select>
      </label>
    </div>
    <input type="submit" name="submit" value="search" class="btn" />
  </form>
  <div class="infinite">
    <?php foreach ($userArt as $value) { ?>
      <article>
        <header>
          <h3><?php echo $value['artTitle']; ?></h3>
          <p><span>BY</span><?php echo $value['artistName']; ?></p>
        </header>
        <img src="<?php echo $value['imgage']; ?>" alt="<?php echo $value['artTitle']; ?>" />
      </article>
    <?php }?>
  </div>
</section>
