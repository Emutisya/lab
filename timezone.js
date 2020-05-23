$(document).ready(function(){
    var offSet = new Date().getTimezoneOffset();
    var timestamp = new Date().getTime();

    var my_timestamp = timestamp + (60000 * offSet);

    $('#time_offset').val(offSet);
    $('#utc_timestamp').val(my_timestamp);



    /*Explanation for what is happening in line 12 and 13.
    /We are fetching the names of the placeholders on inputs in lab1.php and assigning
    them to thenew variabled we have created
*/
document.write(offSet); 

}); 