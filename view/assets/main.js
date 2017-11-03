$("#fmrLogin").submit(function(e){
  e.preventDefault();
  if($(this).parsley().isValid()){
    var email= $("#email").val();
    var pass= $("#pass").val();
    $.post("?c=admin&a=UserLogin",{email:email, pass:pass},function(data){
      var data= JSON.parse(data);

      if(data[0]== true){
        document.location.href="?c=admin&a=dashboard";
      }else{
        alert(data[1]);
      }
    })
  }
});
