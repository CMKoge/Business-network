$(document).ready(function() {
  // Review Submit
  $(document).on('click','.rew_btn',function(){
    var biz_id = $(this).attr('bizid');
    var pass = $('#pass_'+biz_id).val();
    var review = $('#review_'+biz_id).val();
    var user_id = $(this).attr('userid');
    if(review !=''){
      // Insert Review
      $.ajax({
        url: '../public/user/add_review.php',
        type: 'POST',
        data: $('#reviewform_'+biz_id).serialize(),
        success:function(data){
          if (data !='') {
            $('#postList_'+biz_id).append(data);
          }
        }
      });
      // Insert Notification
      $.ajax({
        url: '../public/user/notify.php',
        type: 'POST',
        data: {'reciver':user_id, 'type':'2', 'action':'send'}
      });
    } else {
      alert('Review Can not be empty');
      return false;
    }
  });

  // Rank
  $(document).on('click', '.rank', function(event) {
    event.preventDefault();
    var biz_id = $(this).attr('bizid');
    var rank = $(this).attr('rank');
    var user_id = $(this).attr('userid');
    // Insert Rate
    $.ajax({
      url: '../public/user/rank.php',
      type: 'POST',
      data: {'biz_id':biz_id, 'rank':rank},
      success:function(data){
      }
    });
    // Insert Notification
    $.ajax({
      url: '../public/user/notify.php',
      type: 'POST',
      data: {'reciver':user_id, 'type':'1', 'action':'send'}
    });
  });

  // Show More
  $(document).on('click','.show_more',function(event){
        event.preventDefault();
        var rew_id = $(this).attr('rewid');
        var biz_id = $(this).attr('bizid');
        $('.show_more').html("Loading...");
        $.ajax({
            type:'POST',
            url:'../public/user/load_more_data.php',
            data:{'rew_id':rew_id, 'biz_id':biz_id},
            success:function(data){
              if (data !='') {
                $('#show_more_main_'+rew_id).remove();
                $('#postList_'+biz_id).append(data);
              } else {
                $('.show_more').hide();
              }
            }
        });
    });

  // Track Button
  $(document).on('click','.track_btn',function(event){
        event.preventDefault();
        var tracking_id = $(this).attr('id');
        var user_id = $(this).attr('userid');
        // Track Businees
        $.ajax({
            type:'POST',
            url:'../public/user/track_business.php',
            data:{'tracking_id':tracking_id},
            success:function(data){
            if (data) {
              } else {
                alert("Something Wrong");
              }
            }
        });
        // Insert Notification
        $.ajax({
          type: 'POST',
          url: '../public/user/notify.php',
          data: {'reciver':user_id, 'type':'3', 'action':'send'}
        });
  });

  // Suggestion Submit
  $(document).on('click', '.sgs_btn', function() {
    var biz_id = $(this).attr('bizid');
    var pass = $('#pass_'+biz_id).val();
    var suggestion = $('#suggestion_'+biz_id).val();
    var user_id = $(this).attr('userid');
    if(suggestion !='') {
      // Insert Suggestion
      $.ajax({
        url: '../public/user/suggest.php',
        type: 'POST',
        data: $('#suggestform_'+biz_id).serialize(),
        success:function(data) {
        }
      });
      // Insert Notification
      $.ajax({
        type: 'POST',
        url: '../public/user/notify.php',
        data: {'reciver':user_id, 'type':'6', 'action':'send'}
      });
    } else {
      alert('Suggestion Can not be empty');
      return false;
    }
  });

  // Delete Suggestion
  $(document).on('click', '.sgs_del', function(event) {
    event.preventDefault();
    var del = $(this).attr('id');
    $.ajax({
      url: '../public/user/suggest.php',
      type: 'GET',
      data: {'del': del, 'action':'delete'},
      success:function(data) {
        $('#content_'+del).remove();
        $('#del_'+del).remove();
        alert("Suggestion Deleted Successfully");
      }
    });
  });

  // Pin Suggestion
  $(document).on('click', '.sgs_pin', function(event) {
    event.preventDefault();
    // Insert Pin
    var sgs_id = $(this).attr('sgsid');
    var biz_id = $(this).attr('bizid');
    var user_id = $(this).attr('userid');
    $.ajax({
      url: '../public/user/suggest.php',
      type: 'POST',
      data: {'sgs_id':sgs_id, 'biz_id':biz_id, 'action':'pin'},
      success:function(data) {
        $('#pin_'+sgs_id).remove();
      }
    });
    // Insert Notification
    $.ajax({
      type: 'POST',
      url: '../public/user/notify.php',
      data: {'reciver':user_id, 'type':'7', 'action':'send'}
    });
  });

  // Like or Dislike Suggestion
  $(document).on('click', '.contribute', function(event) {
    event.preventDefault();
    // Insert contribute
    var sgs_id = $(this).attr('sgsid');
    var value = $(this).attr('value');
    var user_id = $(this).attr('userid');
    $.ajax({
      url: '../public/user/suggest.php',
      type: 'POST',
      data: {'sgs_id':sgs_id, 'value':value, 'action':'con'},
      success:function(data) {
        $('#con_'+sgs_id).remove();
        console.log(data);
      }
    });
    // Insert Notification
    $.ajax({
      type: 'POST',
      url: '../public/user/notify.php',
      data: {'reciver':user_id, 'type':'8', 'action':'send'},
      success:function(data) {
        console.log(data);
      }
    });
  });

  function load_unseen_notification(view = ''){
    $.ajax({
      url:"../public/user/notify.php",
      method:"POST",
      data:{view:view,'action':'recive'},
      success:function(data) {
        $('.dropdown-menu').append(data);
      }
    });
  }

  load_unseen_notification();

  $(document).on('click', '.dropdown-toggle', function(){
    load_unseen_notification('yes');
    $('.dropdown-toggle').html('Notification');
  });

  // Change Visibility of Reg Details
  $('#chk-reg-biz').change(function() {
    if($(this).is(':checked'))
            $('#reg-div').css('display', 'block');
        else
            $('#reg-div').css('display', 'none');
  });

  // Check User Accept Terms and Policy
  $('.check-accept').change(function() {
    if($(this).is(':checked'))
            $('.btn-signup').removeAttr('disabled');
        else
            $('.btn-signup').attr('disabled', 'disabled');;
  });

});
