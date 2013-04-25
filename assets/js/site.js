
//Make text login values dissapear when clicked/focus
function clearText(field){
  if (field.defaultValue == field.value) field.value = '';
  else if (field.value == '') field.value = field.defaultValue;
}

//Make text login values dissapear and changes to password type when clicked/focus
function setBoxToPasswordmode(box) {
  if (box.value == box.defaultValue) {
    box.type = "password";
    box.value = "";
  }
}
function resetBox(box) {
  if (box.value == "") {
    box.type = "text";
    box.value = box.defaultValue;
  }
}

 //Search Box Main - Members page
 $(document).ready(function(){
    $('.hide-searchbox').hide();
    $('#search-members-main').hide();

    $('.show-searchbox').on('click',function(){
    	$('.show-searchbox').hide();
    	$('.hide-searchbox').show();
   		$('#search-members-main').slideDown(400);
    })
    $('.hide-searchbox').on('click',function(){
    	$('.show-searchbox').show();
    	$('.hide-searchbox').hide();
   		$('#search-members-main').slideUp(400);
    })
 });

//Profile Tabs
  $(document).ready(function(){
       $('#profile-about').hide();
       $('.tab2').on('click',function(){
            $('#profile-about').fadeIn(400);
            $('#profile-blog').hide();
       });
       $('.tab1').on('click',function(){
            $('#profile-about').hide();
            $('#profile-blog').fadeIn(400);
       });
    });

  //Group Tabs
   $(document).ready(function(){
       $('#group-photos').hide();
       $('.tab2').on('click',function(){
            $('#group-photos').fadeIn(400);
            $('#group-wall').hide();
       });
       $('.tab1').on('click',function(){
            $('#group-photos').hide();
            $('#group-wall').fadeIn(400);
       });
    });

