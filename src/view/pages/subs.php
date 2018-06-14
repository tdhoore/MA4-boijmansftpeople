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
    <div class="extraFilters">
      <label for="date">
        <span class="filterName">date</span>
        <select name="date" id="date">
          <option value="2018-01-00" selected>06/2018</option>
          <option value="2018-02-00">07/2018</option>
          <option value="2018-03-00">08/2018</option>
          <option value="2018-04-00">09/2018</option>
          <option value="2018-05-00">10/2018</option>
        </select>
      </label>
      <div class="themeSearch">
        <div class="filterName">thema</div>
        <div class="date-btn"></div>
        <div class="themeCheckBoxes">
          <label class="container">
            <input type="checkbox" name="theme[]" value="1" />
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" name="theme[]" value="2" />
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" name="theme[]" value="3" />
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" name="theme[]" value="4" />
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <label for="remix" class="remix date-btn">
        <span class="filterName">remix</span>
        <input type="checkbox" name="remix" id="remix" />
        <span class="checkmark"></span>
      </label>
      <div class="submitBtn">
        <span class="filterName">clear</span>
        <input type="submit" name="submit" value="search" class="btn" />
      </div>
    </div>
  </form>
  <div class="infinite">
    <?php foreach ($userArt as $value) { ?>
      <article class="subsItem">
        <header>
          <h3><?php echo $value['artTitle']; ?></h3>
          <p><span>BY</span><?php echo $value['artistName']; ?></p>
        </header>
        <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['artTitle']; ?>" />
      </article>
    <?php }?>
  </div>
</section>
