



$('#register').on('click',function () {

    $('#myModal').modal();
});
$('#login').on('click',function () {

    $('#loginModal').modal();
   // $('#myform').modal({ 'show' : {{ count($errors) > 0 ? true : false }}  });
});

$('#addNews').on('click',function () {

    $('#addNewsModal').modal();
});

$('#divSlika').addClass('divSlika');

$('#addMember').on('click',function () {

    $('#myModal').modal();
});

$('#active').on('click',function () {

    $('#statusModal').modal();
});
$('#inactive').on('click',function () {

    $('#statusModal').modal();
});

function news($id,value) {


    console.log($id);
    console.log(value);

    if($($id).is(':hidden')) {

        $($id).show(500);
        $(value).html('Manje');
    }
    else {
        $($id).hide(500);

        $(value).html('Opširnije');
    }


}

function uplate(value) {
    if($('#tableActive').is(':hidden')) {

        $(value).after(' <hr id="after" style="background-color: #17a2b8">');
        $('#tableActive').show();
        $(value).html('Uplate clanarina - Sakrij');


    }
    else {
        $('#tableActive').hide();

        $('#after').remove();
        $(value).html('Uplate clanarina - PRIKAZI');
    }


}





function deleteUser($id) {

    $('#confrimModal').modal();
    $('#confrimP').html('Da li ste sigurni da želite obrisati korisnika?');
    $('#idConfrim').html($id);
    $('#nameConfrim').html('user');


}


$('#file').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);


   $("#photo").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));


   <!-- Ne radi! -->
    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file',files);

    $.ajax({
        url: 'view/upload.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
            if(response != 0){
                $("#photo").attr("src",response);
                alert('uspjesno');
            }else{
                alert('file not uploaded');
            }
        },
    });
});

function deleteNews($idNews) {

    $('#confrimModal').modal();
    $('#confrimP').html('Da li ste sigurni da želite obrisati vijest?');
    $('#idConfrim').html($idNews);
    $('#nameConfrim').html('news');



}


var niz=new Array();
niz.push(0);
function btnSent($ID) {


    if($('#chb'+$ID).prop('checked'))
    {

        $.each(niz,function (i,val) {

            console.log(val);
            if(val==$ID)
            {
                niz.splice(i,1);

            }
        });

        niz.push($ID);

    }
    else {
      niz=$.grep(niz,function (val) {

            return val!==$ID;

        });
    }
    console.log("duzina"+niz.length);

    if(niz.length>1)
    {
        console.log('ddd');

        $('#sentBtn').attr("disabled",false);
    }
    else {
        $('#sentBtn').attr("disabled",true);
    }



}


function btnConfrim($idUser) {
   // console.log('Confrim : '+$idUser);


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    //ajax poziv
    $.ajax({

       method: "POST",
       url:"ajaxConfrimMembers",
       data: {id:$idUser}
    }).done(function (data) {
       if(data.status=="true")
       window.location='paymentOverview';

    }).fail(function(data,txtStatus){
        alert(txtStatus);
    });

}

function btnSentFromChb() {
    console.log(niz);
    $('#alertTitle').html('Status')
    niz.shift();
    console.log("Nizzz"+niz);
    if(niz.length>0)
    {   console.log("Nizzz"+niz);

       // console.log("Cekiraliii steee");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
           url: "ajaxSentMail",
           method: "POST",
           data: {sent:niz}

        }).done(function (data) {
            console.log("Podaci: "+data);
            if(data=="true")
            {
                $('#alertModal').modal();
                $('#alertID').html('<b>Successfull</b>,your email sent.');

                $.each(niz,function (i,val) {

                    $('#chb'+val).prop('checked', false);

                    niz.length=0;
                    niz.push(0);
                    $('#sentBtn').attr("disabled",true);
                })
            }

        }).fail(function(data,txtStatus){

            alert(txtStatus);
        });
    }
    else
    {
        console.log(niz.length)
        $('#alertModal').modal();
        $('#alertID').html('Niste cekirali nijedno polje!');


    }

}

