<section class="subs-section1">
  <h1 data-content="submissions" class="subs-s1h1">submissions</h1>

  <form class="submissionFilter" action="index.php" method="post" autocomplete="off">

    <input type="hidden" name="action" value="filter" />

    <label for="search">
      <span class="hide">Ik zoek</span>
      <span class="textInput">
        <input type="text" name="search" id="search" placeholder="SEARCH" class="suggestion" value=""/>
      </span>
    </label>

    <div class="locAndDate">
      <label for="date">
        <span class="hide">op</span>
        <select class="" name="date" id="date">
          <option value="0">Show All</option>
          <option value="09-09-2018">06/18</option>
          <option value="16-09-2018">05/18</option>
          <option value="17-09-2018">04/18</option>
          <option value="18-09-2018">03/18</option>
          <option value="22-09-2018">02/18</option>
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
