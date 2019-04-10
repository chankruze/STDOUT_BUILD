$(document).ready(function () {
    $('#stdout').innerHTML = "";
});

// $(document).ready(function(){
//     $('.btn').click(function(){
//         var clickBtnValue = $(this).val();
//         var ajaxurl = '../../index.php',
//         data =  {'action': clickBtnValue};
//         $.get(ajaxurl, data, function (response) {
//             // Response div goes here.
//             $('#stdout').innerHTML = response;
//         });
//     });

// });

// $(document).ready(function(){
//     $('#disconnect').click(function(){
//         var clickBtnValue = $(this).val();
//         var ajaxurl = 'ajax.php',
//         data =  {'action': clickBtnValue};
//         $.post(ajaxurl, data, function (response) {
//             // Response div goes here.
//             alert("action performed successfully");
//         });
//     });

// });

// $(document).ready(function () {
//     $("button").click(function () {
//         var clickedBtnValue = $(this).val();
//         $.ajax({
//             type: 'POST',
//             url: 'index.php',
//             action: clickedBtnValue,
//             success: function (data) {
//                 alert(data);
//             }
//         });
//     });
// });