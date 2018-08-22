
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
function isBlank(str){
    return(!str || /^\s*$/.test(str));
}
// Add Record

function addstaffRecord() {
    // get values
    
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var department = $("#department").val();
    var purpose = $("#purpose").val();
    var items = $("#items").val();
    
    // Add record
    if(!isBlank(firstname) && !isBlank(lastname) && !isBlank(department)&& !isBlank(purpose)&& !isBlank(items)){
    $.post("ajax/addStaffItem.php", {
        firstname: firstname,
        lastname: lastname,
        department: department,
        purpose: purpose,
        items: items
    }, function (data, status) {
        // close the popup
        $("#add_new_staff_item_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#firstname").val("");
        $("#lastname").val("");
        $("#department").val("");
        $("#purpose").val("");
        $("#items").val("");
        
    });
}else{
    swal("Oops!", "Some Fields are Empty.", "info");
  }
}
// READ records
function readRecords() {
    $.get("ajax/readstaffRecords.php", {}, function (data, status) {
        $(".staff_records_content").html(data);
    });
}


function GetStaffDetails(staff_id) {
    // if(rights == "2"){
    // // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(staff_id);
    $.post("ajax/readStaffDetails.php", {
        staff_id: staff_id
        },
        function (data, status) {
           // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_firstname").val(user.staff_firstname);
            $("#update_lastname").val(user.staff_lastname);
            $("#update_items").val(user.staff_items);
            $("#update_clock_out").val(user.clock_out);
        }
    );
    // Open modal popup
    $("#update_staff_item_modal").modal("show");
//}
    // else{
    //     setTimeout(function () {
    //         swal("Oops!","You have no right!!","error")
    //     },600);
    // }
}




function UpdateStaffDetails() {
    // get values
    var clock_out = $("#update_clock_out").val();
    

    // get hidden field value
    var staff_id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateStaffDetails.php", {
        staff_id: staff_id,
            clock_out: clock_out
           
        },
        function (data, status) {
            // hide modal popup
            $("#update_staff_item_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
   
});