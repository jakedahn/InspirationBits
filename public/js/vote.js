var vote = new Request({method: 'post', url: 'http://looce.com/inspirationbits/posts/vote'});

window.addEvent('domready',function(){
    $$('.vote a').addEvent('click', function(){
        var postId = this.getParent().getParent().getParent().id;
        if (this.className == "dislike") {
            vote.send('post_id='+postId+'&vote=0');
        } else{
            vote.send('post_id='+postId+'&vote=1');
        };
    });
});