$('#confrimYes').on('click',function () {


    console.log('ddd');
    var form=$('#delteform');
    var name=$('#nameConfrim').html();
    var id=$('#idConfrim').html();

    if(name=='news')
    {
        console.log('ID'+id);
        console.log(name);
        form.attr('action','news/'+id);
       form.submit();

    }
    else
    {
        console.log('ID'+id);
        console.log(name);
        form.attr('action','members/'+id);
        form.submit();



    }

})


$('#emailRegister').on('blur',function () {

    var email=$('#emailRegister').val();
    var name=$('#emailRegister').attr('name');


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({

        url:'validateRegistration',
        method:'POST',
        data:{value:email,name:name}

    }).done(function (data) {


       $('#emailP').html(data.validate);
       if(data.validate!=false)
       {
        $('#emailP').attr('hidden', false);
       }
       else
       {
           $('#emailP').attr('hidden', true);
       }

    }).fail(function (data,txtStatus) {
        alert(txtStatus);
    });

});
$('#jmbgRegister').on('blur',function () {

    var jmbg=$('#jmbgRegister').val();
    var name=$('#jmbgRegister').attr('name');

    console.log(name);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({

        url:'validateRegistration',
        method:'POST',
        data:{value:jmbg,name:name}

    }).done(function (data) {

        $('#jmbgP').html(data.validate);

        if(data.validate!=false)
        {
            $('#jmbgP').attr('hidden', false);
        }
        else
        {
            $('#jmbgP').attr('hidden', true);
        }
    }).fail(function (data,txtStatus) {
        alert(txtStatus);
    });

});

$('#pNumberRegister').on('blur',function () {


    var pNumber=$('#pNumberRegister').val();
    var name=$('#pNumberRegister').attr('name');


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({

        url:'validateRegistration',
        method:'POST',
        data:{value:pNumber,name:name}

    }).done(function (data) {

        $('#numberP').html(data.validate);

        if(data.validate!=false)
        {
            $('#numberP').attr('hidden', false);
        }
        else
        {
            $('#numberP').attr('hidden', true);
        }
    }).fail(function (data) {
        alert("Error");
        console.log(data.message);
    });
});





setTimeout( function (){$(".alertMess").alert('close')},5000);

$('#statusUplati').on('click',function () {

    var value=$('#statusPrice').val();
    var message = $('#messageStatus');
console.log(value.length);
    if(value.length>0)
    {console.log("ll");


      console.log(  $('#statusForm').attr('method'));
        console.log($('#statusForm').attr('action'));
        $('#statusForm').submit();
    }
    else {
        message.html("Unesite cijenu!");

        message.attr('hidden', false);
    }
});



    function mySearchNews() {

        var searchField=$('#mySearchNews').val();
        var user=$('#userID').val();
        var startDate=$('#startDate').datepicker().val();
        var endDate=$('#endDate').datepicker().val();



        var div=$('#tableNewsDiv');

        console.log(startDate);

        console.log(endDate);

        if(startDate.length>0 && endDate.length>0) {
            $.ajax({

                method:"get",
                url:'http://localhost/laravelorganisation/public/news/filterNews/1',
                data:{
                    search:searchField,
                    startDate:startDate,
                    endDate:endDate,
                    user:user
                },
                dataType:'html'
            }).done(function (data) {

                div.html('');
                div.html(data);
            }).fail(function () {

            })
        }
        else
        {
            if(user.length>0)
            {
                console.log('startDate.length<0 && endDate.length<0 ,user.length>0' );
                $.ajax({

                    method:"get",
                    url:'http://localhost/laravelorganisation/public/news/filterNews/2',
                    data:{
                        search:searchField,
                        startDate:startDate,
                        endDate:endDate,
                        user:user
                    },
                    dataType:"html"
                }).done(function (data) {

                    div.html('');
                    div.html(data);
                }).fail(function () {

                })
            }
            else
            {
                console.log('startDate.length<0 && endDate.length<0 ,user.length<0' );
                $.ajax({

                    method:"get",
                    url:'http://localhost/laravelorganisation/public/news/filterNews/0',
                    data:{
                        search:searchField,
                        startDate:startDate,
                        endDate:endDate,
                        user:user
                    },
                    dataType:"html"
                }).done(function (data) {

                    console.log(data);
                    div.html('');
                    div.html(data);

                }).fail(function () {

                })

            }
        }


    };


