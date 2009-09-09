var vote = new Request({method: 'post', url: 'http://looce.com/inspirationbits/posts/vote'});

window.addEvent('domready',function(){
    $$('.vote a').addEvent('click', function(){
        var postId = this.getParent().getParent().getParent().id;
        if (this.className == "dislike") {
            var voteValue = this.getParent().getParent().getChildren(".value").get('value');
            vote.send('post_id='+postId+'&vote=down');
            this.getParent().getParent().getChildren('.like').fade(0.4);
            this.getParent().getParent().getChildren('.like').addClass('faded');            
            if (this.getParent().hasClass('faded')) {
                this.getParent().getParent().getChildren('.dislike').fade(1.0);
            };
            
            this.getParent().getParent().getChildren('.value').fade(0.0);
            this.getParent().getParent().getChildren(".value").set('text', voteValue--);
            this.getParent().getParent().getChildren('.value').fade(1.0);
            
            
            // this.getParent().getParent().getChildren('li.votes').getChildren('span.count').fade(0)
            
        } else{
            vote.send('post_id='+postId+'&vote=up');            
            this.getParent().getParent().getChildren('.dislike').fade(0.4);
            this.getParent().getParent().getChildren('.dislike').addClass('faded');
            
            if (this.getParent().hasClass('faded')) {
                this.getParent().getParent().getChildren('.like').fade(1.0)
            };
        };
    });
});