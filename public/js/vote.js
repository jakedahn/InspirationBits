var vote = new Request({method: 'post', url: '/posts/vote'});

window.addEvent('domready',function(){
    $$('.vote a').addEvent('click', function(){
        var postId = this.getParent().getParent().getParent().id;
        if (this.className == "dislike") {
            var voteValue = parseInt(this.getParent().getParent().getChildren(".value").get('text'));
            vote.send('post_id='+postId+'&vote=down');
            this.getParent().getParent().getChildren('.like').fade(0.4);
            this.getParent().getParent().getChildren('.like').addClass('faded');            
            if (this.getParent().hasClass('faded')) {
                this.getParent().getParent().getChildren('.dislike').fade(1.0);
            };
            // 
            
            if (this.getParent().getParent().getChildren('.dislike').hasClass("faded")) {
              this.getParent().getParent().getChildren(".value").set('text', voteValue-1);     
              
            }
            else {
              this.getParent().getParent().getChildren(".value").set('text', voteValue-2);
                   
            }
            
            
        } 
        else{
            vote.send('post_id='+postId+'&vote=up');         
            var voteValue = parseInt(this.getParent().getParent().getChildren(".value").get('text'));
               
            this.getParent().getParent().getChildren('.dislike').fade(0.4);
            this.getParent().getParent().getChildren('.dislike').addClass('faded');
            
            if (this.getParent().hasClass('faded')) {
                this.getParent().getParent().getChildren('.like').fade(1.0)
            };
            
            this.getParent().getParent().getChildren(".value").set('text', voteValue+1);
            
        };
    });
});