$('#startDate').datepicker();
$('#endDate').datepicker();

function betweenDate() {

    var startDate=$('#startDate').datepicker().val();
    var endDate=$('#endDate').datepicker().val();
    var searchField=$('#mySearchNews').val();
    var user=$('#userID').val();
    var div=$('#tableNewsDiv');

    if(startDate.length>0 && endDate.length>0) {
        $.ajax({

            method:"get",
            url:'http://localhost/laravelorganisation/public/news/filterNews/1',
            data:{
                search:searchField,
                startDate:startDate,
                endDate:endDate,
                user:user
            },
            dataType:'html'
        }).done(function (data) {

            div.html('');
            div.html(data);
        }).fail(function () {

        })
    }
    else
    {
        $.ajax({

            method:"get",
            url:'http://localhost/laravelorganisation/public/news/filterNews/2',
            data:{
                search:searchField,
                startDate:startDate,
                endDate:endDate,
                user:user
            },
            dataType:'html'
        }).done(function (data) {

            div.html('');
            div.html(data);
        }).fail(function () {

        })
    }

}

$('#userID').on('change',function () {

    var startDate=$('#startDate').datepicker().val();
    var endDate=$('#endDate').datepicker().val();
    var searchField=$('#mySearchNews').val();
    var user=$('#userID').val();
    var div=$('#tableNewsDiv');

    if(startDate.length>0 && endDate.length>0) {
        $.ajax({

            method:"get",
            url:'http://localhost/laravelorganisation/public/news/filterNews/1',
            data:{
                search:searchField,
                startDate:startDate,
                endDate:endDate,
                user:user
            },
            dataType:'html'
        }).done(function (data) {

            div.html('');
            div.html(data);
        }).fail(function () {

        })
    }
    else
    {
        $.ajax({

            method:"get",
            url:'http://localhost/laravelorganisation/public/news/filterNews/2',
            data:{
                search:searchField,
                startDate:startDate,
                endDate:endDate,
                user:user
            },
            dataType:'html'
        }).done(function (data) {

            div.html('');
            div.html(data);
        }).fail(function () {

        })
    }
});
$(".hasclear").keyup(function () {
    var t = $(this);
    t.next('span').toggle(Boolean(t.val()));
});

$(".clearer").hide($(this).prev('input').val());

$("#mySearchNewsSpan").click(function () {
    $(this).prev('input').val('').focus();
    mySearchNews();
    $(this).hide();
});


function searchMembers() {


    var search=$('#searchMembers').val();
    var country=$('#selectCountry').val();
    var div=$('#divtableMembers');

    if(search.length>0)
    {
        if (country.length>0)
        {
            id=1;
        }
        else
        {
            id=2;
        }

    }
    else {
        if (country.length>0)
        {
            id=3;
        }
        else
        {
            id=4;
        }
    }
        $.ajax({

            method:'GET',
            url:'http://localhost/laravelorganisation/public/members/filterMembers/'+id,
            data:{ search:search, country:country },
            dataType:'html',
            success: function (data) {
                div.html(' ');
                div.html(data);
            },
            error:function (response) {
                alert(response);
            }
        })




};

