<?php
$msg1=$msg2=$msg3=$msg4=NULL;
?>
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
    <form action='/addbook' method="POST" enctype="multipart/form-data" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Enter Book Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name *" required> 
            <small class="form-text text-muted text-danger" id='errorbook_name'><?=$msg1?></small>   
          </div>
          <div class="form-group">
          <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Author Name *"  required>
             <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>  
          </div>
          
           
           <div class="form-group ">
             <input type="number" min="1" value="1" class="form-control" id="book_count" name="book_count" placeholder="Book Count *" required>
             <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>  
           </div>
      <div class="form-group">
             <textarea type="text" class="form-control" id="book_description" name="book_description" placeholder="Description *" required></textarea>
             <small class="form-text text-muted text-danger" id='errorbook_description'><?=$msg3?></small>  
           </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="book_cover" accept="image/*" name="book_cover" >
        <label class="custom-file-label" for="book_cover">Book Cover * </label>
        <small class="form-text text-muted mt-0 ml-2">Note* - Size Must Be Less Than 1MB.</small>
        <small class="form-text text-muted text-danger" id='errorbook_cover'><?=$msg4?></small>
      </div>
      <div class="row">
        <label for="book_cover" class='mx-auto mt-2 align-self-center' >
          <img id="cover_image"  style='height:255px; width:170px;'> 
        </label>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Add Book</button>
    </div>
  </div>
</form>
</div>
</div>