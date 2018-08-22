
/*
* @author Uchendu Precious
* email: uchendubozz@gmail.com
* You can contact me for more clearification: cheers :);
*/
// Add Record
function isBlank(str){
    return(!str || /^\s*$/.test(str));
}
function add_existing_staffRecord() {
    // get values
    var emp_id = $('#search-box').val();
    var purpose = $("#purpose").val();
    var items = $("#items").val();
    //Get_existing_StaffDetails(emp_id);
    // Add record
    if(!isBlank(emp_id) && !isBlank(purpose) && !isBlank(items)){
    var firstname = "EXISTING";
    var lastname = "EXISTING";
    var department = "EXISTING";
    $.post("ajax/add_existing_StaffItem.php", {
        emp_id: emp_id,
        purpose: purpose,
        items: items
    }, function (data, status) {
        // close the popup
        $("#existing_staff_item_modal").modal("hide");

        window.location="dashboard.php";
        // clear fields from the popup
        $("#purpose").val("");
        $("#items").val("");
        
    });
    }else{
      swal("Oops!", "Some Fields are Empty.", "info");
    }
}


function add_existing_studentRecord() {
    // get values
    var stud_id = $('#search-box_student').val();
    var purpose = $("#purpose_student").val();
    var items = $("#items_student").val();
    //Get_existing_StaffDetails(emp_id);
    // Add record
    if(!isBlank(stud_id) && !isBlank(purpose) && !isBlank(items)){
    $.post("ajax/add_existing_StudentItem.php", {
        stud_id: stud_id,
        purpose: purpose,
        items: items
    }, function (data, status) {
        // close the popup
        $("#existing_student_item_modal").modal("hide");
        window.location="dashboard.php";
        // clear fields from the popup
        $("#purpose_student").val("");
        $("#items_student").val("");
        
    });
}else{
    swal("Oops!", "Some Fields are Empty.", "info");
  }
}

function add_existing_visitorRecord() {
    // get values
    var identity = $("#identity_visitor").val();
    var visit_id = $("#search-box_visitor").val();
    var purpose = $("#purpose_visitor").val();
    var items = $("#items_visitor").val();
    //Get_existing_StaffDetails(emp_id);
    // Add record
    if(!isBlank(visit_id) && !isBlank(purpose) && !isBlank(items)&& !isBlank(identity)){
    $.post("ajax/add_existing_VisitorsItem.php", {
        visit_id: visit_id,
        identity: identity,
        purpose: purpose,
        items: items
    }, function (data, status) {
        // close the popup
        $("#existing_visitors_item_modal").modal("hide");
        window.location="dashboard.php";
        // clear fields from the popup
        $(".purpose_visitor").val("");
        $("#items_visitor").val("");
       
    });
}else{
    swal("Oops!", "Some Fields are Empty.", "info");
  }
}
