
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
function isBlank(str){
    return(!str || /^\s*$/.test(str));
}
// Add Record
function addstudentRecord() {
    // get values
    
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var department = $("#department").val();
    var purpose = $("#purpose").val();
    var items = $("#items").val();
    if(!isBlank(firstname) && !isBlank(lastname) && !isBlank(department)&& !isBlank(purpose)&& !isBlank(items)){

    // Add record
    $.post("ajax/addStudentItem.php", {
        firstname: firstname,
        lastname: lastname,
        department: department,
        purpose: purpose,
        items: items
    }, function (data, status) {
        // close the popup
        $("#add_new_student_item_modal").modal("hide");

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
    $.get("ajax/readStudentRecord.php", {}, function (data, status) {
        $(".student_records_content").html(data);
    });
}


function GetStudentDetails(student_id) {
    $("#hidden_user_id").val(student_id);
    $.post("ajax/readStudentDetails.php", {
        student_id: student_id
        },
        function (data, status) {
           // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_firstname").val(user.student_firstname);
            $("#update_lastname").val(user.student_lastname);
            $("#update_items").val(user.student_items);
            $("#update_clock_out").val(user.clock_out);
        }
    );
    // Open modal popup
    $("#update_student_item_modal").modal("show");
//}
    // else{
    //     setTimeout(function () {
    //         swal("Oops!","You have no right!!","error")
    //     },600);
    // }
}




function UpdateStudentDetails() {
    // get values
    var clock_out = $("#update_clock_out").val();
    

    // get hidden field value
    var student_id = $("#hidden_user_id").val();

    
    $.post("ajax/updateStudentDetails.php", {
        student_id: student_id,
            clock_out: clock_out
           
        },
        function (data, status) {
            // hide modal popup
            $("#update_student_item_modal").modal("hide");
           
            readRecords();
        }
    );
}

$(document).ready(function () {
  
    readRecords(); 
   
});