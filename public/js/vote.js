var vote = new Request({method: 'post', url: '/posts/vote'});

window.addEvent('domready',function(){
    $$('.vote a').addEvent('click', function(){
        var postId = this.getParent().getParent().getParent().id;
        if (this.className == "dislike")
        {
            if($('v'+postId+'d').hasClass("faded") || $('v'+postId+'d').hasClass("faded") != true && $('v'+postId+'u').hasClass("faded") != true){
              var voteValue = parseInt($('v'+postId+'val').get('text'));
              vote.send('post_id='+postId+'&vote=down');
              if ($('v'+postId+'d').hasClass("faded"))
              {
                $('v'+postId+'val').set('text', voteValue-2);
                $('v'+postId+'d').removeClass("faded");
                $('v'+postId+'d').fade(1.0);
              }
              else
              {
                $('v'+postId+'val').set('text', voteValue-1);  
              }
              $('v'+postId+'u').fade(0.4);
              $('v'+postId+'u').addClass('faded');
            }
        } 
        else if(this.className == "like")
        { 
            if($('v'+postId+'u').hasClass("faded") || $('v'+postId+'d').hasClass("faded") != true && $('v'+postId+'u').hasClass("faded") != true)
            {
              var voteValue = parseInt($('v'+postId+'val').get('text'));
              vote.send('post_id='+postId+'&vote=up');
              if ($('v'+postId+'u').hasClass("faded"))
              {
                $('v'+postId+'val').set('text', voteValue+2);
                $('v'+postId+'u').removeClass("faded");
                $('v'+postId+'u').fade(1.0);
              }
              else
              {
                $('v'+postId+'val').set('text', voteValue+1);  
              }
              $('v'+postId+'d').fade(0.4);
              $('v'+postId+'d').addClass('faded');
            }
        };
    });
});