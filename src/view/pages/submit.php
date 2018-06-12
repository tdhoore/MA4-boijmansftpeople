<section class="submit-s1">
  <h1 data-content="submit" class="submit-s1h1">Submit</h1>
  <h2 class="submit-s1h2">your work</h2>

  <article class="s1a1">
      <h2 class="hide">Upload</h2>
      <img src="assets/img/shirley-temple-small.jpg" alt="art of the month" width="320" height="240" class="s1-img">
      <p class="s1-p">you're working on <strong class="s1-p-strong">Shirley Temple</strong> by Salvador Dali</p>
      <a class="download-btn" href="#">Download</a>
      <p class="or">or</p>
      <a href="#" class="upload-btn">Upload your artwork</a>
  </article>

  <article class="s1a2">
    <h2 class="s1a2-h2">Upload your artwork!</h2>
    <p class="s1a2-p">all fields are required</p>

    <form class="submitForm dropzone" action="index.php?page=submit" method="post" enctype="multipart/form-data">

      <input type="hidden" name="action" value="submitArt">

      <label for="artistname">
        <span class="titleAccent upload-lbl">Artist name</span>
        <div class="textInput">
          <input type="text" name="artistname" id="artistname" placeholder="Annabellini" required class="submit-input"/>
        </div>
        <span class="validator"></span>
      </label>

      <label for="title">
        <span class="titleAccent upload-lbl">Name your artwork</span>
        <div class="textInput">
          <input type="text" name="title" id="title" placeholder="Shirley Temple" required class="submit-input"/>
        </div>
        <span class="validator"></span>
      </label>

      <label for="email">
        <span class="titleAccent upload-lbl">Email address</span>
        <div class="textInput">
          <input type="email" name="email" id="email" placeholder="salvadordali04@gmail.com" required class="submit-input"/>
        </div>
        <span class="validator"></span>
      </label>

      <div class="dragAndDrop">
        <label for="artwork" class="upload-lbl">Drop your art here</label>
        <input type="file"
         name="artwork"
         accept="image/png, image/jpeg, image/gif" class="submit-input"/>
       </div>

       <label for="tags">
         <span class="titleAccent upload-lbl">tags</span>
         <div class="textInput">
           <textarea name="tags" id="tags"></textarea>
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

      <input type="submit" name="submit" value="Submit your work">
    </form>
  </article>
</section>