$('#selectCountry').on('change',function () {


    var search=$('#searchMembers').val();
    var country=$('#selectCountry').val();
    var div=$('#divtableMembers');


    if(search.length>0)
    {
        if (country.length>0)
        {
            id=1;
        }
        else
        {
            id=2;
        }

    }
    else {
        if (country.length>0)
        {
            id=3;
        }
        else
        {
            id=4;
        }
    }
        $.ajax({

            method:'GET',
            url:'http://localhost/laravelorganisation/public/members/filterMembers/'+id,
            data:{ search:search, country:country },
            dataType:'html',
            success: function (data) {
                div.html(' ');
                div.html(data);

            },
            error:function (response) {
                alert(response);
            }
        })


});

function searchMemberNews() {

    var search=$('#searchNewsMember').val();
    var startDate=$('#startDateNews').val();
    var endDate=$('#endDateNews').val();
    var idUser=$('#idUser').val();
   var div=$('#divTableMemberNews');

    if(search.length>0)
    {
        if (startDate.length>0 && endDate.length>0)
        {
            //start>0,end>0,search>0
            id=1;
        }
        else
        {
            //start>0,end>0,search<0
            id=2;
        }

    }
    else {
        if (startDate.length>0 && endDate.length>0)
        {  //start>0,end>0,search<0
            id=3;
        }
        else
        {  //start<0,end<0,search<0
            id=4;
        }
    }
    $.ajax({

        method:'GET',
        url:'http://localhost/laravelorganisation/public/filterNews/'+idUser+'/'+id,
        data:{ search:search, startDate:startDate,endDate:endDate },
        dataType:'html',
        success: function (data) {
            div.html(data);

        },
        error:function (response) {
            alert(response);
        }
    })

};

$('#startDatePayments').datepicker();
$('#endDatePayments').datepicker()
$('#startDateNews').datepicker();
$('#endDateNews').datepicker();

function searchPayments() {

    var search=$('#searchPayments').val();
    var startDate=$('#startDatePayments').datepicker().val();
    var endDate=$('#endDatePayments').datepicker().val();
    var idUser=$('#idUser').val();
    var div=$('#divTableMemberPayments');

    if(search.length>0)
    {
        if (startDate.length>0 && endDate.length>0)
        {
            //start>0,end>0,search>0
            id=1;
        }
        else
        {
            //start<0,end<0,search>0
            id=2;
        }

    }
    else {
        if (startDate.length>0 && endDate.length>0)
        {  //start>0,end>0,search<0
            id=3;
        }
        else
        {  //start<0,end<0,search<0
            id=4;
        }
    }
    $.ajax({

        method:'GET',
        url:'http://localhost/laravelorganisation/public/filterPayment/'+idUser+'/'+id,
        data:{ searchP:search, startDateP:startDate,endDateP:endDate },
        dataType:'html',
        success: function (data) {
            div.html(data);

        },
        error:function (response) {
            alert(response);
        }
    })
};
function betweenDatePayments() {
    var search=$('#searchPayments').val();
    var startDate=$('#startDatePayments').val();
    var endDate=$('#endDatePayments').val();
    var div=$('#divTableMemberPayments');
    var idUser=$('#idUser').val();

    if(search.length>0)
    {
        if (startDate.length>0 && endDate.length>0)
        {
            //start>0,end>0,search>0
            id=1;
        }
        else
        {
            //start<0,end<0,search>0
            id=2;
        }

    }
    else {
        if (startDate.length>0 && endDate.length>0)
        {  //start>0,end>0,search<0
            id=3;
        }
        else
        {  //start<0,end<0,search<0
            id=4;
        }
    }
    $.ajax({

        method:'GET',
        url:'http://localhost/laravelorganisation/public/filterPayment/'+idUser+'/'+id,
        data:{ searchP:search, startDateP:startDate,endDateP:endDate },
        dataType:'html',
        success: function (data) {
            div.html(data);

        },
        error:function (response) {
            alert(response);
        }
    })
}

