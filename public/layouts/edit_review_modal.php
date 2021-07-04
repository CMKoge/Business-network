<div class="modal fade" id="edit_review" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form class="modal-form" action="" method="post">
              <div class="form-groupt cmt-txt">
                <label for="comment" id="cmt-lbl">Review</label><br>
                <textarea rows="3" class="comment"></textarea>
              </div>
              <div class="form-group btn-cmt-sec">
                <br>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                <button type="submit" name="btn-review" class="btn-scs btn-cmt" id="">Update</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
