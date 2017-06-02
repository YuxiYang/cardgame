$(function() {
var chars; //= $('#keyboard').text().split("");
var counter = 0;
var timer = 6000;
var numberOfreds = 0;
var wordcounter = 0;
var spell = 0;
gamewords = ["Art", "Dance", "Film","Language","Music", "Photography"];
gamemeaning = ["Art: the works produced by painters, writers, musicians, sculptors and other kinds of artists","Dance: to move the feet and body in a rhythmic way, usually to music", "Film: a motion picture; movie.", "Language: a particular system used by people of the same nation, region, or group to talk with one another","Music: sound with tones and rhythm that can be listened to and enjoyed", "Photography: the practice of taking photographs"];
gamesentence = ["The works produced by painters, writers, musicians, sculptors and other kinds of artists","To move the feet and body in a rhythmic way, usually to music", "A motion picture; movie.", "A particular system used by people of the same nation, region, or group to talk with one another","Sound with tones and rhythm that can be listened to and enjoyed", "The practice of taking photographs"];

$("button").click(function() {
  var game;
  var answer
    if($(this).attr("id") == "word"){
$("section").remove();
$('<div id="g"></div>'+
'<div class="flip">'+
  '<div class="result"></div>'+
  '<div class="card">'+
    '<div class="face front" id="keyboard" tabindex="1"></div>'+
    '<div class="face back"></div>'+
  '</div>').appendTo('#game');


game = gamewords;
answer = gamesentence;
$('#keyboard').text(game[wordcounter]);

}

//if($(this).attr("id") == "sentence"){
//game = gamesentence;
//answer = gamewords;

//$('#keyboard').html('<span style="font-size: 25px;font-style:italic">' + game[wordcounter] + '</span>');
//}

  



$('.back').click(function() {
$('.result').text('score: '+spell);
  if (wordcounter < 2) {
  	wordcounter++;
  	if($(this).attr("id") == "word"){$('#keyboard').text(game[wordcounter]);}
	//if($(this).attr("id") == "sentence"){$('#keyboard').html('<span style="font-size: 25px;font-style:italic">' + game[wordcounter] + '</span>');}
    //$('#keyboard').html(gamewords[wordcounter]);
    $('#keyboard').html(game[wordcounter]);
    $('.card').toggleClass('flipped');
    counter = 0;
    numberOfreds = 0;
  } else {
    setTimeout($('.back').html('<span style="font-size: 25px;font-style:italic">Awesome! you spelled '+spell+' words correct.</span>'),200); 
  }

});


$('.front').focus(function() {
  chars = $('#keyboard').text().split("");
  var modText = '';
  for (var i = 0; i < chars.length; i++) {
    modText += '<span id =' + i + '>' + chars[i] + '</span>';
    if(i % 25 == 0){modText += '<br><br>';}
  }
  $('#keyboard').html(modText);


  // Add timer bar
  $('<i class="timer"></i>')
    .prependTo('.flip')
    .css({
      'animation': 'timer ' + timer + 'ms linear'
    })
    .one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
    if(counter==0)
  	{
      	$('.back').text('Try Again');
      	wordcounter--;
    
      }
      $('.card').addClass('flipped');
    });




});

$('.front').bind('keypress', function(e) {
  var which_letter = String.fromCharCode(e.which).toUpperCase();

  //	var word = $('#keyboard').text();
  //if (word.charAt(0).toUpperCase() == which_letter) {
  if (chars[counter].toUpperCase() == which_letter) {
    $('#' + counter).css('color', 'blue');
    //$('#keyboard').text(word.substring(1, word.length));
    //$('.result').text($('.result').text() + word.charAt(0));
    counter++;
  } else {
  	//new Audio(baseUrl + audio).play(); sound play
    $('#' + counter).css('color', 'red');
    numberOfreds++;
    counter++;
  }

  if (counter == chars.length) {

    //for (var j = 0; j < chars.length; j++) {
      if (numberOfreds > 0) {
        $('.back').text('Try Again');
        wordcounter--;
      } else {
      	spell++;
      	var definition = '<span style="font-size: 25px;font-style:italic">' + answer[wordcounter] + '</span>';
        $('.back').html(definition);
      } 
    //}
    //$('.card').addClass('flipped');
    //$('.front').text("Goodie");     		          
    // $('.card').toggleClass('flipped'); 
    //('#timer').css({'animation:timer 0 ms linear'});
  } 
  	

});


});

});
