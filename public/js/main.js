 <script type="text">

        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }
        
        function likeComment(id,el){
          var csrfToken = '{{ csrf_token() }}';
          var likesCount = parseInt($('#'+id+"-count").text());
          $.post('{{route('like')}}',{ commentId: id, _token: csrfToken}, function(data){
            console.log(data);
            if(data.message==='liked'){
              $(el).addClass('liked');
              $('#'+id+"-count").text(likesCount+1);
            }else{
              $(el).removeClass('liked');
              $('#'+id+"-count").text(likesCount-1);
            }
          });
        }

     function voteThread(id, el){
          var csrfToken = '{{ csrf_token() }}';
          var votesCount = parseInt($('#'+id+"-count").text());
          $.post('{{route('vote')}}',{ threadId: id, _token: csrfToken}, function(data){
            console.log(data);
            if(data.message==='voted'){
              $(el).addClass('liked');
              $('#'+id+"-count").text(votesCount+1);
            }else{
              $(el).removeClass('liked');
              $('#'+id+"-count").text(votesCount-1);
            }
          });
        }
</script>