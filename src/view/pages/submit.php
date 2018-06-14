<section class="submit-s1">
  <h1 class="hide">Submit your work</h1>
  <div class="s1-div">
    <h2 data-content="submit" class="submit-s1h1">Submit</h2>
    <h2 data-content="your work" class="submit-s1h2">your work</h2>
  </div>

  <article class="s1a1">
      <h2 class="hide">Upload</h2>
      <picture class="s1-img">
        <source srcset="assets/img/shirley-temple-small.webp" media="(max-width: 1023px)" type="image/webp" />
        <source srcset="assets/img/shirley-temple-small.jpg" media="(max-width: 1023px)" type="image/png">
          <source srcset="assets/img/shirley-temple-big.webp" media="(min-width: 1024px)" type="image/webp" />
        <source srcset="assets/img/shirley-temple-big.jpg" media="(min-width: 1024px)" type="image/png">
        <img class="s1-img" src="assets/img/shirley-temple-small.jpg" alt="art of the month template"
        sizes="(max-width: 1023px) 100vw,
                (min-width: 1024px) 44vw">
      </picture>

      <div class="s1a1-div">
        <p class="s1-p">you're working on <strong class="s1-p-strong">Shirley Temple</strong> by Salvador Dali</p>
        <a class="download-btn" href="/assets/img/shirley-temple-big.jpg" download="shirley-temple.jpg">Download</a>
        <p class="or">or</p>
        <a href="#" class="upload-btn">Upload your artwork</a>
      </div>
  </article>

  <article class="s1a2">
    <h2 class="s1a2-h2">Upload your artwork!</h2>
    <p class="s1a2-p">all fields are required</p>

    <form class="submitForm dropzone" action="index.php?page=submit" method="post" enctype="multipart/form-data">

      <input type="hidden" name="action" value="submitArt">

      <div class="subform-div">
          <div class="nameTitle">
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
          </div>

          <label for="email">
            <span class="titleAccent upload-lbl">Email address</span>
            <div class="textInput">
              <input type="email" name="email" id="email" placeholder="salvadordali04@gmail.com" required class="submit-input input1024"/>
            </div>
            <span class="validator"></span>
          </label>

          <label for="concept">
             <span class="titleAccent upload-lbl">concept</span>
             <div class="textInput">
               <textarea name="concept" id="concept" class="textarea" placeholder="What is the idea behind your work"></textarea>
             </div>
             <span class="validator"></span>
           </label>
        </div>

       <div class="fuckingshit">
         <div class="dragAndDrop">
           <label for="artwork" class="drop-lbl">Drop your art here</label>

             <div class="drop-div">
               <input type="file"
                name="artwork"
                accept="image/png, image/jpeg, image/gif" class="submit-drop"/>
             </div>
             <span class="validator upload-validate"></span>
          </div>

          <label for="terms">
            <div class="terms-div">
              <span class="titleAccent agree">I agree with the terms and conditions</span>
              <div class="textInput">
                <input class="checkbox" type="checkbox" name="terms" id="terms" required>
                <span class="checkmark2"></span>
              </div>
            </div>
            <span class="validator agree-message"></span>
          </label>

               <div class="submitSubmit">
          <input type="submit" name="submit" value="Submit your work" class="submitSubmit">
               </div>
       </div>

    </form>
  </article>
</section>
