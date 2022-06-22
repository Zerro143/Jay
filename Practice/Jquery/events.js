$(document).ready(function(){
    $("#click").click(function(){
        alert("You Just clicked!");
    });

    $("#doubleclick").dblclick(function(){
        alert("You Doubleclicked!");
      });

      $("#p1").mouseenter(function(){
        alert("You entered p1!");
      });
      
      $("#p2").hover(function(){
        alert("You hover over p2!");
      });
  });