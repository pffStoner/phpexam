$(document).ready(function(){
    $("serachWorld").keydown(function(){
        $("serachWorld").css("background-color", "yellow");
    });
    $("serachWorld").keyup(function(){
        $("serachWorld").css("background-color", "pink");
    });
});
$(document).ready((e) => {
  $('.serachWorld').keyup(() =>{
    var search = $(this).val();
    var output = $('.posts');
    var phpfile = './search.php';

    if (search != '') {
      //then search 
      $.post(phpfile, {searchPost : search}, (data) =>{
          output.html(data);//display data
      });
    }
  });
}
);


