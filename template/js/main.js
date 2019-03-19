
document.addEventListener('DOMContentLoaded', init);
function init() {

    var name = document.querySelector('#name');
    var email = document.querySelector('#email');
    var regions = document.querySelector('#regions');
    var sities = document.querySelector('#cities');
    var areas = document.querySelector('#areas');
    $('.cities').hide();
    $('.areas').hide();
    $('.submit').hide();
name.addEventListener('change', validateName);
email.addEventListener('change', validateEmail);

// $('#regions').on('change', function(e) {
//     var params = { region: regions.value }
//     $.post("city", params, function (data) {
//         $(".cities").html(data);
//          async:false;
//     });
//     $('.cities').show();
// });
//
// $('#cities').on('change', function(e) {
//     var params = { city: cities.value }
//     $.post("area", params, function (data) {
//         $(".areas").html(data);
//          async:false;
//     });
//     $('.areas').show();
// });

$('form').on('change', function(e) {
    console.log(e.target);
    if(e.target.id=='regions'){
        var params = { region: regions.value }
        $.post("city", params, function (data) {
            $(".cities").html(data);
        });
        $('.cities').show();
    } else if(e.target.id =='cities'){
        var params = { city: cities.value }
        $.post("area", params, function (data) {
            $(".areas").html(data);
            $('.submit').show();
        });
        $('.areas').show();
    }  

});













    function validateName() {
        if(this.value.length < 3){
            alert('Имя не может быть менее 3-х символов!');
        }
        required = true;
    }

    function validateEmail() {
        if(
            (this.value.indexOf('@') == -1) ||
            (this.value.indexOf('.') == -1)
        ) {
                alert('Неверный E-mail!');
            }
            required = true;
    }



}
