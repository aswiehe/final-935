$(document).ready(function() {
  $('.manageable-content').click(function(e) {
    var htmlMangageability = $(this).data('manageability');
    var manageable = 'manageable';
    if(htmlMangageability === manageable) {
      var sourceElementID = $(this).attr('id');
      var user = $('#' + sourceElementID).data("user");
      var textid = $('#' + sourceElementID).data("textid");
      var contentHTML = $(this).html();
      var contentName = $(this).attr('name');
      var contentLocation = $('#' + sourceElementID).data("location");
      console.log(sourceElementID + "\n" + textid + "\n" + contentHTML + "\n" + contentName + "\n" + contentLocation);
      $('#' + sourceElementID).data("manageability", "unmanageable");
      $.ajax({
        // type: "POST",
        url: "edit-form.php",
        data: {
          user : user,
          sourceElementID : sourceElementID,
          textid : textid,
          contentHTML : contentHTML,
          // contentName : contentName,
          contentLocation : contentLocation,
        },
        type: "POST",
        success: function(response) {
          $('#' + sourceElementID).html(response);
          // $('#' + sourceElementID).removeClass("manageable-content");
          console.log("it should work");
          $('.manageable-content').data("manageability", "unmanageable");
        }
      });
    }
  });
  $('#saveBtn').click(function(e) {
    // $('#editPanel').slideUp(1000);
    $('#editPanel').animate({
      opacity: 0,
      height: '0'
    }, 1500, function() {
      // Animation complete.
    });
  });
  $('#clearBtn').click(function(e) {
    $('#textareaId').val("");
  });
  $('#resetBtn').click(function(e) {
    var originalTextAreaValue = $('#textareaId').attr('value');
    console.log(originalTextAreaValue);
    $('#textareaId').val(originalTextAreaValue);
  });
});