function betweenDateNews() {

    var search=$('#searchNewsMember').val();
    var startDate=$('#startDateNews').val();
    var endDate=$('#endDateNews').val();
    var idUser=$('#idUser').val();
    var div=$('#divTableMemberNews');

    if(search.length>0)
    {
        if (startDate.length>0 && endDate.length>0)
        {
            //start>0,end>0,search>0
            id=1;
        }
        else
        {
            //start<0,end<0,search>0
            id=2;
        }

    }
    else {
        if (startDate.length>0 && endDate.length>0)
        {  //start>0,end>0,search<0
            id=3;
        }
        else
        {  //start<0,end<0,search<0
            id=4;
        }
    }
    $.ajax({

        method:'GET',
        url:'http://localhost/laravelorganisation/public/filterNews/'+idUser+'/'+id,
        data:{ search:search, startDate:startDate,endDate:endDate },
        dataType:'html',
        success: function (data) {
            div.html(data);

        },
        error:function (response) {
            alert(response);
        }
    })
}

$("#searchMembersSpan").click(function () {
    $(this).prev('input').val('').focus();
    searchMembers();
    $(this).hide();
});
$("#searchPaymentsSpan").click(function () {
    $(this).prev('input').val('').focus();
    searchPayments();
    $(this).hide();
});
$("#searchNewsMemberSpan").click(function () {
    $(this).prev('input').val('').focus();

    searchMemberNews();
    $(this).hide();
});

 function detailsModal(firstName,lastName,email,phoneNumber,name,city,jmbg,personalNumber,gender)
 {

     $('#firstNameModal').val(firstName);
     $('#lastNameModal').val(lastName);
     $('#emailModal').val(email);
     $('#phoneNumberModal').val(phoneNumber);
     $('#personalNumberModal').val(personalNumber);
     $('#jmbgModal').val(jmbg);
     $('#countryModal').val(name);
     $('#cityModal').val(city);
     $('#genderModal').val(gender);



  $('#detailsModal').modal();
 }


$('#loginBtn').on('click',function () {


    var form = $('#login_form');
    var form_data = form.serialize();
    var message = $('#alertLogin');
action=form.attr('action');
   // console.log(method);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        url: action,
        method: 'post',
        data: {
            password: jQuery('#loginPassword').val(),
            username: jQuery('#loginUsername').val(),


        },
        success: function(result){
            if(result.errors)
            {
                jQuery('#alertLogin').html('');

                jQuery.each(result.errors, function(key, value){

                    jQuery('#alertLogin').append('<li>'+value+'</li>');
                });
                message.attr('hidden', false);
            }
            else if(result.status)
            {
                console.log('ddfgfg');
                $('#loginModal').modal('hide');
                $('#alertModal').modal();
                $('#alertTitle').html('Waiting for Approval')
                $('#alertID').html(result.status);

            }
            else
            {
                console.log(form.attr('method'))
                form.submit();
                message.attr('hidden', true);
                $('#loginModal').modal('hide');
            }
        }});
});

 $('#registration').on('click',function () {


     var form = $('#registration_form');
     var form_data = form.serialize();
     var message = $('#message_reg');
     action=form.attr('action');
     // console.log(method);

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });
     $.ajax({
         url: action,
         method: 'post',
         data: {

             last_name:$('#last_name').val(),
             first_name:$('#reg_name').val(),
             email:$('#emailRegister').val(),
             password:$('#pass').val(),
             personal_number:$('#pNumberRegister').val(),
             country:$('#country').val(),
             city:$('#city').val(),
             phone_number:$('#phoneNumber').val(),
             jmbg:$('#jmbgRegister').val(),
             approve:$('#chb').val(),
             user_type:$('#admin').val(),
             gender:$('#gender').val(),




         },
         success: function(result){
             if(result.errors)
             {
                 jQuery('#message_reg').html('');

                 jQuery.each(result.errors, function(key, value){

                     jQuery('#message_reg').append('<li>'+value+'</li>');
                 });
                 message.attr('hidden', false);
             }
             else if(result.status)
             {

                 $('#myModal').modal('hide');
                 $('#alertModal').modal();
                 $('#alertTitle').html('Waiting for Approval')
                 $('#alertID').html(result.status);

             }

         }});

 });





