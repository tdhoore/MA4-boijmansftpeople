<section>
  <h1>Submit your work</h1>
  <article class="">
    <h2 class="hide">Upload</h2>
    <img src="#" alt="">
    <p>you're working on Shirley Temple by Salvador Dali</p>
    <a href="#">Download</a>
    <a href="#">Upload your artwork</a>
  </article>
  <article class="">
    <h2>Upload your artwork!</h2>
    <form class="submitForm dropzone" action="index.php?page=submit" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="submitArt">
      <label for="artistname">
        <span class="titleAccent">Artist name</span>
        <div class="textInput">
          <input type="text" name="artistname" id="artistname" placeholder="Annabellini" required/>
        </div>
        <span class="validator"></span>
      </label>

      <label for="title">
        <span class="titleAccent">Name your artwork</span>
        <div class="textInput">
          <input type="text" name="title" id="title" placeholder="Shirley Temple" required/>
        </div>
        <span class="validator"></span>
      </label>

      <label for="email">
        <span class="titleAccent">Enter your email</span>
        <div class="textInput">
          <input type="email" name="email" id="email" placeholder="salvadordali04@gmail.com" required/>
        </div>
        <span class="validator"></span>
      </label>

      <label for="concept">
        <span class="titleAccent">concept</span>
        <div class="textInput">
          <textarea name="concept" id="concept"></textarea>
        </div>
        <span class="validator"></span>
      </label>

      <label for="terms">
        <span class="titleAccent">I agree with the terms and conditions</span>
        <div class="textInput">
          <input type="checkbox" name="terms" id="terms" required>
        </div>
        <span class="validator"></span>
      </label>

      <div class="dragAndDrop">
        <label for="artwork">Drop your art here</label>
        <input type="file"
         name="artwork"
         accept="image/png, image/jpeg, image/gif"/>
       </div>
      <input type="submit" name="submit" value="Submit your work">
    </form>
  </article>
</section>
