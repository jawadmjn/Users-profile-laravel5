// <script type="text/javascript">

(function($) {

$('.delete').click(function () {
  var memberId = $(this).attr("value");
  var link = document.getElementById("deleteLink");
  var url = 'deletemember?id=' + memberId;
  link.setAttribute('href', url);
});

$('#update').click(function () {
  if ( $("input[name='optradio']:checked").val() != undefined )
  {
    var link = document.getElementById("update");
    var url = 'updatemember?id=' + $("input[name='optradio']:checked").val();
    link.setAttribute('href', url);
    return true;
  }
  else
  {
    alert("Please Select Any User to proceed...");
    return false;
  }
});

function searchTable(inputVal)
{
  var table = $('#membersTable');
  table.find('tr').each(function(index, row)
  {
    var allCells = $(row).find('td');
    if(allCells.length > 0)
    {
      allCells.each(function(index, td)
      {
        var regExp = new RegExp(inputVal, 'i');
        if(regExp.test($(td).text()))
        {
          // Add class info to show recent change
          $(td).parents('tr').addClass('info');
          setTimeout(function(){
          // Remove class info for normal table view
            $(td).parents('tr').removeClass('info');
          }, 5000);
          // delete the cookie so it will not show again on page refresh
          document.cookie = "updatedUser=; expires=Thu, 01 Jan 2014 00:00:00 UTC";
          return false;
        }
      });
    }
  });
}

window.onload = function () {
  var updatedUser = $('#updatedUser').attr("value");
  if(updatedUser != '0')searchTable(updatedUser);
}

function findMember(inputVal)
{
  var table = $('#membersTable');
  table.find('tr').each(function(index, row)
  {
    var allCells = $(row).find('td');
    if(allCells.length > 0)
    {
      var found = false;
      allCells.each(function(index, td)
      {
        var regExp = new RegExp(inputVal, 'i');
        if(regExp.test($(td).text()))
        {
          found = true;
          return false;
        }
      });
      if(found == true)
      {
        $(row).show();
      }
      else $(row).hide();
    }
  });
}

$(document).ready(function()
{
  $('#findMember').keyup(function()
  {
    findMember($(this).val());
  });
});

})(jQuery);

// </script>