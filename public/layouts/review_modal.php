<div class="modal fade" id="review" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="review-box">
              <div class="critc">
                <header><h4>Some name</h4><h5>&nbsp2018.07.30 9.00 AM</h5></header>
              </div>
              <div class="review-content">
                <article>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </article>
              </div>
              <div class="window-action">
                <button type="button" name="review-edit" data-toggle="modal" data-target="#edit_review" title="Edit" data-dismiss="modal"><i class="fa fa-edit"></i></button>
                <button type="button" name="review-delete" title="Delete"><i class="fa fa-close"></i></button>
              </div>
            </div>
            <p class="show-more">Show More</p>
          </div>
          <div class="modal-footer">
            <form class="modal-form" action="" method="post">
              <div class="form-groupt cmt-txt">
                <label for="comment" id="cmt-lbl">Review</label><br>
                <textarea rows="3" class="comment"></textarea>
              </div>
              <div class="form-group btn-cmt-sec">
                <br>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                <button type="submit" name="btn-review" class="btn-scs btn-cmt" id="">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
